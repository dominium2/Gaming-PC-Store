<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display the contact page.
     */
    public function index()
    {
        return view('contact.contact');
    }

    /**
     * Handle form submission.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string',
        ]);

        Message::create($request->only(['name', 'email', 'message']));

        return redirect()->route('contact')->with('status', 'Your message has been sent successfully.');
    }

    /**
     * Display the admin mail page.
     */
    public function adminMail()
    {
        $messages = Message::latest()->get(); // Fetch all messages, latest first
        return view('contact.mail', compact('messages')); // Use 'contact.mail' instead of 'admin.mail'
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Message $message)
    {
        $message->delete();

        return redirect()->route('admin.mail')->with('status', 'Message deleted successfully.');
    }
}
