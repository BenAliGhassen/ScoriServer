<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Auth\Events\Registered;

class userController extends Controller
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
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nom' =>'required|string',
            'prenom' =>'required|string',
            'etablisement' =>'required|string',
            'score' =>'required',
        ]);


        $user = User::create([
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'etablisement' => $request->etablisement,
            'score' => $request->score,
        ]);

        event(new Registered($user));

        return response()->json(['Ajoute effecuter'],200);

    }

    /**
     * Display the specified resource.
     */
    public function show()
    {

    $users = User::select('*')
    ->orderBy('score', 'desc')
    ->get();

    $rank = 1;
    foreach ($users as $user) {

    $user->rank = $rank;
    $rank++;
    }

    return response()->json(['data' => $users], 200);
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
