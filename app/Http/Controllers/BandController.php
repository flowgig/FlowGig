<?php

namespace App\Http\Controllers;

use App\Band;
use Illuminate\Http\Request;

use App\Http\Requests;

class BandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //TODO: Implement index view
        //return view('band.index', ['bands' => Band::get()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //TODO: Implement create view
        //return view('band.create');
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
            'name' => 'required|max:80',
        ]);

        Band::create($request->all());

        // TODO: Flash band stored

        return redirect()->route('band.index');
    }

    /**
     * Display the specified resource.
     *
     * @param Band $band
     * @return \Illuminate\Http\Response
     */
    public function show(Band $band)
    {
        //TODO: Implement show view
        //return view('band.show', ['band' => $band]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Band $band
     * @return \Illuminate\Http\Response
     */
    public function edit(Band $band)
    {
        //TODO: Implement edit view
        //return view('band.edit', ['band' => $band]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param Band $band
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Band $band)
    {
        $this->validate($request, [
            'name' => 'required|max:80',
        ]);

        $band->update($request->all());

        // TODO: Flash band updated

        return redirect()->route('band.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Band $band
     * @return \Illuminate\Http\Response
     */
    public function destroy(Band $band)
    {
        $band->delete();

        // TODO: Flash band deleted

        return redirect()->route('band.index');
    }
}
