<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Complaint;
use Illuminate\Http\Request;

class ComplaintController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $complaints = Complaint::with(['Society', 'Category', 'Response'])->paginate(10);
        return response()->json($complaints);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nik' => 'required',
            'contents_of_the_report' => 'required',
            'category_id' => 'required|exists:categories,id',
        ]);

        $complaint = Complaint::create($request->all());
        return response()->json($complaint, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $complaint = Complaint::with(['Society', 'Category', 'Response'])->findOrFail($id);
        return response()->json($complaint);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $complaint = Complaint::findOrFail($id);
        $complaint->update($request->all());
        return response()->json($complaint);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Complaint::destroy($id);
        return response()->json(['message' => 'Deleted']);
    }

    public function track($nik)
    {
        $complaints = Complaint::where('nik', $nik)->with(['Category', 'Response'])->get();
        return response()->json($complaints);
    }
}
