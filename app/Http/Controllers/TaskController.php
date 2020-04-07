<?php

namespace App\Http\Controllers;
use App\task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TaskController extends Controller
{
    public function index(){

        //$tasks=DB::table('tasks')->get();
        $tasks = task::orderBy('created_at')->get();

        return view('tasks.index',compact('tasks'));
    }
    public function show($id){
        //$task=DB::table('tasks')->find($id);
        $task=task::where('id',$id)->get();
        return view('tasks.show',compact('task'));

    }
    public function store(Request $request){
       
        $request->validate([
            'name'=> 'requireed|min:10 | max:255',

        ]);
        $task = new task();
        $task->name = $request->name;
        $task-> save();

        return redirect()->back();

    }
    public function destroy($id){
        //DB::table('tasks')->where('id','=',$id)->delete();
        $task = task::find($id);

        $task->delete();
        return redirect()->back();
    }
    
}
