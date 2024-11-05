<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artikel extends Model
{
    use HasFactory;
    protected $table = 'artikel'; 
    protected $fillable = ['idartikel','judul', 'image', 'video', 'konten', 'status','kategori_idkategori','penulis','editor', 'updated_at'];

    // Definisikan relasi dengan Kategori
    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'id_kategori'); // Sesuaikan dengan nama kolom foreign key di tabel Artikel
    }
}


