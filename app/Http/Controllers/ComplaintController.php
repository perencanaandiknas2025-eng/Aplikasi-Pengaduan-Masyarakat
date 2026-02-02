<?php

namespace App\Http\Controllers;

use App\Models\Complaint;
use App\Models\Response;
use Illuminate\Http\Request;

class ComplaintController extends Controller
{
    public function index()
    {
        $data['complaints'] = Complaint::all();
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

        $complaint->status = $request->status;
        $complaint->save();

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
}
