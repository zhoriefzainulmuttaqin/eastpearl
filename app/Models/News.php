<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'news';
    protected $primaryKey = 'id';
    protected $guarded = ['id'];

    public function category_news()
    {
        return $this->belongsTo(CategoryNews::class, 'category_id');
    }
}