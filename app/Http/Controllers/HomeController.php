<?php

namespace App\Http\Controllers;
use App\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(){
        $tasks = Task::orderBy('created_at')->get();
     return view('tasks.home',compact('tasks'));
}
}