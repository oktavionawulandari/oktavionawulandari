<?php

namespace App\Http\Controllers;

use App\Models\Hobby;
use App\Exports\HobbyExport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;
use PDF;


class HobbyController extends Controller
{

    public function index()
    {
        $hobbies = Hobby::all();
        return view('hobby.index', compact('hobbies'));
    }

    public function create()
    {
        return view('hobby.create');
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

        $hobbies = Hobby::create([
            'image'=>$request->image,
            'judul'=>$request->judul,
            'deskripsi'=>$request->deskripsi,
        ]);
        if ($hobbies) {
            return redirect()
                ->route('hobby.index')
                ->with(['success' => 'Data hobby telah berhasil ditambahkan']);
        } else {
            return back()
                ->withInput()
                ->with(['error' => 'Terjadi kesalahan, silahkan coba kembali'
                ]);
        }
    }

    public function edit($id)
    {
        $hobbies = Hobby::findOrFail($id);
        return view('hobby.edit', compact('hobbies'));
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
        $hobbies = Hobby::findOrFail($id);
        $hobbies->update([
            'image' => $request->image,
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
        ]);
        if ($hobbies) {
            return redirect()
                ->route('hobby.index')
                ->with(['success' => 'Data hobby telah berhasil ditambahkan']);
        } else {
            return back()
                ->withInput()
                ->with(['error' => 'Terjadi kesalahan, silahkan coba kembali'
                ]);
        }
    }

    public function hobby_pdf()
    {
        $hobbies = Hobby::all();
        $pdf = PDF::loadview('hobby.export-hobby', ['hobbies' => $hobbies]);
        set_time_limit(300);
        return $pdf->stream('data-hobby-webportofolio.pdf');
    }

    public function cetak_excel()
    {
        return Excel::download(new HobbyExport, 'hobby.xlsx');
    }

    public function destroy(Hobby $hobby)
    {
        if($hobby->image){
            Storage::delete($hobby->image);
        }
        Hobby::destroy($hobby->id);
        if ($hobby) {
            return redirect()
                ->route('hobby.index')
                ->with(['success' => 'Data hobby telah berhasil dihapus']);
        } else {
            return redirect()
                ->route('hobby.index')
                ->with(['error' => 'Terjadi kesalahan, silahkan coba kembali']);
        }
    }  
}