<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Notifications\AdminBroadcastNotification;
use App\QueryBuilders\NotificationsQueryBuilder;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Notifications\DatabaseNotification;
use Illuminate\Support\Facades\Notification;

class NotificationsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(NotificationsQueryBuilder $notificationsQueryBuilder): View
    {
        //$notifications = DatabaseNotification::latest()->paginate(8);
        $notifications = $notificationsQueryBuilder->getNotificationsWithPagination();

        $users = User::select('id', 'name', 'email')->get();

        return \view('admin.notifications.index', compact('notifications', 'users'));
    }

    // // 2. Обработка отправки рассылки из формы
    // public function send(Request $request)
    // {
    //     // Валидация полей формы
    //     $request->validate([
    //         'subject' => 'required|string|max:255',
    //         'content' => 'required|string',
    //     ]);

    //     $subject = $request->input('subject');
    //     $content = $request->input('content');

    //     // Получаем всех пользователей (или можете отфильтровать, например, только админов/активных)
    //     $users = User::all();

    //     if ($users->isEmpty()) {
    //         return back()->with('error', 'В базе данных нет пользователей для рассылки.');
    //     }

    //     // Массовая отправка (каждому уйдет письмо + запись в БД)
    //     Notification::send($users, new AdminBroadcastNotification($subject, $content));

    //     return back()->with('success', 'Рассылка успешно отправлена ' . $users->count() . ' пользователям!');
    // }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.notifications.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'subject' => 'required|string|max:255',
            'content' => 'required|string',
            'user_ids' => 'required|array|min:1',
            'user_ids.' => 'exists:users,id',
        ]);

        //$users = User::all();

        $users = User::whereIn('id', $request->input('user_ids'))->get();

        if ($users->isEmpty()) {
            return redirect()->route('admin.notifications.index')
                    ->with('error', 'No user for notifications');
        }

        Notification::send($users, new AdminBroadcastNotification(
            $request->input('subject'),
            $request->input('content')
        ));

        return redirect()->route('admin.notifications.index')
                ->with('success', 'Notifications sent success');

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
        $notification = DatabaseNotification::findOrFail($id);
        $notification->delete();

        return redirect()->route('admin.notifications.index')
            ->with('success', 'Notification delete from history');
    }

    public function bulkDestroy(Request $request)
    {
        $query = DatabaseNotification::query();

        $hasFilter = false;

        if ($request->filled('filter_user_id')) {
            $query->where('notifiable_id', $request->input('filter_user_id'));
            $hasFilter = true;
        }

        if ($request->filled('filter_subject')) {
            $query->where('data->title', 'like', '%' . $request->input('filter_subject') . '%');
            $hasFilter = true;
        }

        if ($request->filled('filter_exact_date')) {
            $query->where('created_at', '=', $request->input('filter_exact_date'));
            $hasFilter = true;
        }

        if ($request->filled('filter_order_date')) {
            $query->whereDate('created_at', '<=', $request->input('filter_order_date'));
            $hasFilter = true;
        }

        if (!$hasFilter) {
            return redirect()->route('admin.notifications.index')
                ->with('error', 'Choose at least one filter for cleaning');
        }

        $deleteCount = $query->delete();

        return redirect()->route('admin.notifications.index')
                ->with('success', "Notifications have been successfully cleared: {$deleteCount}");
    }
}
