<?php

namespace App\Http\Controllers;

use App\Models\Term;
use Illuminate\Http\Request;
use Str;
use RealRashid\SweetAlert\Facades\Alert;

class TermController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('menu.management.term',['term'=>Term::get()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    
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
        toast('Successfull Add Term', 'success', 'bottom-right');
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Term  $term
     * @return \Illuminate\Http\Response
     */
    public function show(Term $term, $code)
    {
        $term::where('id', $code)->delete();
        toast('Term already delete', 'success');
        return back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Term  $term
     * @return \Illuminate\Http\Response
     */
    public function edit(Term $term, $code)
    {
        return view('menu.management.term-edit', ['term' => $term->where('id', $code)->first()]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Term  $term
     * @return \Illuminate\Http\Response
     */
    public function update(Request $req, $code)
    {
        $status = "update";
        $term = $this->make($req, $status, $code);
        if ($term == 'error') {
            toast('Error', 'error', 'bottom-right');
            return back();
        }
        toast('Successfull Update Term', 'success', 'bottom-right');
        return redirect()->route('management.term');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Term  $term
     * @return \Illuminate\Http\Response
     */
    public function destroy(Term $term, $code)
    {
    }

    protected function make($req, $status, $code){
        if (!$code) {
            $term = Term::$status([
                'title_trm' => $req->title_trm,
                'video_trm' => str_replace('watch?v=', 'embed/', $req->video_trm),
                'desc_trm' => $req->desc_trm,
                'priority' => $req->priority
            ]);
        }else{
            $term  = Term::where('id',$code)->$status([
                'title_trm' => $req->title_trm,
                'video_trm' => str_replace('watch?v=', 'embed/', $req->video_trm),
                'desc_trm' => $req->desc_trm,
                'priority' => $req->priority
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
