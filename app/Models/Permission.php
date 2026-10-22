<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    use HasFactory;

    // Daftarkan kolom yang boleh diisi oleh form
    protected $fillable = [
        'type',
        'start_date',
        'end_date',
        'reason',
        'image',
        'status',
    ];
}