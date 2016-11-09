<?php

namespace App\Http\Controllers;

use App\Band;
use App\Services\BandService;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class BandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('bands.index', ['bands' => Auth::user()->bands]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('bands.create');
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

        BandService::create($request->input('name'));

        // TODO: Flash band stored

        return redirect()->route('bands.index');
    }

    /**
     * Display the specified resource.
     *
     * @param Band $band
     * @return \Illuminate\Http\Response
     */
    public function show(Band $band)
    {
        $this->authorize('view', $band);

        return view('bands.show', ['band' => $band]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Band $band
     * @return \Illuminate\Http\Response
     */
    public function edit(Band $band)
    {
        $this->authorize('update', $band);

        return view('bands.edit', ['band' => $band]);
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
        $this->authorize('update', $band);

        $this->validate($request, [
            'name' => 'required|max:80',
        ]);

        $band->update($request->all());

        // TODO: Flash band updated

        return redirect()->route('bands.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Band $band
     * @return \Illuminate\Http\Response
     */
    public function destroy(Band $band)
    {
        $this->authorize('delete', $band);

        $band->delete();

        // TODO: Flash band deleted

        return redirect()->route('bands.index');
    }
}
