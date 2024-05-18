<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryGallery extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'category_gallery';
    protected $primaryKey = 'id';
    protected $guarded = ['id'];

    public function galeri()
    {
        return $this->hasMany(Galeri::class, 'category_id', 'id'); // Pastikan 'category_id' adalah nama kolom foreign key di tabel 'galleries'
    }
}