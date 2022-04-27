<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Post extends Model
{
        public $timestamps = false; 
        protected $fillable = [
            "name_post", "title_post", "desc", "image_post", "cate_id"
        ];
        protected $primarykey = 'id';
        protected $table = 'posts';

        public function category(){
            return $this->belongsTo(Category::class, 'id');
        }
}
