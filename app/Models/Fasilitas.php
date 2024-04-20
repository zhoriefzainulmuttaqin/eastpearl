<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fasilitas extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'facilities';
    protected $primaryKey = 'id';
    protected $guarded = ['id'];
}