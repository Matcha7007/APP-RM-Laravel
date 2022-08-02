<?php

namespace App\Http\Controllers;

use App\Exports\PasienExport;
use App\Models\Gender;
use App\Models\Kategori;
use App\Models\Kunjungan;
use App\Models\Pasien;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;

class PasienController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('components.pasien.index', [
            'title' => 'Data Pasien',
            'pasiens' => Pasien::with(['kategori'])->latest()->paginate(15)
        ]); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // dd(Session::has(''));
        return view('components.pasien.create',[
            'title' => 'Tambah Data Pasien',
            'genders' => Gender::all(),
            'kategories' => Kategori::all()
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
        // $route = Route::current()->getName();
        // dd($route);
        // dd(View::hasSection('pendaftaran'));
        $validatedData = $request->validate([
            'name' => 'required|max:100',
            'slug' => 'required|unique:pasiens',
            'gender_id' => 'required',
            'kategori_id' => 'required',
            'no_hp' => 'required|numeric',
            'nik' => 'required|unique:pasiens|numeric',
            'alamat' => 'required|max:255',
            'tgl_lahir' => 'required',
        ]);

        $validatedData['tgl_lahir'] = date('Y:m:d', strtotime($validatedData['tgl_lahir']));
        Pasien::create($validatedData);

        return redirect('/input/pasien')->with('success', 'Data pasien baru berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pasien  $pasien
     * @return \Illuminate\Http\Response
     */
    public function show(Pasien $pasien)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pasien  $pasien
     * @return \Illuminate\Http\Response
     */
    public function edit(Pasien $pasien)
    {
        dd($pasien);
        return view('components.pasien.edit',[
            'title' => 'Ubah Data Pasien',
            'genders' => Gender::all(),
            'kategories' => Kategori::all(),
            'pasien' => $pasien
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pasien  $pasien
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pasien $pasien)
    {
        $rules = [
            'name' => 'required|max:100',
            'gender_id' => 'required',
            'kategori_id' => 'required',
            'no_hp' => 'required|numeric',
            'alamat' => 'required|max:255',
            'tgl_lahir' => 'required',
        ];

        if($request->slug != $pasien->slug){
            $rules['slug'] = 'required|unique:pasiens';
        }elseif($request->nik != $pasien->nik){
            $rules['nik'] = 'required|unique:pasiens|numeric';
        }


        $validatedData = $request->validate($rules);

        $validatedData['tgl_lahir'] = date('Y:m:d', strtotime($validatedData['tgl_lahir']));
        Pasien::where('id', $pasien->id)
            ->update($validatedData);
        return redirect('/input/pasien')->with('success', 'Data pasien berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pasien  $pasien
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pasien $pasien)
    {
        Pasien::destroy($pasien->id);
        return redirect('/input/pasien')->with('success', 'Data pasien berhasil dihapus!');
    }
    public function slugPasien(Request $request)
    {
        $slug = SlugService::createSlug(Pasien::class, 'slug', $request->name);
        return response()->json(['slug' => $slug]);
    }

    public function formLaporan(){
        return view('components.pasien.form-laporan', [
            'title' => 'Laporan Pasien',
            'pasiens' => Pasien::with(['kategori','gender'])->latest()->paginate(15)
        ]); 
    }

    public function unduh(){
        $fileName = 'Data_Pasien.xlsx';
        return (new PasienExport)->download($fileName);
    }

    public function tambahPasien()
    {
        // dd(View::hasSection('pendaftaran'));
        return view('landingpage.tambah-pasien',[
            'title' => 'Tambah Data Pasien',
            'genders' => Gender::all(),
            'kategories' => Kategori::all()
        ]);
    }
    
    public function tambahPasienStore(Request $request) {
        $validatedData = $request->validate([
            'name' => 'required|max:100',
            'slug' => 'required|unique:pasiens',
            'gender_id' => 'required',
            'kategori_id' => 'required',
            'no_hp' => 'required|numeric',
            'nik' => 'required|unique:pasiens|numeric',
            'alamat' => 'required|max:255',
            'tgl_lahir' => 'required',
        ]);

        $validatedData['tgl_lahir'] = date('Y:m:d', strtotime($validatedData['tgl_lahir']));
        Pasien::create($validatedData);
        $user = Auth::user()->role_id;
        if ($user === 3)
        {
            return redirect('/')->with('success', 'Data pasien baru berhasil ditambahkan, silahkan lanjutkan pendaftaran!');
        }
        elseif ($user === 2)
        {
            return redirect('/dashboard')->with('success', 'Data pasien baru berhasil ditambahkan!');
        }
    }

}
