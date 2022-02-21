<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\React;

class ReplyCOntroller extends Controller
{
    public function reply($code)
    {
        return view('menu.management.reply',['reply' => React::where('content', $code)->with('reply')->get()]);
    }
}
