<?php

namespace App\Exports;

use App\Models\Pasien;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class PasienExport implements FromView, ShouldAutoSize
{
    use Exportable;
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        return view('components.pasien.export', [
            'title' => 'Data RM Pasien',
            'pasiens' => Pasien::with(['kategori', 'gender'])->latest()->get()
        ]);
    }
}
