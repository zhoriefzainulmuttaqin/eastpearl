<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Layanan extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table = 'services';
    protected $primaryKey = 'id';
    protected $guarded = ['id'];

     public function facilities()
    {
        return $this->belongsToMany(Fasilitas::class, 'layanan_facilities', 'layanan_id', 'facilities_id');
    }

    /**
     * Mendefinisikan relasi Many-to-Many antara Layanan dan Destinasi.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function destinations()
    {
        return $this->belongsToMany(Destination::class, 'layanan_destinations', 'layanan_id', 'destination_id');
    }
}