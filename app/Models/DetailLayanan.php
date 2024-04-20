<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailLayanan extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'detail_services';
    protected $primaryKey = 'id';
    protected $guarded = ['id'];
}