<?php

namespace App\Http\Controllers;

use App\Models\Content;
use App\Models\React;
use Illuminate\Http\Request;

class APIController extends Controller
{
    protected function home()
    {
        # code...
    }

    protected function list_content($theme){
        $data = Content::where('theme', $theme)->get();
        return response()->json($data);
    }

    protected function content($id){
        Content::where('id', $id)->increment('view', 1);
        $data = Content::where('id', $id)->with('reply')->get();
        return response()->json($data);
    }
    
    protected function status($id, $status){
        if ($status == 'like') {
            Content::where('id', $id)->increment('like', 1);
        }
        elseif ($status == 'unlike') {
            Content::where('id', $id)->decrement('like', 1);
        }
        elseif ($status == 'dislike') {
            Content::where('id', $id)->increment('dislike', 1);
        }
        else {
            Content::where('id', $id)->decrement('dislike', 1);
        }
        $data = Content::where('id', $id)->with('reply')->get();
        return response()->json($data);
    }
    
    protected function reply(Request $req, $id){
        $test = React::create([
            'content' => $id,
            'review' => $req->review
        ]);
        $data = Content::where('id', $id)->with('reply')->get();
        return response()->json($data);
    }
}
