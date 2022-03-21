<?php

namespace App\Http\Controllers;

use App\Models\Content;
use App\Models\React;
use App\Models\Status;
use App\Models\Term;
use App\Models\Theme;
use Illuminate\Http\Request;
use NunoMaduro\Collision\Adapters\Phpunit\State;

class APIController extends Controller
{
    protected function list_term(){
        $data = Term::get();
        return response()->json(["listterms"=>$data]);
    }

    protected function list_theme(){
        $relation=["contents"];
        $data = Theme::with($relation)->get();
        return response()->json(["listtheme"=>$data]);
    }

    protected function list_content($theme){
        $data = Content::where('theme', $theme)->get();
        return response()->json($data);
    }

    protected function content($id){
        Content::where('id', $id)->increment('view', 1);
        $data['content'] = Content::where('id', $id)->with('reply')->get();
        $data['like'] = Status::where('relation', $id)->where('created_by',auth()->user()->name)->first();
        return response()->json($data);
    }
    
    protected function status($id, $status){
        if ($status == 'like') {
            $test = Status::where('relation', $id)->where('created_by',auth()->user()->name)->first();
            if (!$test) {
                Status::create([
                    'status' => $status,
                    'created_by' => auth()->user()->name,
                    'relation' => $id
                ]);
                Content::where('id', $id)->increment('like', 1);
            }else{
                $test->update(['status' => 'like']);
                $content = Content::where('id', $id)->first();
                if ($content->dislike > 0) {
                    Content::where('id', $id)->decrement('dislike', 1);
                }
                Content::where('id', $id)->increment('like', 1);
            }   
        }
        elseif ($status == 'unlike') {
            Status::where('relation', $id)->where('created_by',auth()->user()->name)->delete();
            Content::where('id', $id)->decrement('like', 1);
        }
        elseif ($status == 'dislike') {
            $test = Status::where('relation', $id)->where('created_by',auth()->user()->name)->first();
            if (!$test) {
                Status::create([
                    'status' => $status,
                    'created_by' => auth()->user()->name,
                    'relation' => $id
                ]);
                Content::where('id', $id)->increment('dislike', 1);
            }else{
                $test->update(['status' => 'dislike']);
                $content = Content::where('id', $id)->first();
                if ($content->like > 0) {
                    Content::where('id', $id)->decrement('like', 1);
                }
                Content::where('id', $id)->increment('dislike', 1);
            } 
        }
        else {
            Status::where('relation', $id)->where('created_by',auth()->user()->name)->delete();
            Content::where('id', $id)->decrement('dislike', 1);
        }
        $data = Content::where('id', $id)->with('reply')->get();
        return response()->json($data);
    }
    
    protected function reply(Request $req, $id){
        $test = React::create([
            'content' => $id,
            'review' => $req->review,
            'created_by' => auth()->user()->name
        ]);
        $data = Content::where('id', $id)->with('reply')->get();
        return response()->json($data);
    }
}
