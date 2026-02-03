<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Status Pengaduan Diperbarui</title>
    <style>
        body { font-family: Arial, sans-serif; line-height: 1.6; color: #333; }
        .container { max-width: 600px; margin: 0 auto; padding: 20px; }
        .header { background: #1e7e34; color: white; padding: 20px; text-align: center; }
        .content { padding: 20px; background: #f9f9f9; }
        .footer { background: #333; color: white; padding: 10px; text-align: center; }
        .status { font-weight: bold; color: #1e7e34; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>DINAS PENDIDIKAN<br>HALMAHERA TIMUR</h1>
            <p>Status Pengaduan Anda Telah Diperbarui</p>
        </div>
        <div class="content">
            <p>Halo <strong>{{ $complaint->society->name ?? 'Pengadu' }}</strong>,</p>
            <p>Status pengaduan Anda dengan ID <strong>{{ $complaint->id }}</strong> telah diperbarui.</p>
            <p><strong>Status Baru:</strong> <span class="status">{{ ucfirst($complaint->status) }}</span></p>
            <p><strong>Isi Pengaduan:</strong> {{ $complaint->contents_of_the_report }}</p>
            <p><strong>Tanggal Pengaduan:</strong> {{ $complaint->date_complaint }}</p>
            @if($complaint->response)
                <p><strong>Balasan Admin:</strong> {{ $complaint->response->response }}</p>
            @endif
            <p>Terima kasih telah menggunakan layanan kami.</p>
        </div>
        <div class="footer">
            <p>&copy; 2026 Dinas Pendidikan. Semua hak dilindungi.</p>
        </div>
    </div>
</body>
</html>