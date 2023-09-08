<?php

namespace App\Models;

use App\Models\Post;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Cviebrock\EloquentSluggable\Sluggable;

class Artist extends Model
{

    use HasFactory;
    use Sluggable;

    protected $guarded = ['id'];

    public function scopeFilter($query,array $filters){

        $query->when($filters['search'] ?? false,function($query,$search){
            return $query->where(function($query)use($search){
                $query->where('name','like','%'.$search.'%');
            });
        });
    }
    public function post(){
        return $this->hasMany(Post::class);
    }

    public function sluggable(): array
    {
        return [
            'artist_slug' => [
                'source' => 'name'
            ]
        ];
    }

}
