<?php

namespace App\Http\Controllers;

use App\Models\Theme;
use Illuminate\Http\Request;

class ThemeController extends Controller
{
    public function index(Request $req, $flag)
    {
        $req->session()->put('flag', $flag);
        $theme = Theme::where('flag', $flag)->get();
        return view('menu.management.theme', compact('theme'));
    }
    
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
    
    public function show(Theme $theme,$code)
    {
        $theme::where('id', $code)->delete();
        toast('Theme already delete', 'success');
        return back();
    }

    
    public function edit(Theme $theme, $code)
    {
        return view('menu.management.theme-edit', ['theme' => $theme->where('id', $code)->first()]);
    }

   
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


    protected function make($req, $status, $code){
        if ($req->hasFile('img_thm')) {
            $name = rand().'.png';
            $req->file('img_thm')->move(public_path('images'), $name);
        }
        if (!$code) {
            $term = Theme::$status([
                'title_thm' => $req->title_thm,
                'img_thm' => $name,
                'desc_thm' => $req->desc_thm,
                'flag' => $req->session()->get('flag')
            ]);
        }else{
            $term  = Theme::where('id',$code)->$status([
                'title_thm' => $req->title_thm,
                'img_thm' => $name,
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
