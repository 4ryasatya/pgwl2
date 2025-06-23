<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class KecamatanModel extends Model
{
    use HasFactory;

    protected $table = 'kecamatan'; // Nama tabel di DB
    protected $primaryKey = 'id';   // Primary key
    public $timestamps = false;     // Jika tidak ada kolom created_at dan updated_at

    protected $fillable = [
        'nama_kecamatan'
    ];
}
