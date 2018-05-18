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
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth', 'isVerified']);
    }

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
            'name' => 'required|string|max:80',
        ]);

        $band = BandService::create($request->input('name'), Auth::user());

        // TODO: Flash band stored

        return redirect()->route('bands.show', $band);
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
            'name' => 'required|string|max:80',
        ]);

        $band->fill($request->all());
        if ($band->isDirty())
            $band->updater()->associate(Auth::user());
        $band->save();

        // TODO: Flash band updated

        return redirect()->route('bands.show', $band);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Request $request
     * @param Band $band
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Band $band)
    {
        $this->authorize('delete', $band);

        $this->validate($request, [
            'bandname' => 'required|in:' . $band->name,
        ]);

        $band->delete();

        // TODO: Flash band deleted

        return redirect()->route('bands.index');
    }
}
