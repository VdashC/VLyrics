<?php

namespace App\Models;

use App\Models\Post;
use App\Models\Artist;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Novel extends Model
{
    use HasFactory;
    use Sluggable;

    protected $guarded = ['id'];

    public function scopeFilter($query,array $filters){

        $query->when($filters['huruf'] ?? false,function($query,$huruf){
            return $query->where(function($query)use($huruf){
                $query->select('*')->from('novels')->where('title','like',$huruf.'%');
            });
        });

        $query->when($filters['search'] ?? false,function($query,$search){
            return $query->where(function($query)use($search){
                $query->where('title','like','%'.$search.'%');
            });
        });
        
    }

    public function sluggable(): array
    {
        return [
            'novel_slug' => [
                'source' => 'title'
            ]
        ];
    }

    public function post(){
        return $this->hasMany(Post::class);
    }

    public function artist(){
        return $this->hasMany(Artist::class);
    }


}
