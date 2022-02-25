<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\React;
use App\Models\Content;

class ReplyCOntroller extends Controller
{
    public function reply($code)
    {
        $reply = React::where('content', $code)->with(['reply','owner'])->get();
        $title = Content::where('id', $code)->first();
        return view('menu.management.reply',compact('reply','title'));
    }
}
