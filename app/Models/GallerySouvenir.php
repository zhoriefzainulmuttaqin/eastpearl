<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GallerySouvenir extends Model
{
    use HasFactory;

    protected $table = 'gallery_souvenir';
    protected $primaryKey = 'id';
    protected $guarded = ['id'];
}