<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SaleItem extends Model
{
    use HasFactory;
    protected $table = 'sale_items';
    protected $primaryKey = 'id';
    protected $guarded = ['id'];
}
