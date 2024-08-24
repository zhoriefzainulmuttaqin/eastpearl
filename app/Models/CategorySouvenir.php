<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategorySouvenir extends Model
{
    use HasFactory;

    protected $table = 'category_souvenir';
    protected $primaryKey = 'id';
    protected $guarded = ['id'];
}