<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Report;
use PDF;

class ViewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index()
    {
        $pdfs = Report::all();
        return view('view.index', compact('pdfs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('view.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required'
        ]);

        $push = Report::create([
            'title' => $request->title,
            'description' => $request->description
        ]);

        return redirect()->back()->with('success', 'Saved Success');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pdfs = Report::findorfail($id);
        $time = \Carbon\Carbon::now()->translatedFormat('d/m-Y');
        return view('view.show', compact('pdfs'))->with('time', $time);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function exportpdf($id)
    {

        $pdfs = Report::findorfail($id);
        $pdf = PDF::loadView('view.show_pdf', compact('pdfs'))->setPaper('A4', 'potrait')->setOptions(['isHtml5ParserEnabled:true']);
        return $pdf->download('Rules-pdf-' . date('d-m-Y_H-i-s') . '.pdf');
    }
}
