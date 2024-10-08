<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Datapengadu extends Model
{
    use HasFactory;

    protected $table = 'datapengadu';
    protected $fillable= [
        'nama',
        'nik',
        'tanggal_lahir',
        'umur',
        'username',
        'email',
    ];
}
