<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;


class SubCategory extends Model
{
    use HasFactory,HasTranslations;

    protected $table = 'sub_categories';
    protected $fillable = ['name','category_id'];
    public $translatable = ['name'];

    protected $casts = [
        'name' => 'array',
    ];


    
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    
}
