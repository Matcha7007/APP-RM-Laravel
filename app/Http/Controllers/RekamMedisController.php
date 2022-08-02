<?php

namespace App\Http\Controllers;

use App\Exports\BulananRekamMedisExport;
use App\Exports\HarianRekamMedisExport;
use App\Exports\SingleRekamMedisExport;
use App\Exports\TahunanRekamMedisExport;
use App\Models\Dokter;
use App\Models\Kunjungan;
use App\Models\RekamMedis;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;

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
            'datarm' => RekamMedis::with(['kunjungan','dokter'])->latest()->filter(request(['search']))->paginate(15)
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
     * @param  \App\Models\RekamMedis  $rekamMedis
     * @return \Illuminate\Http\Response
     */
    public function show(RekamMedis $rekam_medi)
    {
        // dd($rekamMedis);
        return view('components.rekam-medis.show', [
            'title' => 'Data Rekam Medis',
            'datarm' => $rekam_medi 
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\RekamMedis  $rekamMedis
     * @return \Illuminate\Http\Response
     */
    public function edit(RekamMedis $rekam_medi)
    {
        dd($rekam_medi);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\RekamMedis  $rekamMedis
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RekamMedis $rekamMedis)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RekamMedis  $rekamMedis
     * @return \Illuminate\Http\Response
     */
    public function destroy(RekamMedis $rekamMedis)
    {
        dd($rekamMedis);
    }

    public function formLaporan(){

        // $date = date('Y-m-d h:i:sa');

        // $query = DB::table('rekam_medis')
        //             ->join('kunjungans', 'kunjungans.id', '=', 'rekam_medis.kunjungan_id')
        //             ->where('kunjungans.tanggal_kunjungan', '=', '2022-07-30')
        //             ->get();

        // $comments = RekamMedis::with(['kunjungan' => function ($query) {
        //     $query->where('tanggal_kunjungan', '=', '2022-07-30');
        // }])->get();
        // dd($comments);

        return view('components.rekam-medis.form-laporan', [
            'title' => 'Laporan Rekam Medis'
        ]);
    }

    public function unduhSingle(RekamMedis $rekam_medi){
        return view('components.rekam-medis.preview-single-rm', [
            'title' => 'Preview',
            'datarm' => $rekam_medi
        ]);
    }

    public function unduhHarian(){
        $date = date('Y-m-d', strtotime(request('harian')));
        $fileName = 'Data_Rekam_Medis_'.$date.'.xlsx';
        return (new HarianRekamMedisExport($date))->download($fileName);
    }

    public function unduhBulanan(){
        $rangeDate = explode(" - ", request('bulanan'));
        // dd($rangeDate[0].' dan '.$rangeDate[1]);
        $date1 = date('Y-m-d', strtotime($rangeDate[0]));
        $date2 = date('Y-m-d', strtotime($rangeDate[1]));
        $fileName = 'Data_Rekam_Medis_'.$date1.'_'.$date2.'.xlsx';
        return (new BulananRekamMedisExport($date1, $date2))->download($fileName);
    }

    public function unduhTahunan(){
        // dd(request('tahunan'));
        $date = request('tahunan');
        $fileName = 'Data_Rekam_Medis_Tahun'.$date.'.xlsx';
        return (new TahunanRekamMedisExport($date))->download($fileName);
    }
}
