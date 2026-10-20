<?php

namespace App\Http\Controllers\Admin;

use App\Enums\UserRole;
use App\Http\Controllers\Controller;
use App\Http\Requests\Users\CreateRequest;
use App\Http\Requests\Users\EditRequest;
use App\Models\User;
use App\QueryBuilders\UsersQueryBuilder;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Str;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(UsersQueryBuilder $usersQueryBuilder): View
    {
        return \view('admin.users.index', [
            'usersList' => $usersQueryBuilder->getUsersWithPagination(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $isAdmins = UserRole::all();
        
        return view('admin.users.create', [
            'isAdmins' => $isAdmins,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateRequest $request)
    {
        $validated = $request->validated();

        if (!empty($validated['password'])) {
            $password = $validated['password'];
        } else {
            $password = Str::password(12);
        }   

        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($password),
        ]);

        if ($user->save()) {
            return \redirect()->route('admin.users.index');
        }
        return \back();
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
    public function edit(User $user): View
    {
        return view('admin.users.edit', [
            'user' => $user,
            'isAdmins' => UserRole::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EditRequest $request, User $user): RedirectResponse
    {
        $validated = $request->validated();

        $user->name = $validated['name'];
        $user->email = $validated['email'];

        $passwordMessage = "";

        if (!empty($validated['regenerate_password'])) {
            $newPassword = Str::password(12);
            $user->password = Hash::make($newPassword);
            $passwordMessage = "New password generated: {$newPassword}";
        } elseif (!empty($validated['password'])) {
            $user->password = Hash::make($validated['password']);
            $passwordMessage = "Password changed manually";
        }

        //$user = $user->fill($request->validated());

        if ($user->save()) {
            return redirect()->route('admin.users.index')
                ->with('success', "Data updated success. {$passwordMessage}");
        }
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        try {
            $user->delete();

            return \response()->json('ok');
        } catch (\Exception $exception) {
            //\Log::error($exception->getMessage(), [$exception]);

        return \response()->json('error', 400);
        }
    }
}
