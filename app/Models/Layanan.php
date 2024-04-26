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

    public function categories()
    {
        return $this->belongsTo(Category::class, 'categories_id');
    }
    public function facilities()
    {
        return $this->belongsToMany(Fasilitas::class, 'services_facilities', 'services_id', 'facilities_id');
    }

    /**
     * Mendefinisikan relasi Many-to-Many antara Layanan dan Destinasi.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function destinations()
    {
        return $this->belongsToMany(Destination::class, 'services_destinations', 'services_id', 'destination_id');
    }
}
