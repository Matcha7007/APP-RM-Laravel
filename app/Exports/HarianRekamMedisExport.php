<?php

namespace App\Exports;

use App\Models\RekamMedis;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class HarianRekamMedisExport implements FromView, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    use Exportable;

    function __construct($date)
    {
        $this->date = $date;
    }

    public function view() : View
    {
        return view('components.rekam-medis.preview-rm',[
            'title' => 'Data Rekam Medis Harian',
            'datarm' => RekamMedis::whereHas('kunjungan', function ($query) {
                        return $query->where('tanggal_kunjungan', '=', $this->date);
                        })->with(['kunjungan', 'dokter'])->get(),
            'tanggal' => $this->date
        ]);
    }
}
