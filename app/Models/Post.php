<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use App\Models\SubCategory;


class Post extends Model
{
    use HasFactory,HasTranslations ;
    protected $table = 'posts';
    protected $fillable = ['title','body','status','sub_category_id'];
    public $translatable = ['title','body','status'];

    public function sub_category()
    {
        return $this->belongsTo(SubCategory::class,'sub_category_id');
    }



    // protected $casts = [
    //     'title' => 'array',
    //     'body' => 'array',
    // ];

}
