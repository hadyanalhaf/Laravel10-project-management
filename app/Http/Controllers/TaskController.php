<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\task;
use App\Models\project;
use App\Models\user;

class TaskController extends Controller
{
    //
    public function task() {
        $data_task = task::with('project','user')->paginate(4);
       return View('pages.task-management.task-management',compact('data_task'));
   }

   public function create()
   {

       $project = project::all();
       $user = user::all();
       return view('pages.task-management.create-task', compact('project','user'));
   }

   public function restore(Request $request)
   {
     task::create([
       'title'=>$request->title,
       'project_id'=>$request->project_id,
       'description'=>$request->description,
       'person_in_charge'=>$request->person_in_charge,
       'status'=>$request->status,
     ]);
     return redirect()->route('task')->with('success', 'Task Create successfully.');
   }

   public function edittask($id){
       $project = project::all();
       $user = user::all();
       $data_task = task::findorfail($id);
       return view('pages.task-management.edit-task',compact('data_task','project','user'));
   }
   public function updatetask(Request $request, $id){
       $data_task = task::findorfail($id);
       $data_task->update($request->all());
       return redirect()->route('task')->with('success', 'Task Update successfully.');
   }

   public function deletetask($id){
       $data_taks = task::find($id);
       $data_taks->delete();
       return redirect()->route('task')->with('success', 'Task deleted successfully.');
   }
   public function modal($id)
   {
       // Dapatkan data dari database berdasarkan ID
       $data = task::find($id);

       // Kirim data detail dalam bentuk JSON sebagai respons
       return response()->json($data);
   }

   // public function deleteTask($id) {
   //     $data_task = User::find($id);
   //     $user->delete();
   //     return redirect()->route('user');
   // }
}
