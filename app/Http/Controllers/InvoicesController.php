<?php

namespace App\Http\Controllers;

use App\Invoices;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class InvoicesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $datos['invoices']=Invoices::paginate(1);

        return view('invoices.index',$datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('invoices.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

       
        //$datosInvoice=request()->all();

        $datosInvoice=request()->except('_token');

        Invoices::insert($datosInvoice);

        //return response()->json($datosInvoice);
        return redirect('invoices')->with('Message','Invoice added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Invoices  $invoices
     * @return \Illuminate\Http\Response
     */
    public function show(Invoices $invoices)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Invoices  $invoices
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $invoice= Invoices::findOrFail($id);

        return view('invoices.edit',compact('invoice'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Invoices  $invoices
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        


        $datosInvoice=request()->except(['_token','_method']);

        
        Invoices::where('id','=',$id)->update($datosInvoice);

        //$invoice= Invoices::findOrFail($id);
        //return view('invoices.edit',compact('invoice'));

        return redirect('invoices')->with('Message','Invoice modified successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Invoices  $invoices
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $invoice= Invoices::findOrFail($id);

        if(Storage::delete('public/'.$invoice->photo)){
            Invoices::destroy($id);
        }
       

        return redirect('invoices')->with('Message','Invoice removed');

    }
}

