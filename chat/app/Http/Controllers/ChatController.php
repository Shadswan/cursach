<?php

namespace App\Http\Controllers;

use App\Models\Chat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $chat = Chat::all();
        return response()->json([
            'chat' => $chat,
            'message' => 'sucessfully',
        ],201);
        //error Controller ларавель сам все вернет, без try/catch будет
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $id = Auth::id();
        $data = $request->validate([
            'name' => ['required'],
            'user_id' => $id,
        ]);
        $chat = Chat::create($data);
        return response()->json([
            'chat' => $chat,
            'message' => 'sucessfully',
        ],201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Chat $chat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Chat $chat)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Chat $chat)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Chat $chat)
    {
        $id = $request->validate([
            'id' => ['required'],
        ]);
        Chat::where('id', $id)->delete();
    }
}
