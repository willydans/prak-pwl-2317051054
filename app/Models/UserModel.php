<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserModel extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'user';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nama',
        'nim',
        'kelas_id',
    ];

    /**
     * Mengambil seluruh data pengguna dengan join ke tabel kelas.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getUser()
    {
        // Catatan: Terdapat potensi kesalahan ketik pada PDF (' ' bukan '='). Kode ini sudah diperbaiki.
        return $this->join('kelas', 'kelas.id', '=', 'user.kelas_id')
            ->select('user.*', 'kelas.nama_kelas as nama_kelas')
            ->get();
    }

    /**
     * Mendefinisikan relasi ke model Kelas.
     */
    public function kelas()
    {
        return $this->belongsTo(Kelas::class, 'kelas_id');
    }
}
