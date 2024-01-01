<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\task;
use App\Models\project;
use App\Models\user;

class HomeController extends Controller
{
        /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index(){
        $total_users = user::count();
        $total_task = task::count();
        $total_project = project::count();
        $totalproject_finished = project::where('status','Done')->count();
        $totalproject_upcoming = project::where('status','Upcoming')->count();
        $totalproject_onprogres = project::where('status','On Progress')->count();
        $totalproject_delayed = project::where('status','Delay')->count();

        $grafik = task::select(task::raw("CAST(COUNT(id)as int) as total_task"))->GroupBy(task::raw("Month(created_at)"))->pluck("total_task");
        $bulan = task::selectRaw("MONTHNAME(created_at) as bulan")
                    ->groupByRaw("MONTHNAME(created_at)")
                    ->orderByRaw("MONTH(created_at)")
                    ->pluck("bulan");

        return view('pages.dashboard',compact('total_users','total_task','total_project','totalproject_finished','totalproject_upcoming','totalproject_onprogres','totalproject_delayed','grafik','bulan'));
    }
}
