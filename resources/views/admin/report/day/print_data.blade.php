<!DOCTYPE html>
<html>
<head>
    <title>Print Day</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
            font-weight: bold;
        }
        .success {
            background-color: #d4edda !important;
        }
        .badge {
            padding: 4px 8px;
            border-radius: 12px;
            color: white;
            font-size: 12px;
            font-weight: bold;
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
        }
        p {
            margin: 5px 0;
        }
        .stats-table {
            margin: 20px 0;
        }
        .stats-table td {
            padding: 10px;
            text-align: center;
        }
    </style>
</head>
<body>
     <center>
<table style="text-align: center;">
    <tr>
        <td><img src=""></td>
        
        <td><img src=""></td>
    </tr>
</table>
</center>
<br>
<table class="table table-hover table-striped table-bordered text-center" cellspacing="0" width="100%" border="1">
                <thead>
                    <tr class="success"><th colspan="7" style="text-align: center"></th></tr>

                    <tr class="success"><td colspan="7" style="font-family: sans-serif;text-align: center;">

                        <div style="text-align: center;">
                            <h3>LAPORAN</h3>
                            <h3>CERDIK</h3>
                            <h3>Center for Education Reporting & Digital Complaints</h3>
                            <h4>(Pusat Pelaporan dan Pengaduan Digital Pendidikan)</h4>
                            @if(Request::get('date1') && Request::get('date2'))
                            <p style="margin: 10px 0; font-size: 14px;">Periode: {{Request::get('date1')}} - {{Request::get('date2')}}</p>
                            @endif
                        </div>
                    </td></tr>

                    <tr class="success"><td colspan="7" style="font-family: sans-serif;text-align: left; padding: 10px;">
                        <table class="stats-table">
                            <tr>
                                <td style="padding: 5px;"><strong>Total Laporan:</strong> {{count($data)}}</td>
                                <td style="padding: 5px;"><strong>Belum Diproses:</strong> {{count($data->where('status', '0'))}}</td>
                                <td style="padding: 5px;"><strong>Sedang Diproses:</strong> {{count($data->where('status', 'process'))}}</td>
                                <td style="padding: 5px;"><strong>Selesai:</strong> {{count($data->where('status', 'finished'))}}</td>
                            </tr>
                        </table>
                    </td></tr>
                    <tr class="success"><th colspan="7" style="text-align: center"></th></tr>
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
                        <td>{{$item->society->name ?? 'N/A'}}</td>
                        <td>{{$item->Category->name ?? 'N/A'}}</td>
                        <td>{{$item->contents_of_the_report}}</td>
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