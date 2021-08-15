<?php

namespace App\Http\Controllers;

use App\Models\Content;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ContentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'profile' => 'required',
            'email' => 'email|required',
            'telephone' => 'required',
            'address' => 'required',
            'whatsapp' => 'required',
            'facebook' => 'required',
            'instagram' => 'required',
        ]);

        // Content::where('id', $request->id)->update($request->all());
        $content = Content::find($request->id);
        $content->profile = $request->profile;
        $content->email = $request->email;
        $content->telephone = $request->telephone;
        $content->address = $request->address;
        $content->whatsapp = $request->whatsapp;
        $content->facebook = $request->facebook;
        $content->instagram = $request->instagram;
        $content->update();
        return redirect()->route('content')
            ->with('success', 'Post updated successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $content = Content::find($id);
        return view('admin.contentedit', ['contents' => $content]);
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
        $content = Content::findOrFail($id);

        $request->validate([
            'profile' => 'required',
            'email' => 'email|required',
            'telephone' => 'required',
            'address' => 'required',
            'whatsapp' => 'required',
            'facebook' => 'required',
            'instagram' => 'required',
        ]);
        $content->profile = $request->get('profile');
        $content->email = $request->get('email');
        $content->telephone = $request->get('telephone');
        $content->address = $request->get('address');
        $content->whatsapp = $request->get('whatsapp');
        $content->facebook = $request->get('facebook');
        $content->instagram = $request->get('instagram');
        $content->save();


        if ($content) {
            return redirect()->route('content')
                ->with('success', 'Post updated successfully');
        } else {
            Session::flash('errors', ['' => 'Register gagal! Silahkan ulangi beberapa saat lagi']);
            return redirect()->route('content');
        }
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

    public function test()
    {
    }
}
