<?php

namespace App\Http\Controllers\Admin;

use App\Enums\Status;
use App\Http\Controllers\Controller;
use App\Http\Requests\Mails\EditRequest;
use App\Models\Mail;
use App\QueryBuilders\MailsQueryBuilder;
use App\QueryBuilders\UsersQueryBuilder;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class MailsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(MailsQueryBuilder $mailsQueryBuilder): View
    {
        $mailsList = $mailsQueryBuilder->getMailsWithPagination();

        return view('admin.mails.index', [
            'mailsList' => $mailsList,
        ]);        
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id): View
    {
        $mail = Mail::findOrFail($id);

        return \view('admin.mails.show', compact('mail'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Mail $mail): View
    {
        return \view('admin.mails.edit', [
            'mail' => $mail,
            'statuses' => Status::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EditRequest $request, Mail $mail): RedirectResponse
    {
        $mail = $mail->fill($request->validated());

        if ($mail->save()) {
            return redirect()->route('admin.mails.index')->with('success', 'Mail already updated');
        }
        return \back()->with('error', 'Not updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Mail $mail)
    {
        try {
            $mail->delete();

            return \response()->json('ok');
        } catch (\Exception $exception) {
            //\Log::error($exception->getMessage(), [$exception]);

            return \response()->json('error', 400);
        }
    }
}
