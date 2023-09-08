<?php

namespace App\Models;

use App\Models\User;
use App\Models\Huruf;
use App\Models\Artist;
use App\Models\Novel;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;
    use Sluggable;

    protected $guarded = ['id']; //ini ga boleh diisi
    protected $with = ['artist','user','novel'];

    public function scopeFilter($query,array $filters){

        $query->when($filters['search'] ?? false,function($query,$search){
            return $query->whereHas('artist',function($query)use($search){
                $query->where('title','like','%'.$search.'%')
                ->orWhere('jtitle','like','%'.$search.'%')
                ->orWhere('artists.name','like','%'.$search.'%');
            })  ->orWhereHas('novel',function($query)use($search){
                $query->where('novels.title','like','%'.$search.'%')
                ->orWhere('novels.jtitle','like','%'.$search.'%');});
           
        });

        $query->when($filters['search2'] ?? false,function($query,$search2){
            return $query->where(function($query)use($search2){
                $query->where('title','like',$search2.'%')
                ->orWhere('jtitle','like',$search2.'%');
            });
           
        });

        $query->when($filters['novel'] ?? false,function($query,$novel){
            return $query->whereHas('novel',function($query)use($novel){
                $query->where('novels.title','like','%'.$novel.'%')
                ->orWhere('novels.jtitle','like','%'.$novel.'%');
            });
           
        });

        $query->when($filters['artist']?? false, function($query,$artist){
            return $query->whereHas('artist',function($query)use($artist){
                $query->where('artists.name','like',$artist);
            });
        });

        $query->when($filters['user'] ?? false, fn($query,$user) => $query->whereHas('user',fn($query)=>$query->where('username',$user)));

    }

    public function novel(){
        return $this->belongsTo(Novel::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function artist(){
        return $this->belongsTo(Artist::class);
    }

    public function getRouteKeyName(){
        return 'slug';
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

}