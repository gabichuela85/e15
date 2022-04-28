<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function welcome()
    {
        return view('pages/welcome');
    }
    public function home()
    {
        return view('pages/users');
    }
    public function new(Request $request)
    {
        $taskList = $request->option1;
        $schedule = $request->option2;
        $notes = $request->option3;
        
        return view('pages/new', [
            'taskList'=>$taskList,
            'schedule'=>$schedule,
            'notes'=>$notes,
        ]);
    }
}