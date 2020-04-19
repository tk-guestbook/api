<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Entry;

class EntryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $entries = Entry::all()->sortByDesc('created_at')->values();

        return response()->json($entries);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $entry = new Entry([
            'name' => $request->input('name'),
            'message' => $request->input('message')
        ]);

        $entry->save();

        return $entry;
    }
}
