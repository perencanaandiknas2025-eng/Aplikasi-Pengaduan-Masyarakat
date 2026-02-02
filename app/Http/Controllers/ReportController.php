<?php

namespace App\Http\Controllers;

use App\Models\Complaint;
use Request;
use DB;
use PDF;
use App;

class ReportController extends Controller
{
    public function day()
    {
        $data['data'] = Complaint::with('society')->get();
        return view('admin.report.day.index', $data);
    }

    public function day_search()
    {
        $date1 = Request::get('date1');
        $date2 = Request::get('date2');
        $category_id = Request::get('category_id');
        $query = Complaint::with(['society', 'Category'])
            ->whereBetween('date_complaint', [$date1, $date2]);
        
        if ($category_id) {
            $query->where('category_id', $category_id);
        }
        
        $query = $query->orderBy('id', 'desc')->get();

        $data['data']   =   $query;

        return view('admin.report.day.index', $data);
    }

    public function day_pdf()
    {
        $date1 = Request::get('date1');
        $date2 = Request::get('date2');
        $category_id = Request::get('category_id');
        $query = Complaint::with(['society', 'Category'])
            ->whereBetween('date_complaint', [$date1, $date2]);
        
        if ($category_id) {
            $query->where('category_id', $category_id);
        }
        
        $query = $query->orderBy('id', 'asc')->get();

        $data['data']   =   $query;
        $view = view('admin.report.day.print_data', $data)->render();
        $pdf = App::make('dompdf.wrapper');
        $pdf->loadHTML($view);
        return $pdf->stream('Report Day.pdf');
    }
}
