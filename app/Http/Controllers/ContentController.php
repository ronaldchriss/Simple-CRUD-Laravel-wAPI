<?php

namespace App\Http\Controllers;

use App\Models\Content;
use App\Models\Theme;
use Illuminate\Http\Request;

class ContentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($code)
    {
        $content = Content::with('themes')->where('theme', $code)->get();
        $theme = Theme::where('id', $code)->first();
        return view('menu.management.content', compact('content', 'theme'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $req)
    {
        $term = "";
        $status = "create";
        $term = $this->make($req, $status, $term);
        if ($term == 'error') {
            toast('Error', 'error', 'bottom-right');
            return back();
        }
        toast('Successfull Add Content', 'success', 'bottom-right');
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Content  $content
     * @return \Illuminate\Http\Response
     */
    public function show(Content $content, $code)
    {
        $content::where('id', $code)->delete();
        toast('Content already delete', 'success');
        return back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Content  $content
     * @return \Illuminate\Http\Response
     */
    public function edit(Content $content, $code)
    {
        $content = Content::with('themes')->where('id', $code)->first();

        $theme = Theme::get();
        return view('menu.management.content-edit', compact('content', 'theme'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Content  $content
     * @return \Illuminate\Http\Response
     */
    public function update(Request $req, Content $content, $code)
    {
        $status = "update";
        $content = $this->make($req, $status, $code);
        if ($content == 'error') {
            toast('Error', 'error', 'bottom-right');
            return back();
        }
        toast('Successfull Update Content', 'success', 'bottom-right');
        return redirect()->route('management.content');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Content  $content
     * @return \Illuminate\Http\Response
     */
    public function destroy(Content $content)
    {
        //
    }

    protected function make($req, $status, $code){
        if (!$code) {
            $content = Content::$status([
                'title' => $req->title,
                'video' => str_replace('watch?v=', 'embed/', $req->video),
                'desc' => $req->desc,
                'theme' => $req->theme,
            ]);
        }else{
            $content = Content::where('id',$code)->$status([
                'title' => $req->title,
                'video' => str_replace('watch?v=', 'embed/', $req->video),
                'desc' => $req->desc,
            ]);
        }
        if (!$content) {
            return response()->json([
                'error' => true
            ]);
        }
        return response()->json([
            'error' => false
        ]);
    }
}
