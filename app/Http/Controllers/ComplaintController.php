<?php

namespace App\Http\Controllers;

use App\Models\Complaint;
use App\Models\Response;
use Illuminate\Http\Request;

class ComplaintController extends Controller
{
    public function index(Request $request)
    {
        $query = Complaint::with(['society', 'Category', 'Response']);

        // Filter by status
        if ($request->has('status') && $request->status != '') {
            $query->where('status', $request->status);
        }

        // Filter by category
        if ($request->has('category_id') && $request->category_id != '') {
            $query->where('category_id', $request->category_id);
        }

        // Filter by date range
        if ($request->has('date_from') && $request->date_from != '') {
            $query->where('date_complaint', '>=', $request->date_from);
        }
        if ($request->has('date_to') && $request->date_to != '') {
            $query->where('date_complaint', '<=', $request->date_to);
        }

        $data['complaints'] = $query->orderBy('created_at', 'desc')->get();
        $data['categories'] = \App\Models\Category::all();

        return view('admin.complaints.index', $data);
    }

    public function show($id)
    {
        $data['complaint'] = Complaint::findOrFail($id);
        $data['response'] = Response::where('complaint_id', $id)->first();

        return view('admin.complaints.show', $data);
    }

    /**
     * ✅ FIX ERROR edit does not exist
     * DIPANGGIL OLEH Route::resource
     */
    public function edit($id)
    {
        $data['complaint'] = Complaint::findOrFail($id);
        $data['response'] = Response::where('complaint_id', $id)->first();

        return view('admin.complaints.edit', $data);
    }

    /**
     * ✅ SIMPAN / UPDATE BALASAN
     */
    public function save(Request $request, $id)
    {
        $request->validate([
            'response' => 'required',
            'status'   => 'required',
        ]);

        $complaint = Complaint::findOrFail($id);

        Response::updateOrCreate(
            ['complaint_id' => $id],
            ['response' => $request->response]
        );

        $oldStatus = $complaint->status;
        $complaint->status = $request->status;
        $complaint->save();

        // Kirim email notifikasi ke masyarakat jika status berubah
        if ($oldStatus !== $request->status && $complaint->society && $complaint->society->email) {
            try {
                \Mail::to($complaint->society->email)->send(new \App\Mail\ComplaintStatusUpdated($complaint));
            } catch (\Exception $e) {
                \Log::error('Error sending status update email: ' . $e->getMessage());
            }
        }

        return redirect()
            ->back()
            ->with('success', 'Balasan berhasil disimpan');
    }

    /**
     * ✅ DELETE
     */
    public function destroy($id)
    {
        $complaint = Complaint::findOrFail($id);

        Response::where('complaint_id', $id)->delete();

        if ($complaint->photo && file_exists(public_path('avatar_complaint/' . $complaint->photo))) {
            unlink(public_path('avatar_complaint/' . $complaint->photo));
        }

        $complaint->delete();

        return redirect()
            ->route('complaints.index')
            ->with('success', 'Pengaduan berhasil dihapus!');
    }

    public function export(Request $request)
    {
        $query = Complaint::with(['society', 'Category', 'Response']);

        // Apply same filters as index
        if ($request->has('status') && $request->status != '') {
            $query->where('status', $request->status);
        }
        if ($request->has('category_id') && $request->category_id != '') {
            $query->where('category_id', $request->category_id);
        }
        if ($request->has('date_from') && $request->date_from != '') {
            $query->where('date_complaint', '>=', $request->date_from);
        }
        if ($request->has('date_to') && $request->date_to != '') {
            $query->where('date_complaint', '<=', $request->date_to);
        }

        $complaints = $query->orderBy('created_at', 'desc')->get();

        // Simple CSV export
        $filename = 'complaints_' . date('Y-m-d_H-i-s') . '.csv';
        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="' . $filename . '"',
        ];

        $callback = function() use ($complaints) {
            $file = fopen('php://output', 'w');
            fputcsv($file, ['No', 'NIK', 'Nama', 'Kategori', 'Pengaduan', 'Status', 'Tanggal', 'Balasan']);

            foreach ($complaints as $index => $complaint) {
                fputcsv($file, [
                    $index + 1,
                    $complaint->nik,
                    $complaint->society->name ?? 'N/A',
                    $complaint->Category->name ?? 'N/A',
                    $complaint->contents_of_the_report,
                    ucfirst($complaint->status),
                    $complaint->date_complaint,
                    $complaint->response->response ?? 'N/A'
                ]);
            }
            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }
}
