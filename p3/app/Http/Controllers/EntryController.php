<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Entry;
use App\Models\Quote;

class EntryController extends Controller
{
    public function newEntry(Request $request)
    {
        $request->validate([
            'days'=>'required',
            'notes'=>'nullable|max:500',
            'pic_url'=>'nullable|url',
        ]);
        
        $entry = new Entry();
        $entry->days = $request->days;
        $entry->notes = $request->notes;
        $entry->pic_url = $request->pic_url;
        $entry->save();
        
        if ($request->quote) {
            $count = DB::table('quotes')->count();
            $getQuoteNumber = rand(0, $count);
            $quoteOfTheDay = Quote::find($getQuoteNumber)->toArray();
            dump($quoteOfTheDay);
        }
        
        dump('Added: ' . $entry->days);
        dump(Entry::all()->toArray());
        return view('pages/home', [
            
        ]);
    }
}