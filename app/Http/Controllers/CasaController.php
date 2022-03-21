<?php

namespace App\Http\Controllers;

use App\Models\Casa;
use Illuminate\Http\Request;

class CasaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $casas = Casa::all();
        return view('casa.index')->with('casas', $casas);
    }
    public function indexC()
    {
        return Casa::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('casa.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $casa = new Casa();
        $casa->name = $request->get('name');
        $casa->imageBase = 'https://picsum.photos/200/300';
        $casa->city = $request->get('city');
        $casa->state = $request->get('state');
        $casa->category = $request->get('category');
        $casa->information = $request->get('information');
        $casa->description = $request->get('description');
        $casa->imageList = 'https://picsum.photos/200/300|https://picsum.photos/200/300|https://picsum.photos/200/300';
        $casa->save();
        return redirect('/casas');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('casa.view')->with('casa', Casa::find($id));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $casa = Casa::find($id);
        return view('casa.edit')->with('casa', $casa);
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
        $casa = Casa::find($id);
        $casa->name = $request->get('name');
        $casa->imageBase = 'https://picsum.photos/200/300';
        $casa->city = $request->get('city');
        $casa->state = $request->get('state');
        $casa->category = $request->get('category');
        $casa->information = $request->get('information');
        $casa->description = $request->get('description');
        $casa->imageList = 'https://picsum.photos/200/300|https://picsum.photos/200/300|https://picsum.photos/200/300';
        $casa->save();
        return redirect('/casas');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $casa = Casa::find($id);
        $casa->delete();
        return redirect('/casas');
    }
}
