<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\ToDo;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $todo = ToDo::find($id);
        return view('tasks.home',compact('todo'));
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required'
        ]);
       $task = Task::where(['todo_id'=>$request->todo_id,'name'=>$request->name])->first();
       if ($task == null){
           Task::create([
               'todo_id'=>$request->todo_id,
               'name'=>$request->name,
           ]);
           return back()->with('success','Created SuccessFully');
       }else{
           return back()->with('error','Task Already exist in this to do list');
       }


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $task = Task::find($id);
        return view('tasks.edit',compact('task'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name'=>'required'
        ]);
        $task = Task::where(['todo_id'=>$request->todo_id,'name'=>$request->name])->where('id','!=',$id)->first();
        if ($task == null){
            Task::find($id)->update([
                'name'=>$request->name,
            ]);
            return redirect()->route('task.list',$request->todo_id)->with('success','Updated SuccessFully');
        }else{
            return back()->with('error','Task Already exist in this to do list');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Task::find($id)->delete();
        return back()->with('success','Deleted SuccessFully');
    }
}
