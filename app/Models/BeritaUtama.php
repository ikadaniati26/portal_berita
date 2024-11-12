<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BeritaUtama extends Model
{
    use HasFactory;
    protected $table = 'beritautama';
    protected $fillable = ['idberitautama','artikel_idartikel']; 
    
  // Nonaktifkan fitur timestamps
  public $timestamps = false;

}
