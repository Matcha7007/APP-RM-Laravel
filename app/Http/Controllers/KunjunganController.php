<?php

namespace App\Http\Controllers;

use App\Models\Kunjungan;
use App\Models\Pasien;
use App\Models\Pelayanan;
use App\Models\Poli;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KunjunganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('components.kunjungan.index', [
            'title' => 'Pendaftaran Kunjungan Pasien',
            'pasiens' => Pasien::orderBy('name','asc')->get(),
            'polies' => Poli::all(),
            'pelayanans' => Pelayanan::all()
        ]); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        $user = Auth::user()->role_id;
        $dataValidated = $request->validate([
            'pasien_id' => 'required',
            'poli_id' => 'required',
            'pelayanan_id' => 'required'
        ]);
        $dataValidated['tanggal_kunjungan'] = date('Y:m:d', strtotime(now()));
        $dataValidated['user_id'] = auth()->user()->id;
        Kunjungan::create($dataValidated);
        Pasien::where('id', $dataValidated['pasien_id'])
                ->update(['isQueue' => true]);
        if($user === 1 || $user === 2)
        {
            return redirect('/dashboard')->with('success', 'Pendaftaran berhasil ditambahkan ke antrian!');
        }
        elseif($user === 3)
        {
            return redirect('/')->with('success', 'Pendaftaran berhasil ditambahkan ke antrian!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('landingpage.daftar-kunjungan', [
            'title' => 'Pendaftaran Kunjungan Pasien',
            'pasiens' => Pasien::orderBy('name','asc')->get(),
            'polies' => Poli::where('id', $id)->get(),
            'pelayanans' => Pelayanan::all()
        ]); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
