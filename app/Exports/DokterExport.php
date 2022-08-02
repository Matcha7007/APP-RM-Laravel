<?php

namespace App\Exports;

use App\Models\Dokter;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class DokterExport implements FromView, ShouldAutoSize
{
    use Exportable;
    /**
    * @return \Illuminate\Support\Collection
    */
    // public function collection()
    // {
    //     return Dokter::all();
    // }

    public function view(): View
    {
        return view('components.dokter.export', [
            'title' => 'Laporan Dokter',
            'dokters' => Dokter::with(['poli', 'gender'])->latest()->get()
        ]);
    }
}
