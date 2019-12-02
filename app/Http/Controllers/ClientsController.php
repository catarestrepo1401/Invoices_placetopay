<?php

namespace App\Http\Controllers;

use App\Clients;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ClientsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $datos['clients']=Clients::paginate(1);

        return view('clients.index',$datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('clients.create');
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

        $campos=[
            'name' => 'required|string|max:100',
            'address' => 'required|string|max:100',
            'cellphone' => 'required|string|max:100',
            'email' => 'required|email',
            'photo' => 'required|max:10000|mimes:jpeg,png,jpg'
        ];
        $Message=["required"=>'The :attribute is required'];
        
        $this->validate($request,$campos,$Message);

        //$datosClient=request()->all();

        $datosClient=request()->except('_token');

        if($request->hasFile('photo')){

            $datosClient['photo']=$request->file('photo')->store('uploads','public');
        }

        Clients::insert($datosClient);

        //return response()->json($datosClient);
        return redirect('clients')->with('Message','Client added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Clients  $clients
     * @return \Illuminate\Http\Response
     */
    public function show(Clients $clients)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Clients  $clients
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $client= Clients::findOrFail($id);

        return view('clients.edit',compact('client'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Clients  $clients
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        
        $campos=[
            'name' => 'required|string|max:100',
            'address' => 'required|string|max:100',
            'cellphone' => 'required|string|max:100',
            'email' => 'required|email',
            
        ];
        
        if($request->hasFile('photo')){

            $campos+= ['photo' => 'required|max:10000|mimes:jpeg,png,jpg'];
        }

        $Message=["required"=>'The :attribute is required'];
        
        $this->validate($request,$campos,$Message);


        $datosClient=request()->except(['_token','_method']);

        if($request->hasFile('photo')){

            $client= Clients::findOrFail($id);

            Storage::delete('public/'.$client->photo);
            
            $datosClient['photo']=$request->file('photo')->store('uploads','public');
        }

        Clients::where('id','=',$id)->update($datosClient);

        //$client= Clients::findOrFail($id);
        //return view('clients.edit',compact('client'));

        return redirect('clients')->with('Message','Client modified successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Clients  $clients
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $client= Clients::findOrFail($id);

        if(Storage::delete('public/'.$client->photo)){
            Clients::destroy($id);
        }
       

        return redirect('clients')->with('Message','Client removed');

    }
}
