<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataPengguna extends Model
{
    use HasFactory;
    protected $table = 'pengguna'; 
    protected $fillable = ['img','nama','jenis_kelamin','status_perkawinan','email','telp','jabatan','alamat','akun_idpengguna']; 
}
