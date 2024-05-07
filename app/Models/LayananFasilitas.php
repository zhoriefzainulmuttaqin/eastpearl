<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LayananFasilitas extends Model
{
    use HasFactory;
    protected $table = 'services_facilities';
    protected $primaryKey = 'id';
    protected $guarded = ['id'];
    public function facilities()
    {
        return $this->belongsTo(Fasilitas::class, 'facilities_id');
    }
    public function services()
    {
        return $this->belongsTo(Layanan::class, 'facilities_id');
    }
}
