<?php


namespace Modules\News\Model;


use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    public $table = 'news';

    public $fillable = [
        'title',
        'category_code',
        'description',
        'fulltext',
        'image',
    ];

    public static function getNews()
    {
        return static::all();
    }
}
