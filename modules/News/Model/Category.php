<?php


namespace Modules\News\Model;


use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public $table = 'category';

    public $fillable = [
        'code',
        'name',
    ];

   public function getByCode($code)
   {
       return static::whereCode($code);
   }

   public function news()
   {
       return $this->belongsTo(News::class, 'code', 'category_code');
   }
}
