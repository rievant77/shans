<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Report;
use Barryvdh\DomPDF\PDF as DomPDFPDF;
use PDF;
use Response;
use Image;

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

        $this->validate($request, [
            'title' => 'required',
            'image' => 'required'
        ]);

        if ($request->hasfile('image')) {
            foreach ($request->file('image') as $file) {
                $name = "img-" . time() . "-" . $file->getClientOriginalName();
                $file->move(public_path() . '/asset/img/', $name);
                $imgData[] = $name;
            }
        }
        $fileModal = new Report();
        $fileModal->title = $request->title;
        $fileModal->image = json_encode($imgData);
        $fileModal->save();
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

        // $pdfs = new Dompdf();
        // $pdfs->load_html($html);
        // $pdfs->render();
        // $canvas = $pdfs->getCanvas();
        // $canvas->page_script('
        // $pdf->set_opacity(.5);
        // $pdf->image("asset/watermark/wm.png", 200, 300, 100, 100);
        // ');
        // $image = (public_path('asset/watermark/wm96.png'));
        // $pdf = new PDF();
        // $pdf->setWatermarkImage($image, $opacity = 0.6, $top = '30%', $width = '100%', $height = '100%');

        $pdfs = Report::findorfail($id);
        $pdf = PDF::loadview('view.show_pdf', ['pdfs' => $pdfs])->setPaper(a4, potrait);

        return $pdf->download('Rules-pdf-' . date('d-m-Y_H-i-s') . '.pdf');
    }
}
