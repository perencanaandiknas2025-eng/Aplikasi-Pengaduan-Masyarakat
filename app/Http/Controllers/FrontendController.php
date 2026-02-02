<?php

namespace App\Http\Controllers;

use App\Models\Complaint;
use App\Models\Response;
use App\Models\Society;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Date;

class FrontendController extends Controller
{
    public function register()
    {
        return view('frontend.register.index');
    }

    public function save(Request $request)
    {
        $this->validate($request, [
            'nik' => 'required|min:2|max:20',
            'name' => 'required|min:2|max:20',
            'username' => 'required',
            'email' => 'required',
            'phone_number' => 'required',
            'address' => 'required',
            'photo' => 'required',
            'password' => 'required|min:6|max:20',
        ]);
        $society = new Society;
        $society->nik = $request->nik;
        $society->name = $request->name;
        $society->username = $request->username;
        $society->email = $request->email;
        $society->phone_number = $request->phone_number;
        $society->address = $request->address;

        $society->password = Hash::make($request->password);
        $photo = $request->file('photo');
        $tujuan_upload = 'avatar_society';
        $photo_name = time() . "_" . $photo->getClientOriginalName();
        $photo->move($tujuan_upload, $photo_name);
        $society->photo = $photo_name;
        $result = $society->save();
        if ($result) {
            return redirect()->route('user_login')->with(['success' => 'Register successfully !']);
        } else {
            return redirect()->back()->with(['success' => 'Society Data Failed Saved']);
        };
    }
    public function login()
    {
        return view('frontend.login.login');
    }

    public function postlogin(Request $request)
    {
        $this->validate($request, [
            'username' => 'required',
            'password' => 'required',
        ]);
        $username = $request->username;
        $pw = $request->password;
        $society = Society::where('username', $username)->first();
        if ($society != NULL) {
            if (Hash::check($pw, $society->password)) {
                Session::put('society_id', $society->id);
                Session::put('nik', $society->nik);
                Session::put('name', $society->name);
                Session::put('username', $society->username);
                 Session::put('email', $society->email);
                Session::put('photo', $society->photo);
                Session::put('phone_number', $society->phone_number);
                Session::put('address', $society->address);
                return redirect()->route('user_home');
            } else {
                return redirect()->back()->with(['error' => 'Invalid nik or password']);
            }
        } else {
            return redirect()->back()->with(['error' => 'Invalid nik or password']);
        }
    }

    public function home()
    {
        if (Session::get('nik') != NULL) {
            $nik = Session::get('nik');
            $data['count_complaint'] = Complaint::where('nik', $nik)->count();
            $data['count_process'] = Complaint::where('nik', $nik)->where('status', 'process')->count();
            $data['count_completed'] = Complaint::where('nik', $nik)->where('status', 'finished')->count();
            $data['complaints'] = Complaint::where('nik', $nik)
                ->with(['Society', 'Response'])
                ->orderBy('created_at', 'desc')
                ->get();
            return view('frontend.complaint.index', $data);
        } else {
            return redirect('/');
        }
    }

    public function logout()
    {
        Session::flush();
        return redirect('/');
    }
    public function add_complaint()
    {
        if (Session::get('nik') != NULL) {
            try {
                $data['categories'] = Category::all();
            } catch (\Exception $e) {
                // Fallback jika table belum ada
                $data['categories'] = collect([
                    (object)['id' => 1, 'name' => 'Fasilitas Sekolah'],
                    (object)['id' => 2, 'name' => 'Kurikulum dan Pembelajaran'],
                    (object)['id' => 3, 'name' => 'Tenaga Pendidik'],
                    (object)['id' => 4, 'name' => 'Administrasi'],
                    (object)['id' => 5, 'name' => 'Keamanan'],
                    (object)['id' => 6, 'name' => 'Lainnya'],
                ]);
            }
            return view('frontend.complaint.add', $data);
        } else {
            return redirect('/');
        }
    }

    public function save_complaint(Request $request)
    {
        $this->validate($request, [
            'contents_of_the_report' => 'required|min:2',
            'category_id' => 'required|integer',
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        $nik = Session::get('nik');
        $society = Session::get('society_id');
        $complaint = new Complaint;

        $complaint->contents_of_the_report = $request->contents_of_the_report;
        $complaint->category_id = $request->category_id;
        $photo = $request->file('photo');
        $tujuan_upload = 'avatar_complaint';
        $photo_name = time() . "_" . $photo->getClientOriginalName();
        $photo->move($tujuan_upload, $photo_name);
        $complaint->photo = $photo_name;
        $complaint->status = '0';
        $complaint->date_complaint = Date::now()->format('Y-m-d');
        $complaint->nik = $nik;
        $complaint->society_id = $society;
        try {
            $complaint->save();
            $complaint_id = $complaint->id;

            $response = new Response;
            $response->complaint_id = $complaint_id;
            $response->save();

            return redirect()->route('user_home')->with(['success' => 'Complaint has been saved !']);
        } catch (\Exception $e) {
            \Log::error('Error saving complaint: ' . $e->getMessage());
            return redirect()->back()->with(['error' => 'Gagal menyimpan pengaduan: ' . $e->getMessage()])->withInput();
        }
    }
    public function complaint()
    {
        try {
            if (Session::get('nik') != NULL) {
                $nik = Session::get('nik');
                $complaints = Complaint::where('nik', $nik)
                    ->with(['Society', 'Response', 'Category'])
                    ->orderBy('created_at', 'desc')
                    ->get();

                return view('frontend.complaint.index1', compact('complaints'));
            } else {
                return redirect('/')->with('error', 'Silakan login terlebih dahulu');
            }
        } catch (\Exception $e) {
            \Log::error('Error loading complaint history: ' . $e->getMessage());
            return redirect('/')->with('error', 'Terjadi kesalahan saat memuat data pengaduan');
        }
    }
    public function detail_complaint($id)
    {
        if (Session::get('nik') != NULL) {
            # code...
            $data['complaint'] = Complaint::findOrFail($id);
            return view('frontend.complaint.detail', $data);
        } else {
            return redirect('/');
        }
    }

    public function search_complaint(Request $request)
{
    $this->validate($request, [
        'nik' => 'required|min:2|max:20',
    ]);
    
    $nik = $request->nik;
    $data['complaints'] = Complaint::with('society')->where('nik', $nik)->get();
    $data['search_nik'] = $nik;
    
    return view('frontend.search_result', $data);
}

    public function track_complaint()
    {
        return view('frontend.track_complaint');
    }
}
