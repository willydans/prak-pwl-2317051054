<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Matakuliah extends Model
{
    use HasFactory;

    // Menentukan nama tabel yang digunakan oleh model ini 
    protected $table = 'mata_kuliah';

    // Melindungi kolom 'id' dari mass assignment 
    protected $guarded = ['id'];

    // Menonaktifkan auto-incrementing default dari Laravel [cite: 123]
    public $incrementing = false;

    // Menentukan tipe primary key sebagai string (untuk UUID) [cite: 125]
    protected $keyType = 'string';

    // Method ini akan berjalan otomatis saat model dibuat
    protected static function boot()
    {
        parent::boot();

        // Membuat UUID secara otomatis sebelum data baru disimpan [cite: 135]
        static::creating(function ($model) {
            if (empty($model->{$model->getKeyName()})) {
                $model->{$model->getKeyName()} = (string) Str::uuid(); // [cite: 139]
            }
        });
    }

    // Contoh method tambahan untuk mengambil semua data mata kuliah [cite: 147]
    public function getAllMK()
    {
        return $this->all(); // [cite: 151]
    }
}