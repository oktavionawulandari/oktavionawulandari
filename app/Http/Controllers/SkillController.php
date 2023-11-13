<?php

namespace App\Http\Controllers;

use App\Models\Skill;
use App\Exports\SkillExport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;
use PDF;

class SkillController extends Controller
{
    public function index()
    {
        $skills = Skill::all();
        return view('skill.index', compact('skills'));
    }

    public function create()
    {
        return view('skill.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'image' => 'image|file|max:3024',
            'judul' => 'required|string|max:150',
            'deskripsi' => 'required',
        ]);
        if ($request->hasFile('image'))
        {
            $request->file('image')->move(public_path('storage/post-images/'), $request->file('image')->getClientOriginalName());
            $request->image = 'storage/post-images/' . $request->file('image')->getClientOriginalName();
        }

        $skills = Skill::create([
            'image'=>$request->image,
            'judul'=>$request->judul,
            'deskripsi'=>$request->deskripsi,
        ]);
        if ($skills) {
            return redirect()
                ->route('skill.index')
                ->with(['success' => 'Data skill telah berhasil ditambahkan']);
        } else {
            return back()
                ->withInput()
                ->with(['error' => 'Terjadi kesalahan, silahkan coba kembali'
                ]);
        }
    }

    public function edit($id)
    {
        $skills = Skill::findOrFail($id);
        return view('skill.edit', compact('skills'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'image' => 'image|file|max:3024',
            'judul' => 'required|string|max:150',
            'deskripsi' => 'required',
        ]);
        
        if($request->hasFile('image'))
        {
            if($request->oldImage){
                Storage::delete($request->oldImage);
            }
            $request->file('image')->move(public_path('storage/post-images/'), $request->file('image')->getClientOriginalName());
            $request->image = 'storage/post-images/' . $request->file('image')->getClientOriginalName();
        }
        $skills = Skill::findOrFail($id);
        $skills->update([
            'image' => $request->image,
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
        ]);
        if ($skills) {
            return redirect()
                ->route('skill.index')
                ->with(['success' => 'Data skill telah berhasil ditambahkan']);
        } else {
            return back()
                ->withInput()
                ->with(['error' => 'Terjadi kesalahan, silahkan coba kembali'
                ]);
        }
    }

    public function skill_pdf()
    {
        $skills = Skill::all();
        $pdf = PDF::loadview('skill.export-skill', ['skills' => $skills]);
        set_time_limit(300);
        return $pdf->stream('data-skill-webportofolio.pdf');
    }

    public function cetak_excel()
    {
        return Excel::download(new SkillExport, 'skill.xlsx');
    }

    public function destroy(Skill $skill)
    {
        if($skill->image){
            Storage::delete($skill->image);
        }
        Skill::destroy($skill->id);
        if ($skill) {
            return redirect()
                ->route('skill.index')
                ->with(['success' => 'Data skill telah berhasil dihapus']);
        } else {
            return redirect()
                ->route('skill.index')
                ->with(['error' => 'Terjadi kesalahan, silahkan coba kembali']);
        }
    }  
}
