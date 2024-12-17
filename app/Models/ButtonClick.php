<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ButtonClick extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $table = 'button_click';
    protected $primaryKey = 'id';
    protected $guarded = ['id'];
}