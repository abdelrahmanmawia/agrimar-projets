<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        // Get the latest message for each conversation
        $latestMessages = Message::where('sender_id', $user->id)
                            ->orWhere('receiver_id', $user->id)
                            ->orderBy('created_at', 'desc')
                            ->get()
                            ->unique(function ($item) {
                                return $item['sender_id'] == Auth::id() ? $item['receiver_id'] : $item['sender_id'];
                            });

        return view('messages.index', compact('latestMessages'));
    }

    public function chat($receiver_id)
    {
        $user = Auth::user();
        $receiver = User::find($receiver_id);
        $messages = Message::where(function ($query) use ($user, $receiver_id) {
            $query->where('sender_id', $user->id)
                  ->where('receiver_id', $receiver_id);
        })->orWhere(function ($query) use ($user, $receiver_id) {
            $query->where('sender_id', $receiver_id)
                  ->where('receiver_id', $user->id);
        })->orderBy('created_at', 'asc')->get();

        return view('messages.chat', compact('messages', 'receiver_id', 'receiver'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'receiver_id' => 'required|exists:users,id',
            'message' => 'required|string|max:1000',
        ]);

        Message::create([
            'sender_id' => Auth::id(),
            'receiver_id' => $request->receiver_id,
            'message' => $request->message,
        ]);

        return redirect()->route('messages.chat', ['receiver_id' => $request->receiver_id])->with('success', 'Message sent successfully.');
    }
}
