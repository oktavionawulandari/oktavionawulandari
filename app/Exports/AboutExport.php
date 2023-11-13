<?php

namespace App\Exports;

use App\Models\About;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class AboutExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        return view('about.export-about', [
            'abouts' => About::all(),
        ]);
    }
}
