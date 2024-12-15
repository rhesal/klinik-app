<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pasien extends Model
{
    use HasFactory;

    // Table name
    protected $table = 'pasien';

    // Primary key
    protected $primaryKey = 'id_pasien';

    // Disable auto-increment if not using default `id`
    public $incrementing = true;

    // Data type of primary key
    protected $keyType = 'int';

    // Mass assignable fields
    protected $fillable = [
        'nama',
        'tanggal_lahir',
        'jenis_kelamin',
        'alamat',
        'nomor_telepon',
    ];
}
