<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LayananDestinasi extends Model
{
    use HasFactory;
    protected $table = 'services_destinations';
    protected $primaryKey = 'id';
    protected $guarded = ['id'];
    public function destination()
    {
        return $this->belongsTo(Destination::class, 'destination_id');
    }
    public function services()
    {
        return $this->belongsTo(Layanan::class, 'destination_id');
    }
}