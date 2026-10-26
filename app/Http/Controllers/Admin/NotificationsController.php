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

        $uniqueSubjects = DatabaseNotification::whereNotNull('data->title')
            ->get()
            //->pluck('data->title')
            ->map(function($notification) {
                return $notification->data['title'] ?? null;
            })
            ->unique()
            ->sort();

        return \view('admin.notifications.index', compact('notifications', 'users', 'uniqueSubjects'));
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

    /**
     * Display filters for deleting of the resource.
     */
    protected function applyFilters(Request $request)
    {
        $query = DatabaseNotification::query()->latest();

        if ($request->filled('filter_user_id')) {
            $query->where('notifiable_id', $request->input('filter_user_id'));
        }

        if ($request->filled('filter_subject')) {
            $query->where('data->title', $request->input('filter_subject'));
        }

        if ($request->filled('filter_exact_date')) {
            $date = $request->input('filter_exact_date');
            $query->whereRaw('DATE(created_at) = ?', [$date]);
        }

        // if ($request->filled('filter_exact_date')) {
        //     $query->where('created_at', '=', $request->input('filter_exact_date'));
        // }

        if ($request->filled('filter_order_date')) {
            $query->whereDate('created_at', '<=', $request->input('filter_order_date'));
        }

        return $query;
    }


    // public function cleaner(NotificationsQueryBuilder $notificationsQueryBuilder): View
    // {
    //     //$notifications = DatabaseNotification::latest()->paginate(8);
    //     $notifications = $notificationsQueryBuilder->getNotificationsWithPagination();

    //     $users = User::select('id', 'name', 'email')->get();
        
    //     $uniqueSubjects = DatabaseNotification::whereNotNull('data->title')
    //         ->get()
    //         //->pluck('data->title')
    //         ->map(function($notification) {
    //             return $notification->data['title'] ?? null;
    //         })
    //         ->unique()
    //         ->sort();

    //     return \view('admin.notifications.cleaner', compact('notifications', 'users', 'uniqueSubjects'));
    // }

    public function cleaner(Request $request)
    {
        $query = $this->applyFilters($request);

        $hasFilter = $request->filled('filter_user_id') || $request->filled('filter_subject') || $request->filled('filter_exact_date') || $request->filled('filter_order_date');

        $emptyError = $request->input('action') === 'preview' && !$hasFilter;

        $previewNotifications = $hasFilter ? $query->paginate(10)->appends(request()->all()):collect();

        $users = User::select('id', 'name', 'email')->get();
        $uniqueSubjects = DatabaseNotification::whereNotNull('data->title')->get()
        ->map(fn($n) => $n->data['title'] ?? null)->filter()->unique()->sort();

        return view('admin.notifications.cleaner', compact('previewNotifications', 'users', 'uniqueSubjects', 'hasFilter', 'emptyError'));
    }

    public function bulkDestroy(Request $request)
    {
        $hasFilter = $request->filled('filter_user_id') || $request->filled('filter_subject') || $request->filled('filter_exact_date') || $request->filled('filter_order_date');

        if (!$hasFilter) {
            return redirect()->route('admin.notifications.cleaner')
                    ->with('error', 'Select at least one filter to clean');
        }

        $deletedCount = $this->applyFilters($request)->delete();

        return redirect()->route('admin.notifications.index')
                ->with('success', "{$deletedCount} notifications successfully deleted");
    }

    // public function bulkDestroy(Request $request)
    // {
    //     $query = DatabaseNotification::query();

    //     $hasFilter = false;

    //     if ($request->filled('filter_user_id')) {
    //         $query->where('notifiable_id', $request->input('filter_user_id'));
    //         $hasFilter = true;
    //     }

    //     // if ($request->filled('filter_subject')) {
    //     //     $query->where('data->title', 'like', '%' . $request->input('filter_subject') . '%');
    //     //     $hasFilter = true;
    //     // }

    //     if ($request->filled('filter_subject')) {
    //         $query->where('data->title', $request->input('filter_subject'));
    //         $hasFilter = true;
    //     }

    //     if ($request->filled('filter_exact_date')) {
    //         $query->where('created_at', '=', $request->input('filter_exact_date'));
    //         $hasFilter = true;
    //     }

    //     if ($request->filled('filter_order_date')) {
    //         $query->whereDate('created_at', '<=', $request->input('filter_order_date'));
    //         $hasFilter = true;
    //     }

    //     if (!$hasFilter) {
    //         return redirect()->route('admin.notifications.index')
    //             ->with('error', 'Choose at least one filter for cleaning');
    //     }

    //     $deleteCount = $query->delete();

    //     return redirect()->route('admin.notifications.index')
    //             ->with('success', "Notifications have been successfully cleared: {$deleteCount}");
    // }
}
