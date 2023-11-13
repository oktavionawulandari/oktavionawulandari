<?php

namespace App\Exports;

use App\Models\Skill;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class SkillExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        return view('skill.export-skill', [
            'skills' => Skill::all(),
        ]);
    }
}
