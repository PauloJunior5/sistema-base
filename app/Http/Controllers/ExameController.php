<?php

namespace App\Http\Controllers;

use App\Exame;
use Illuminate\Http\Request;

class ExameController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $exames = Exame::all();
        return view('exames.index', compact('exames'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('exames.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'exame' => 'unique:exames,exame',
        ]);

        if ($validatedData) {
            $exame = Exame::create($request->all());
            if ($exame) {
                return redirect()->route('exame.index')->with('Success', 'Exame successfully created.');
            }
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $exame = Exame::findOrFail($id);
        return view('exames.edit', compact('exame'));
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
        $validatedData = $request->validate([
            'exame' => 'unique:exames,exame,' . $id,
        ]);

        if ($validatedData) {
            $exame = Exame::whereId($id)->update($request->except('_token', '_method'));
            if ($exame) {
                return redirect()->route('exame.index')->with('Success', 'Exame successfully updated.');
            }
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
        $exame = Exame::where('id', $id)->delete();
        if ($exame) {
            return redirect()->route('exame.index')->with('Success', 'Exame successfully deleted.');
        }
    }
}
