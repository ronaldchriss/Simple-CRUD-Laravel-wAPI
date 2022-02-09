<?php

namespace App\Http\Controllers;

use App\Models\Theme;
use Illuminate\Http\Request;

class ThemeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('menu.management.theme',['theme'=>Theme::get()]);
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
        toast('Successfull Add Theme', 'success', 'bottom-right');
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Theme  $theme
     * @return \Illuminate\Http\Response
     */
    public function show(Theme $theme,$code)
    {
        $theme::where('id', $code)->delete();
        toast('Theme already delete', 'success');
        return back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Theme  $theme
     * @return \Illuminate\Http\Response
     */
    public function edit(Theme $theme, $code)
    {
        return view('menu.management.term-edit', ['term' => $theme->where('id', $code)->first()]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Theme  $theme
     * @return \Illuminate\Http\Response
     */
    public function update(Request $req, Theme $theme, $code)
    {
        $status = "update";
        $theme = $this->make($req, $status, $code);
        if ($theme == 'error') {
            toast('Error', 'error', 'bottom-right');
            return back();
        }
        toast('Successfull Update Theme', 'success', 'bottom-right');
        return redirect()->route('management.theme');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Theme  $theme
     * @return \Illuminate\Http\Response
     */
    public function destroy(Theme $theme)
    {
        //
    }

    protected function make($req, $status, $code){
        if (!$code) {
            $term = Theme::$status([
                'title_thm' => $req->title_thm,
                'video_thm' => $req->video_thm,
                'desc_thm' => $req->desc_thm,
            ]);
        }else{
            $term  = Theme::where('id',$code)->$status([
                'title_thm' => $req->title_thm,
                'video_thm' => $req->video_thm,
                'desc_thm' => $req->desc_thm,
            ]);
        }
        if (!$term ) {
            return response()->json([
                'error' => true
            ]);
        }
        return response()->json([
            'error' => false
        ]);
    }
}
