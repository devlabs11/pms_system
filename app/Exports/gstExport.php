<?php

namespace App\Exports;

use App\Models\GstModel;
use Maatwebsite\Excel\Concerns\FromCollection;

class gstExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return GstModel::all();
    }
}
