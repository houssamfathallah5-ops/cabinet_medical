<?php

namespace App\Http\Controllers;

use App\Mail\CustomEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
    public function create()
    {
        return view('emails.create');
    }

    public function send(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        try {
            Mail::to($request->email)->send(new CustomEmail($request->subject, $request->message));
            return redirect()->back()->with('success', __('L\'email a été envoyé avec succès.'));
        } catch (\Exception $e) {
            return redirect()->back()->with('error', __('Erreur lors de l\'envoi de l\'email: ') . $e->getMessage());
        }
    }
}
