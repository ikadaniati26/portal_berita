<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataPengguna extends Model
{
    use HasFactory;
    protected $table = 'pengguna'; 
    protected $fillable = ['nama','email','telp','akun_idpengguna']; 
}
