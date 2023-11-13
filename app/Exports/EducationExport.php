<?php

namespace App\Exports;

use App\Models\Education;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class EducationExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        return view('education.export-education', [
            'educations' => Education::all(),
        ]);
    }
}
