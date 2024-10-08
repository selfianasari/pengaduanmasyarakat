<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Model;

class Laporan extends Model
{
    use HasFactory;

    protected $table = 'Laporan';
    protected $fillable = [
        'username',
        'isi_laporan',
        'foto_bukti',
    ];
}
