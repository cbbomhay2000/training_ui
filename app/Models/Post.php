<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
        public $timestamps = false; 
        protected $fillable = [
            "name_post", "title_post", "desc", "cate_id"
        ];
        protected $primarukey = 'post_id';
        protected $table = 'posts';

        public function category(){
            return $this->belongsTo(Category::class, 'cate_id');
        }
}
