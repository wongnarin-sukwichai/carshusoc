<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Content;

class WelcomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // public function index()
    // {
    //     $data = Content::all();

    //     return view('welcome', [
    //         'content' => $data
    //     ]);
    // }
    
    //รอปรับปรุงหน้าเว็บ
    public function index()
    {
        return redirect('/login');
    }

    public function about()
    {
        return view('about');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
