<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\Talk;
use App\Models\User;
use PHPUnit\TextUI\Configuration\Php;

class TalkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('add_talk', [
            "title" => 'Create',
            "users" => User::limit(3)->get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'body' => 'required'
        ]);
        $validatedData['user_id'] = auth()->user()->id;
        $validatedData["key"] = bin2hex(random_bytes(10));
        if(Talk::where('key', $validatedData["key"])){
            $validatedData["key"] = bin2hex(random_bytes(10));
        }

   
        $allowedfileExtension=['png','jpg','jpeg','JPG','JPEG','PNG','jfif'];
        if ($request->file("image")) {
            $check=in_array($request->file("image")->getClientOriginalExtension(),$allowedfileExtension);
            if(!$check) {
                return back()->with('error', 'Not an Image');
            } 
            $validatedData["img"] = $request->file("image")->store('image');
        }
     
        Talk::create($validatedData);  
        return redirect('/')->with('success', 'New playlist has been created!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Talk $talk)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Talk $talk)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Talk $talk)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Talk $talk)
    {
        if($talk->img){
            Storage::delete($talk->img);
        }
        Talk::destroy($talk->id);
        return redirect('/')->with('success', 'Song deleted!');
    }
}
