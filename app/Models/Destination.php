<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Destination extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'destination';
    protected $primaryKey = 'id';
    protected $guarded = ['id'];
}