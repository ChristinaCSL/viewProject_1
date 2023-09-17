<?php

namespace App\Exports;

use App\Models\category;
use App\Models\book;
use Illuminate\contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class CategoryExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view():View
    {
        return view('showExcel',[
            'categories'=>category::all(),
            'books'=>book::all()
        ]);
    }
}
