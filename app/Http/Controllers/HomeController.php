<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Request as UserRequest;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // $users = User::all();
        $currentUserId = Auth::id();
        $users = User::where('id', '!=', $currentUserId)->get();
        return view('home', compact('users'));
    }

    public function requestAction($id)
    {
        $sender = Auth::user();
        $receiver = User::findOrFail($id);

        // Check if a request already exists
        $existingRequest = UserRequest::where('sender_id', $sender->id)
            ->where('receiver_id', $receiver->id)
            ->first();

        if ($existingRequest) {
            return redirect()->back()->with('error', 'Request already sent.');
        }

        // Create a new request
        UserRequest::create([
            'sender_id' => $sender->id,
            'receiver_id' => $receiver->id,
            'status' => 'pending',
        ]);

        return redirect()->back()->with('success', 'Request sent successfully.');
    }

    public function acceptRequest($id)
    {
        $request = UserRequest::findOrFail($id);

        if ($request->receiver_id !== Auth::id()) {
            return redirect()->back()->with('error', 'Unauthorized action.');
        }

        $request->update(['status' => 'accepted']);

        return redirect()->back()->with('success', 'Request accepted.');
    }
}
