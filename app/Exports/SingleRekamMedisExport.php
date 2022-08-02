<?php

namespace App\Exports;

use App\Models\RekamMedis;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class SingleRekamMedisExport implements FromView
{
    use Exportable;
    /**
    * @return \Illuminate\Support\Collection
    */

    public function __construct(string $no_rm)
    {
        $this->no_rm = $no_rm;
    }

    public function view() : View
    {
        return view('components.rekam-medis.template-single',[
            'title' =>'',
            'datarm' => RekamMedis::query()->where('no_rm', $this->no_rm)->get()
        ]);
    }
}
