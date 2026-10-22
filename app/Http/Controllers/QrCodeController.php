<?php

namespace App\Http\Controllers;

use App\Models\QrLocation;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class QrCodeController extends Controller
{
    public function generate($locationId)
    {
        $location = QrLocation::findOrFail($locationId);

        // Buat string/token unik untuk QR Code
        $qrData = json_encode([
            'location_id' => $location->id,
            'name' => $location->name,
            'timestamp' => now()->timestamp,
        ]);

        $qrcode = QrCode::size(250)->generate($qrData);

        // BAGIAN INI yang memanggil file view show.blade.php
        return response("
<!DOCTYPE html>
<html lang='id'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>QR Code Absensi</title>
    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css' rel='stylesheet'>
</head>
<body class='bg-light d-flex align-items-center justify-content-center vh-100'>
    <div class='card p-4 text-center shadow-sm' style='max-width: 380px; border-radius: 16px;'>
        <h4 class='fw-bold mb-1'>Scan QR Code</h4>
        <p class='text-muted small mb-3'>Lokasi: {$location->name}</p>
        
        <div class='p-3 bg-white border rounded mb-3 d-inline-block mx-auto'>
            {$qrcode}
        </div>

        <p class='text-muted small'>Silakan scan menggunakan kamera aplikasi absensi.</p>
        <button onclick='window.print()' class='btn btn-primary btn-sm'>Cetak QR</button>
    </div>
</body>
</html>
");
    }
}