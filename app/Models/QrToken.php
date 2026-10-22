<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QrToken extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function qrLocation()
    {
        return $this->belongsTo(QrLocation::class);
    }
}