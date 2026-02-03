<?php

namespace App\Http\Controllers;

use App\Models\Society;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use File;

class SocietyController extends Controller
{
    public function index(Request $request)
    {
        $filter = $request->get('filter');
        if ($filter == 'active') {
            $society = Society::whereHas('complaints')->get();
        } elseif ($filter == 'inactive') {
            $society = Society::whereDoesntHave('complaints')->get();
        } else {
            $society = Society::all();
        }
        $data['society'] = $society;
        $data['active_society'] = Society::whereHas('complaints')->count();
        $data['inactive_society'] = Society::whereDoesntHave('complaints')->count();
        return view('admin.society.index', $data);
    }

    public function create()
    {
        return view('admin.society.add');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nik' => 'required|min:2|max:20|unique:society,nik',
            'username' => 'required|min:2|max:20|unique:society,username',
            'email' => 'required|email|unique:society,email',
            'name' => 'required|min:2|max:20',
            'password' => 'required|min:5|max:20',
            'phone_number' => 'required',
            'address' => 'required',
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        $society = new Society;
        $society->nik = $request->nik;
        $society->username = $request->username;
        $society->email = $request->email;
        $society->name = $request->name;
        $society->phone_number = $request->phone_number;
        $society->address = $request->address;
        $society->password = Hash::make($request->password);
        $photo = $request->file('photo');
        $tujuan_upload = 'avatar_society';
        $photo_name = time() . "_" . $photo->getClientOriginalName();
        $photo->move($tujuan_upload, $photo_name);
        $society->photo = $photo_name;
        $society->save();
        if ($request->submit == "more") {
            return redirect()->route('society.create')->with(['success' => 'User has been saved !']);
        } else {
            return redirect()->route('society.index')->with(['success' => 'User has been saved']);
        };
    }
    public function destroy($id)
    {
        $society = Society::findOrFail($id);
        if ($society->photo && File::exists('avatar_society/' . $society->photo)) {
            File::delete('avatar_society/' . $society->photo);
        }
        $society->delete();
        if (request()->ajax()) {
            return response()->json(['success' => 'Society has been deleted']);
        }
        return redirect()->back()->with(['success' => 'Society has been deleted']);
    }

    public function edit($id)
    {
        $data['society'] = Society::findOrFail($id);
        return view('admin.society.edit', $data);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nik' => 'required|min:2|max:20|unique:society,nik,'.$id,
            'username' => 'required|min:2|unique:society,username,'.$id,
            'email' => 'required|email|unique:society,email,'.$id,
            'name' => 'required|min:2|max:20',
            'phone_number' => 'required',
            'address' => 'required',
        ]);
        $society = Society::findOrFail($id);
        $society->nik = $request->nik;
        $society->username = $request->username;
        $society->email = $request->email;
        $society->name = $request->name;
        $society->phone_number = $request->phone_number;
        $society->address = $request->address;
        if ($request->get('password') != '') {
            $society->password = Hash::make($request->password);
        }
        if ($request->hasFile('photo')) {
            File::delete('avatar_society/' . $society->photo);
            $photo = $request->file('photo');
            $tujuan_upload = 'avatar_society';
            $photo_name = time() . "_" . $photo->getClientOriginalName();
            $photo->move($tujuan_upload, $photo_name);
            $society->photo = $photo_name;
        }
        $result = $society->save();
        if ($result) {
            return redirect()->route('society.index')->with(['success' => 'Society has been updated']);
        } else {
            return redirect()->back();
        }
    }
}
