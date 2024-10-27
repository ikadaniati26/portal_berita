<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artikel extends Model
{
    use HasFactory;
    protected $table = 'artikel'; 
    protected $fillable = ['idartikel','judul', 'image', 'video', 'konten', 'status','kategori_idkategori','penulis','editor', 'updated_at'];

}
