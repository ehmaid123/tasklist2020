<?php

namespace App\Http\Controllers;

use App\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class TaskController extends Controller
{
    public function index(){

       // $task=DB::table('task')->get();
        $task = Task::orderBy('created_at')->get();
        
        return view('task.index',compact('task'));
    }

     public function show($id){
        // $task=DB::table(task)->find($id);
         $task = Task::where('id',$id)->get();

         return view('task.show',compact('task'));

     }
     public function store(Request $request){
       //  dd($request);
        //      DB::table('task')->insert([
        //      'title' => $request->title,
        //      'created_at'=>now(),
        //      'updated_at'=>now(),
        
        //  ]); 
            $request->validate([
                'title' => 'required|max:255',

            ]);
              $task = new Task();
              $task->title = $request->title;
              $task->save();   

                return redirect()->back();

   }
    public function destroy($id){
          // DB::table('task')->where('id' , '=' , $id)->delete();
                $task =Task::find($id);
                $task->delete();

           return redirect()->back();
        }

    public function edit($id){
            return view('task.edit',compact('task'));
    }

    }

