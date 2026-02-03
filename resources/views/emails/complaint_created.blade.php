<!DOCTYPE html>
<html>
<head>
    <title>Pengaduan Baru</title>
</head>
<body>
    <h1>Pengaduan Baru Telah Dibuat</h1>
    <p>ID Pengaduan: {{ $complaint->id }}</p>
    <p>Nama Pelapor: {{ $complaint->society->name ?? 'N/A' }}</p>
    <p>Kategori: {{ $complaint->Category->name ?? 'N/A' }}</p>
    <p>Isi Pengaduan: {{ $complaint->contents_of_the_report }}</p>
    <p>Status: {{ $complaint->status }}</p>
    <p>Silakan login ke admin panel untuk merespons.</p>
</body>
</html>