<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GiftSale extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'gift_sales';
    protected $primaryKey = 'id';
    protected $guarded = ['id'];
}
