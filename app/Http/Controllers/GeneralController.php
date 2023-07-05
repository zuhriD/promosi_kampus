<?php

namespace App\Http\Controllers;

use App\Models\Quisioner;
use Illuminate\Http\Request;
use App\Models\JenisQuisioner;
use App\Models\PertanyaanResponden;
use Illuminate\Support\Facades\Session;

class GeneralController extends Controller
{


    public function saveSession(Request $request)
    {


        $respondenData = [
            'as' => $request->input('as'),
            'Name' => $request->input('Name'),
            'email' => $request->input('email')
        ];

        Session::put('responden', $respondenData);


        return redirect()->route('general.quisionerM');
    }

    public function quisionerM()
    {
        $responden = Session::get('responden');

        // dd($responden);
        // Mengirim data responden ke view

        $data['responden'] = $responden;
        $data['quisioner'] = JenisQuisioner::with('listPertanyaan')->first();

        // dd($quisioner);
        return view('general.quisioner.quisionerM', $data);
    }

    public function saveSessionQusionerM(Request $request)
    {


        // dd($request->all());
        $inputAtasKeys = array_filter(array_keys($request->all()), function($key) {
            return strpos($key, 'inputAtas_') === 0;
        });

        $inputBawahKeys = array_filter(array_keys($request->all()), function($key) {
            return strpos($key, 'inputBawah_') === 0;
        });

        $jawaban = [];

        foreach ($inputAtasKeys as $key) {
            $index = substr($key, strlen('inputAtas_'));
            $nilaiJawaban = [
                'id_responden' => $request->input('id_responden'),
                'id_list' => $request->input('id_list'),
                'type_jawaban' => 'inputAtas',
                'nilai_jawaban' => intval($request->input($key))
            ];
            $jawaban[] = $nilaiJawaban;
        }

        foreach ($inputBawahKeys as $key) {
            $index = substr($key, strlen('inputBawah_'));
            $nilaiJawaban = [
                'id_responden' => 1,
                'id_list' => $request->input('id_list'),
                'type_jawaban' => 'inputBawah',
                'nilai_jawaban' => 1 / intval($request->input($key))
            ];
            $jawaban[] = $nilaiJawaban;
        }

        PertanyaanResponden::insert($jawaban);


        // Menggunakan metode create untuk menyimpan data ke dalam database




        // return redirect()->route('general.quisionerM');
    }
}
