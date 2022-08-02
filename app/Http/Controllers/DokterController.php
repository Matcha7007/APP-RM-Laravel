<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Poli;
use App\Models\Dokter;
use App\Models\Gender;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Exports\DokterExport;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;
use \Cviebrock\EloquentSluggable\Services\SlugService;

class DokterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('components.dokter.index', [
            'title' => 'Data Dokter',
            'dokters' => Dokter::with('poli')->latest()->paginate(15)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('components.dokter.create',[
            'title' => 'Tambah Data Dokter',
            'genders' => Gender::all(),
            'polies' => Poli::all()
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
        $dataValidated = $request->validate([
            'name' => 'required|max:100',
            'slug' => 'required|unique:dokters',
            'gender_id' => 'required',
            'poli_id' => 'required',
            'no_hp' => 'required|numeric',
            'jam_start' => 'required',
            'jam_end' => 'required',
        ]);
        $dataValidated['jam_start'] = date('H:i', strtotime($dataValidated['jam_start']));
        $dataValidated['jam_end'] = date('H:i', strtotime($dataValidated['jam_end']));

        // return $dataValidated;

        Dokter::create($dataValidated);
        return redirect('/input/dokter')->with('success', 'Data dokter baru sukses ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Dokter  $dokter
     * @return \Illuminate\Http\Response
     */
    public function show(Dokter $dokter)
    {
        return view('components.dokter.show', [
            'user' => $dokter,
            'title' => $dokter->name
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Dokter  $dokter
     * @return \Illuminate\Http\Response
     */
    public function edit(Dokter $dokter)
    {
        return view('components.dokter.edit',[
            'title' => 'Ubah Data Dokter',
            'genders' => Gender::all(),
            'polies' => Poli::all(),
            'dokter' => $dokter
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Dokter  $dokter
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Dokter $dokter)
    {
        $rules = [
            'name' => 'required|max:100',
            'gender_id' => 'required',
            'poli_id' => 'required',
            'no_hp' => 'required|numeric',
            'jam_start' => 'required',
            'jam_end' => 'required',
        ];

        if($request->slug != $dokter->slug){
            $rules['slug'] = 'required|unique:dokters';
        }

        $dataValidated = $request->validate($rules);
        $dataValidated['jam_start'] = date('H:i', strtotime($dataValidated['jam_start']));
        $dataValidated['jam_end'] = date('H:i', strtotime($dataValidated['jam_end']));

        Dokter::where('id', $dokter->id)
            ->update($dataValidated);
        return redirect('/input/dokter')->with('success', 'Data dokter berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Dokter  $dokter
     * @return \Illuminate\Http\Response
     */
    public function destroy(Dokter $dokter)
    {
        Dokter::destroy($dokter->id);
        return redirect('/input/dokter')->with('success', 'Data dokter sudah dihapus!');
    }

    public function createSlug(Request $request)
    {
        $slug = SlugService::createSlug(Dokter::class, 'slug', $request->name);
        return response()->json(['slug' => $slug]);
    }

    public function formLaporanDokter(){
        $query = ['poli_id', '1'];
        return view('components.dokter.form-laporan', [
                'title' => 'Laporan Dokter',
                'dokters' => Dokter::with(['poli', 'gender'])->latest()->paginate(15)
        ]);
    }

    public function filterLaporan(Request $request){
        dd($request['filter']);
    }

    public function preview()
    {
        return view('components.dokter.preview', [
            'title' => 'Laporan Dokter',
            'dokters' => Dokter::with(['poli', 'gender'])->latest()->get()
        ]);
    }

    public function unduh(){
        $fileName = 'Data_Dokter.xlsx';
        return (new DokterExport)->download($fileName);
    }
}
