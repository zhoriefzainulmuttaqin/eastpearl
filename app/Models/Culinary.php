<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Culinary extends Model
{
    use HasFactory;
    protected $table = 'culinaries';
    protected $primaryKey = 'id';
    protected $guarded = ['id'];
}
