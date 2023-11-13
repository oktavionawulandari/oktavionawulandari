<?php

namespace App\Http\Controllers;

use App\Models\Education;
use App\Exports\EducationExport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;
use PDF;
use Illuminate\Support\Facades\DB;

class EducationController extends Controller
{
    public function index()
    {
        $educations = Education::all();
        return view('education.index', compact('educations'));
    }

    public function create()
    {
        return view('education.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'image' => 'image|file|max:3024',
            'judul' => 'required|string|max:150',
            'deskripsi' => 'required',
            'status' => 'required',
        ]);
        if ($request->hasFile('image'))
        {
            $request->file('image')->move(public_path('storage/post-images/'), $request->file('image')->getClientOriginalName());
            $request->image = 'storage/post-images/' . $request->file('image')->getClientOriginalName();
        }

        $educations = Education::create([
            'image'=>$request->image,
            'judul'=>$request->judul,
            'deskripsi'=>$request->deskripsi,
            'status' =>$request->status,
        ]);
        if ($educations) {
            return redirect()
                ->route('education.index')
                ->with(['success' => 'Data education telah berhasil ditambahkan']);
        } else {
            return back()
                ->withInput()
                ->with(['error' => 'Terjadi kesalahan, silahkan coba kembali'
                ]);
        }
    }

    public function edit($id)
    {
        $educations = Education::findOrFail($id);
        return view('education.edit', compact('educations'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'image' => 'image|file|max:3024',
            'judul' => 'required|string|max:150',
            'deskripsi' => 'required',
            'status' =>$request->status,
        ]);
        
        if($request->hasFile('image'))
        {
            if($request->oldImage){
                Storage::delete($request->oldImage);
            }
            $request->file('image')->move(public_path('storage/post-images/'), $request->file('image')->getClientOriginalName());
            $request->image = 'storage/post-images/' . $request->file('image')->getClientOriginalName();
        }
        $educations = Education::findOrFail($id);
        $educations->update([
            'image' => $request->image,
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'status' =>$request->status,
        ]);
        if ($educations) {
            return redirect()
                ->route('education.index')
                ->with(['success' => 'Data education telah berhasil ditambahkan']);
        } else {
            return back()
                ->withInput()
                ->with(['error' => 'Terjadi kesalahan, silahkan coba kembali'
                ]);
        }
    }

    public function education_pdf()
    {
        $educations = Education::all();
        $pdf = PDF::loadview('education.export-education', ['educations' => $educations]);
        set_time_limit(300);
        return $pdf->stream('data-education-webportofolio.pdf');
    }
    
    public function cetak_excel()
    {
        return Excel::download(new EducationExport, 'education.xlsx');
    }

    public function destroy(Education $education)
    {
        
        if($education->image){
            Storage::delete($education->image);
        }
        Education::destroy($education->id);
        if ($education) {
            return redirect()
                ->route('education.index')
                ->with(['success' => 'Data education telah berhasil dihapus']);
        } else {
            return redirect()
                ->route('education.index')
                ->with(['error' => 'Terjadi kesalahan, silahkan coba kembali']);
        }
    }   

    // public function status($id){
    //     $educations = DB::table('education')
    //     ->where('id',$id)
    //     ->update($status_sekarang);
 
    //     $status_sekarang = $education->status;
 
    //     if($status_sekarang == 1){
    //         DB::table('education')->where('id',$id)->update([
    //             'status'=>1
    //         ]);
    //     }else{
    //         DB::table('education')->where('id',$id)->update([
    //             'status'=>2
    //         ]);
    //     }
    //     \Session::flash('sukses','Status berhasil di ubah');
 
    //     return redirect('education.index');
    // }

    public function status($id)
    {
        $educations = DB::table('education')->where('id',$id)->first();

        $status_sekarang = $educations->status;
 
        if($status_sekarang == 1){
            DB::table('education')->where('id',$id)->update([
                'status'=>2
            ]);
        }else{
            DB::table('education')->where('id',$id)->update([
                'status'=>1
            ]);
        }
  
        return redirect('education');
    }
}
