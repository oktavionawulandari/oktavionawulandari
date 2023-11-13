<?php

namespace App\Exports;

use App\Models\Hobby;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class HobbyExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        return view('hobby.export-hobby', [
            'hobbies' => Hobby::all(),
        ]);
    }
}
