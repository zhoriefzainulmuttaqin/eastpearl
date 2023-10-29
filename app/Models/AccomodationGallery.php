<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'accomodation_galleries';
    protected $primaryKey = 'id';
    protected $guarded = ['id'];
}
