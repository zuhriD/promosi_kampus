<?php

namespace App\Http\Controllers;

use App\Models\Quisioner;
use Illuminate\Http\Request;

class QuisionerController extends Controller
{

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

        $data['title'] = 'Data Quisioner';
        $data['kuisioner'] = Quisioner::all();
        return view('admin.quisioner.index', $data);
    }



    public function create()
    {
        $data['title'] = 'Buat Quisioner';
        return view('admin.quisioner.addQuisioner', $data);
    }

    public function store(Request $request)
    {
        Quisioner::create($request->all());

        return redirect()->route('kuisioner.index');
    }

    public function show($id)
    {
        $data['title'] = 'Detail Quisioner';
        $data['quisioner'] = Quisioner::with('jenisQuisioner')->find($id);

        // dd($data);
        return view('admin.quisioner.detailQuisioner',$data);
    }
    public function edit($id)
    {
        $data['title'] = 'Edit Quisioner';
        $data['quisioner'] = Quisioner::find($id);

        return view('admin.quisioner.ubahQuisioner',$data);
    }
    public function update($id,Request $request)
    {
        $kuis = Quisioner::find($id);
        $kuis->update($request->all());

        return redirect()->route('kuisioner.index');
    }

    public function destroy($id)
    {

        Quisioner::find($id)->delete();

        return redirect()->route('kuisioner.index');
    }

}
