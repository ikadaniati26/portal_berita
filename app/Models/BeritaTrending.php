<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BeritaTrending extends Model
{
    use HasFactory;
    protected $table = 'beritatrending';
    protected $fillable = ['idberitatrending','artikel_idartikel']; 
    
  // Nonaktifkan fitur timestamps
  public $timestamps = false;
}
