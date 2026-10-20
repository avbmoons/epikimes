<?php

namespace App\Http\Controllers;

use App\Enums\Status;
use App\Http\Requests\Mails\CreateRequest;
use App\Models\Mail;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MailController extends Controller
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
    public function create(): View
    {
        return view('mail.create', [
            'user' => Auth::user(),
            'status' => Status::DRAFT,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateRequest $request): RedirectResponse
    {
        $mail = Mail::create($request->validated());
        $mail->update([
            'status' => Status::ACTIVE,
        ]);

        if ($mail->save()) {
            return \redirect()->route('home')->with('success', 'Mail already sent');
        }
        return \back()->with('error', 'Not sent');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
