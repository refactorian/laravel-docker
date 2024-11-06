<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TaskListItem;

class TaskListController extends Controller 
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $taskListItems = TaskListItem::all(); //I would never do this

        return view('home', ['taskListItems' => $taskListItems]);
    }

    /**
     * Save a new task list item
     *
     * @return \Illuminate\Http\Response
     */
    public function saveItem(Request $request)
    {
        //Log::info(json_encode($request->all()));
        $newTaskListItem = new TaskListItem();
        $newTaskListItem->task_name = $request->task;
        $newTaskListItem->is_complete = 0;
        $newTaskListItem->save();
        
        return redirect('/');
    }
}