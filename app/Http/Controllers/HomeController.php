<?php

namespace App\Http\Controllers;

use App\Models\Quisioner;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (Auth::user()->role < 5) {
            $data['title'] = 'Dashboard';
            return view('admin.dashboard', $data);
        } else {
            return redirect()->route('schedule.index');
        }
    }

    public function profile()
    {
        $data['title'] = 'Profile';
        $data['usr'] = User::findOrFail(Auth::user()->id);
        return view('admin.profile', $data);
    }

    public function updateprofile(Request $request)
    {

        $usr = User::findOrFail(Auth::user()->id);
        if ($usr) {
            $this->validate($request, [
                'name' => 'string|max:200|min:3',
                'email' => 'string|min:3|email',
                'user_image' => 'image|mimes:jpg,png,jpeg,gif,svg|max:1024',
                'password' => 'min:8|confirmed|required',
                'password_confirmation' => 'min:8|required',
            ]);
            $img_old = Auth::user()->user_image;
            if ($request->file('user_image')) {
                # delete old img
                if ($img_old && file_exists(public_path() . $img_old)) {
                    unlink(public_path() . $img_old);
                }
                $nama_gambar = time() . '_' . $request->file('user_image')->getClientOriginalName();
                $upload = $request->user_image->storeAs('public/admin/user_profile', $nama_gambar);
                $img_old = Storage::url($upload);
            }
            $usr->update([
                'name' => $request->name,
                'email' => $request->email,
                'user_image' => $img_old,
                'password' => Hash::make($request->password)
            ]);
            return redirect()->route('profile')->with('status', 'Perubahan telah tersimpan');
        } else {
            return redirect()->route('profile')->with('status', 'Perubahan telah tersimpan');
        }
    }


}
