<!DOCTYPE html>
<html>
<head>
    <title>Print Day</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            font-size: 12px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
            page-break-inside: avoid;
            border: none;
        }
        th, td {
            border: none;
            padding: 8px;
            text-align: left;
            word-wrap: break-word;
        }
        tbody th, tbody td, thead th {
            border: 1px solid #000;
        }
        th {
            background-color: #f2f2f2;
            font-weight: bold;
            font-size: 11px;
            text-align: center;
            vertical-align: middle;
        }
        td {
            font-size: 10px;
            vertical-align: top;
        }
        .success {
            background-color: #d4edda !important;
        }
        .badge {
            padding: 2px 6px;
            border-radius: 8px;
            color: white;
            font-size: 10px;
            font-weight: bold;
            display: inline-block;
        }
        .bg-danger {
            background-color: #dc3545;
        }
        .bg-primary {
            background-color: #007bff;
        }
        .bg-success {
            background-color: #28a745;
        }
        h3 {
            margin: 5px 0;
            color: #333;
            font-size: 14px;
        }
        p {
            margin: 5px 0;
            font-size: 11px;
        }
        thead tr td {
            border: none !important;
        }
        thead tr {
            border: none !important;
        }
        thead {
            border: none !important;
        }
        @media print {
            body {
                margin: 15mm;
                font-size: 11px;
            }
            table {
                page-break-inside: avoid;
            }
            tr {
                page-break-inside: avoid;
                page-break-after: auto;
            }
            th, td {
                padding: 6px;
            }
            .no-print {
                display: none;
            }
        }
    </style>
</head>
<body>
     <center>
</center>
<br>
<table class="table table-hover table-striped text-center" cellspacing="0" width="100%">
                <thead>
                    <tr style="border: none;"><td colspan="8" style="font-family: sans-serif;text-align: center; padding: 20px 10px; border: none;">
                        <div style="text-align: center; margin: 30px 0 10px 0;">
                            <h3 style="margin: 5px 0; text-align: center; font-size: 16px;">LAPORAN</h3>
                            <h3 style="margin: 5px 0; text-align: center; font-size: 16px;">CERDIK</h3>
                            <h3 style="margin: 5px 0; text-align: center; font-size: 14px;">Center for Education Reporting & Digital Complaints</h3>
                            <h4 style="margin: 5px 0; text-align: center; font-size: 12px;">(Pusat Pelaporan dan Pengaduan Digital Pendidikan)</h4>
                            @if(Request::get('date1') && Request::get('date2'))
                            <p style="margin: 10px 0; font-size: 12px; text-align: center;">Periode: {{Request::get('date1')}} - {{Request::get('date2')}}</p>
                            @endif
                        </div>
                    </td></tr>

                    <tr style="border: none;"><td colspan="8" style="font-family: sans-serif;text-align: center; padding: 10px; border: none;">
                        <p style="margin: 0; font-size: 12px; text-align: center;">
                            <strong>Total Laporan:</strong> {{count($data)}} | 
                            <strong>Belum Diproses:</strong> {{count($data->where('status', '0'))}} | 
                            <strong>Sedang Diproses:</strong> {{count($data->where('status', 'process'))}} | 
                            <strong>Selesai:</strong> {{count($data->where('status', 'finished'))}}
                        </p>
                    </td></tr>

                    <tr>
                        <th>No</th>
                        <th>NIK</th>
                        <th>Nama Pelapor</th>
                        <th>Kategori</th>
                        <th>Pengaduan</th>
                        <th>Foto</th>
                        <th>Tanggal</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $item)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$item->nik}}</td>
                        <td style="max-width: 100px; word-wrap: break-word;">{{$item->society->name ?? 'N/A'}}</td>
                        <td style="max-width: 100px; word-wrap: break-word;">{{$item->Category->name ?? 'N/A'}}</td>
                        <td style="max-width: 150px; word-wrap: break-word;">{{$item->contents_of_the_report}}</td>
                        <td style="text-align: center;">
                            @if($item->photo && !empty($item->photo) && file_exists(public_path('avatar_complaint/' . $item->photo)))
                                <img src="{{ public_path('avatar_complaint/' . $item->photo) }}" 
                                     alt="Foto" 
                                     style="width: 60px; height: 60px; object-fit: cover; border: 1px solid #ddd;">
                            @else
                                <span style="color: #999; font-size: 10px;">Tidak ada foto</span>
                            @endif
                        </td>
                        <td>{{$item->date_complaint}}</td>
                        @if ($item->status == "0")
                            <td><span class="badge bg-danger">Belum Diproses</span></td>
                        @elseif($item->status == 'process')
                            <td><span class="badge bg-primary">Proses</span></td>
                        @else 
                            <td><span class="badge bg-success">Selesai</span></td>
                        @endif
                    </tr>
                    @endforeach
                </tbody>
                                               
</table>

<div style="margin-top: 30px; text-align: right; font-size: 12px; color: #666;">
    <p>Dicetak pada: {{ \Carbon\Carbon::now()->format('d-m-Y H:i:s') }}</p>
</div>

</center>
</body>
</html>
<script>
    window.print();
</script>