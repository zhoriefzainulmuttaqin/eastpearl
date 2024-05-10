<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServicesGallery extends Model
{
    use HasFactory;
    protected $table = 'services_galleries';
    protected $primaryKey = 'id';
    protected $guarded = ['id'];

    public function services()
    {
        return $this->hasMany(Layanan::class, 'id');
    }
}
