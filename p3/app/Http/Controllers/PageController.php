<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function welcome()
    {
        return view('pages/welcome');
    }
    public function entry(Request $request)
    {
        $toDoList = $request->toDoList;
        $items = explode(',', $toDoList);
        $schedule = $request->schedule . ":00 " . $request->earlyLate ."...." . $request->task;
        $notes = $request->notes;
        dump($items);
        dump($notes);
        dump($schedule);
        return view('pages/welcome');
    }
    public function home()
    {
        return view('pages/users');
    }
    public function new(Request $request)
    {
        $toDoList = $request->option1;
        $schedule = $request->option2;
        $notes = $request->option3;
        
        return view('pages/new', [
            'toDoList'=>$toDoList,
            'schedule'=>$schedule,
            'notes'=>$notes,
        ]);
    }
}