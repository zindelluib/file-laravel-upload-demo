<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Photo;

class PhotoController extends Controller
{
    
    public function index()
    {
        return response()->json(array(
            'photos' => Photo::all(),
        ));
    }

    
    public function store(Request $request)
    {
        //Skipped validation

        //
        //$request->file('photo')->store('public/photos')
        // will return public/photos/uniquefilname.extension 
        // e.g. public/photos/11xDcxXC6v27XTPz4YOX4RKuxKAyqntk4tz6kegd.png
        //
        //
        $path  = $request->file('photo')->store('public/photos');
        
        $path  = explode('/', $path);//e.g. ['public','photos','photos/11xDcxXC6v27XTPz4YOX4RKuxKAyqntk4tz6kegd.png']

        $path  = $path[1]  . '/' .  $path[2];// e.g.'photos/11xDcxXC6v27XTPz4YOX4RKuxKAyqntk4tz6kegd.png'
        $photo = new Photo;
        $photo->description  = $request->input('description');
        $photo->path  = $path;
        $photo->save();

        return response()->json(array(
            'message' => 'Photo successfully uploaded',
            'photo' => $photo
        ),201);
    }

   
    public function show($id)
    {
        //
    }

   
    public function update(Request $request, $id)
    {
        //
    }

   
    public function destroy($id)
    {
        //
    }
}
