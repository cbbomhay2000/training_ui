<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public $timestamps = false; 
    protected $fillable = [
    "cate_name"
    ];
    protected $primarukey = 'cate_id';
    protected $table = 'categories';

    public function posṭ(){
        return $this->hasMany(Post::class, 'cate_id');
    }
}
