<?php

namespace App\Http\Controllers;

use App\Models\Chat_participant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChatParticipantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //мб тут надо id чата добавить
        $chat_participant = Chat_participant::all();
        return respone()->json([
            'data' => $chat_participant,
            'message' => 'sucessfully',
        ], 201);
        //error Controller
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $id = Auth::id();
        $chat_participant = $request->validate([
            'user_id' => $id,
            //'chat_id' => чет х3 пока
        ]);
        Chat_participant::create($chat_participant);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     */
    public function show(Chat_participant $chat_participant)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Chat_participant $chat_participant)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Chat_participant $chat_participant)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Chat_participant $chat_participant)
    {
        //
    }
}
