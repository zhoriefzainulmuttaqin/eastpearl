<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Souvenir extends Model
{
    use HasFactory;

    protected $table = 'souvenir';
    protected $primaryKey = 'id';
    protected $guarded = ['id'];

    public function category()
    {
        return $this->belongsTo(CategorySouvenir::class, 'souvenir_category_id');
    }
}