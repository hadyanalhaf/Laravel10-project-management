<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\project;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = project::all();
        return view("pages.project-management.projek", ["projects" => $projects]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.project-management.createprojek');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
    
        $request->validate([
            'judul' => 'required',
            'deskripsi' => 'required',
            'tglmulai' => 'required',
            'tglselesai' => 'required',
            'status' => 'required',
        ]);
        $createprojek =[
            'title' => $request->input('judul'),
            'description' => $request->input('deskripsi'),
            'start_date' => $request->input('tglmulai'),
            'estimated_end_date' => $request->input('tglselesai'),
            'status' => $request->input('status'),
        ];
        project::create($createprojek);
        return redirect('projek');
    }
    
    public function edit(string $id)
    {
        $projects = project::find($id);
        return view('pages.project-management.editprojek')->with('data',$projects);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'judul' => 'required',
            'deskripsi' => 'required',
            'tglmulai' => 'required',
            'tglselesai' => 'required',
            'status' => 'required',
        ]);
        $updateprojek =[
            'title' => $request->input('judul'),
            'description' => $request->input('deskripsi'),
            'start_date' => $request->input('tglmulai'),
            'estimated_end_date' => $request->input('tglselesai'),
            'status' => $request->input('status'),
        ];
        project::where('id',$id)->update($updateprojek);
        return redirect('projek');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(string $id)
    {
        $projects = project::find($id);
        $projects->delete();
        return redirect('projek');
    }
}
