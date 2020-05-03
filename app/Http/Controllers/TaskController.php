<?php


namespace App\Http\Controllers;

use App\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TaskController extends Controller
{
    public function home(){
        $task =  Task::all();
        return view('tasks.home',compact('tasks'));
    }  

    public function show($id){

        $task = Task::where('id',$id)->get();

        return view('tasks.show',compact('task'));
    }

    public function store(Request $request){
        $request->validate([
                'name' => 'required|max:255',
        ]);

        $task = new Task();
        $task->name = $request->name;
        $task->save();

        return redirect()->back();
    }

    public function destroy($id){
        $task=Task::find($id);
        $task->delete();

        return redirect()->back();
    }

    public function edit($id){
        $task = Task::findOrFail($id);
        $tasks = Task::orderBy('created_at')->get();
        return view('tasks.home',compact('task','tasks'));
    }
    
    public function update(Request $request,$id){
    
    
        $request->validate([
            'name' => 'required|max:255',
        ]);
        $affected = Task::find($id);
        $affected->name = $request->name;
        $affected->updated_at = now();
        $affected->save();
    
        return redirect('/home');
    }

}
