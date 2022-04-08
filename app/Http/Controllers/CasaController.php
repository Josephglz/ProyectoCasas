<?php

namespace App\Http\Controllers;

use App\Models\Casa;
use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class CasaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $casas = Casa::paginate(10);
        return view('index')->with('casas', $casas);
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
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->hasFile('ImageBase'))
        {
            $file = $request->file('ImageBase');
            $imageName = time().'_'.date('Ymd').'.'.$file->getClientOriginalName();
            $file->move(\public_path('uploads/images'), $imageName);

            $casa = new Casa([
                "name" => $request->get('name'),
                "city" => $request->get('city'),
                "state" => $request->get('state'),
                "information" => $request->get('information'),
                "category" => $request->get('category'),
                "description" => str_replace("\n", "\n", $request->get('description')),
                "imageBase" => $imageName,
            ]);
            $casa->save();
        }

        if($request->hasFile("images"))
        {
            $files = $request->file("images");
            foreach($files as $file)
            {
                $imageName = time().'_'.date('Ymd').'.'.$file->getClientOriginalName();
                $request['casa_id'] = $casa->id;
                $request['image'] = $imageName;
                $file->move(\public_path('uploads/images'), $imageName);
                Image::create($request->all());
            }
        }
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
        return view('view')->with('casa', Casa::find($id));
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
        return view('edit')->with('casa', $casa);
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
        if($request->hasFile('ImageBase'))
        {
            if(File::exists(\public_path('uploads/images/'.$casa->imageBase)))
            {
                File::delete(\public_path('uploads/images/'.$casa->imageBase));
            }
            $file = $request->file('ImageBase');
            $imageName = time().'_'.date('Ymd').'.'.$file->getClientOriginalName();
            $file->move(\public_path('uploads/images'), $imageName);
            $casa->imageBase = $imageName;
            $request['ImageBase'] = $casa->imageBase;
        }

        $casa->update([
            "name" => $request->get('name'),
            "city" => $request->get('city'),
            "state" => $request->get('state'),
            "information" => $request->get('information'),
            "category" => $request->get('category'),
            "description" => str_replace("\n", "\n", $request->get('description')),
            "imageBase" => $request->get('ImageBase'),
        ]);

        if($request->hasFile("images"))
        {
            $files = $request->file("images");
            foreach($files as $file)
            {
                $imageName = time().'_'.date('Ymd').'.'.$file->getClientOriginalName();
                $request['casa_id'] = $id;
                $request['image'] = $imageName;
                $file->move(\public_path('uploads/images'), $imageName);
                Image::create($request->all());
            }
        }

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
        if(File::exists(\public_path('uploads/images/'.$casa->imageBase)))
        {
            File::delete(\public_path('uploads/images/'.$casa->imageBase));
        }
        $images = Image::where('casa_id', $id)->get();
        foreach($images as $image)
        {
            if(File::exists(\public_path('uploads/images/'.$image->image)))
            {
                Image::find($image->id)->delete();
                File::delete(\public_path('uploads/images/'.$image->image));
            }
        }
        $casa->delete();
        return redirect('/casas');
    }

    public function deleteimage($id)
    {
        $image = Image::find($id);
        if(File::exists(\public_path('uploads/images/'.$image->image)))
        {
            File::delete(\public_path('uploads/images/'.$image->image));
        }
        Image::find($id)->delete();
        return back();
    }

    public function deleteimagebase($id)
    {
        $casa = Casa::find($id);
        $ImageBase = $casa->imageBase;
        if(File::exists(\public_path('uploads/images/'.$ImageBase)))
        {
            File::delete(\public_path('uploads/images/'.$ImageBase));
        }
        return back();
    }
}
