<?php

namespace App\Exports;

use App\Models\RekamMedis;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class BulananRekamMedisExport implements FromView, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    use Exportable;

    function __construct($date1,$date2)
    {
        $this->date1 = $date1;
        $this->date2 = $date2;
    }

    public function view() : View
    {
        return view('components.rekam-medis.preview-rm-bulanan',[
            'title' => 'Data Rekam Medis Harian',
            'datarm' => RekamMedis::whereHas('kunjungan', function ($query) {
                        return $query->whereBetween('tanggal_kunjungan', [$this->date1, $this->date2]);
                        })->with(['kunjungan', 'dokter'])->get(),
            'tanggal1' => $this->date1,
            'tanggal2' => $this->date2,
        ]);
    }
}
