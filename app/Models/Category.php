<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;



class Category extends Model
{
    use HasFactory ,HasTranslations;
    protected $table = 'categories';
    protected $fillable = ['name','parent_id'];
    public $translatable = ['name'];

    // protected $casts = [
    //     'name' => 'array',
    // ];



    public function sub_categories()
    {
        return $this->hasMany(SubCategory::class);
    }


    public function posts()
    {
        return $this->hasMany(SubCategory::class);
    }
}
