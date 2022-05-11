<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Entry;
use App\Models\Quote;
use App\Rules\SingleDate;
use Illuminate\Validation\Rules\Unique;

class EntryController extends Controller
{
    public function newEntry(Request $request)
    {
        $request->validate([
            'days'=>'required',
            'notes'=>'required|max:1000',
            'pic_url'=>'nullable|url',
        ]);
        
        
        
        $user = Auth::user();
        
        $entry = new Entry();
        $entry->days = $request->days;
        $entry->notes = $request->notes;
        $entry->pic_url = $request->pic_url;
        $entry->user_id = $user->id;
        if ($request->quote) {
            $count = DB::table('quotes')->count();
            $getQuoteNumber = rand(0, $count);
            $quote = Quote::find($getQuoteNumber);
            $entry->quote_id = $quote->id;
        }
        
        $entry->save();
        
        $entries = Entry::all();
        
        return view('pages/home', [
            'entries'=>$entries,
        ]);
    }

    public function home()
    {
        $entries = Entry::all();
        return view('pages/home', [
            'entries'=>$entries,
        ]);
    }

    public function daily($id)
    {
        $single = Entry::where('id', '=', $id)->first();

        return view('pages/daily', [
            'single'=>$single,
        ]);
    }

    public function edit($id)
    {
        $entry = Entry::where('id', '=', $id)->first();
    }
}