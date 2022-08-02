<?php

namespace App\Http\Controllers;

use App\Models\Dokter;
use App\Models\Kunjungan;
use App\Models\RekamMedis;
use Illuminate\Http\Request;

class RekamMedisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('components.rekam-medis.index', [
            'title' => 'Data Rekam Medis',
            'datarm' => RekamMedis::with(['kunjungan','dokter'])->latest()->paginate(15)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('components.rekam-medis.create', [
            'title' => 'Tambah Data Rekam Medis',
            'kunjungans' => Kunjungan::where('isActive','1')->get(),
            'dokters' => Dokter::all()
        ]);
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
        $data = $request->validate([
            'kunjungan_id' => 'required',
            'dokter_id' => 'required',
            'diagnosa' => 'required',
            'terapi' => 'required',
        ]);
        $norm = 'RM-'.date('ymdHis', strtotime(now()));
        $data['no_rm'] = $norm;
        RekamMedis::create($data);
        Kunjungan::where('id', $data['kunjungan_id'])
        ->update(['isActive' => 0]);

        return redirect('/analis/rekam-medis')->with('success', 'Data rekam medis baru berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\RekamMedis  $rekammedis
     * @return \Illuminate\Http\Response
     */
    public function show(RekamMedis $rekammedis)
    {
        dd($rekammedis);
        return view('components.rekam-medis.show', [
            'title' => 'Data Rekam Medis',
            ''
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\RekamMedis  $RekamMedis
     * @return \Illuminate\Http\Response
     */
    public function edit(RekamMedis $RekamMedis)
    {
        dd($RekamMedis);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\RekamMedis  $RekamMedis
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RekamMedis $RekamMedis)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RekamMedis  $RekamMedis
     * @return \Illuminate\Http\Response
     */
    public function destroy(RekamMedis $RekamMedis)
    {
        //
    }
}
