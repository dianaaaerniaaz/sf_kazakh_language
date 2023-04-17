<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $fillable = ['title','content','img', 'category_id', 'user_id'];
    public function category(){
        return $this->belongsTo(Category::class);
    }
    public function usersLike()
    {
        return $this->belongsToMany(User::class, 'like')
            ->withPivot('like')
            ->withTimestamps();
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
}
