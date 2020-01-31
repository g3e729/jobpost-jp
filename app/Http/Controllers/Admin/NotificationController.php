<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use App\Models\Notification;
use App\Models\User;
use App\Services\NotificationService;

class NotificationController extends BaseController
{
    public function index(Request $request)
    {
        $genres = Notification::getGenres();
        $targets = Notification::getTargets();

        $notifications = (new NotificationService)->search(
            $request->only('genre_id', 'from', 'to', 'target_id'),
            false,
            $request->get('sort', 'DESC'),
            true
        );

        return view('admin.notifications.index', compact('genres', 'notifications', 'targets'));
    }

    public function show(Notification $notification)
    {
        $notifications = Notification::whereGroupId($notification->group_id)->get();

        return view('admin.notifications.show', compact('notification', 'notifications'));
    }

    public function edit(Notification $notification)
    {
        $genres = Notification::getGenres();
        $targets = Notification::getTargets();

        return view('admin.notifications.edit', compact('genres', 'targets', 'notification'));
    }

    public function create()
    {
        $genres = Notification::getGenres();
        $targets = Notification::getTargets();

        return view('admin.notifications.create', compact('genres', 'targets'));
    }

    public function store(Request $request)
    {
        $total = (new NotificationService)->insertAdmin(
            $request->only('title', 'description', 'genre_id', 'published_at', 'target_id'),
            $request->get('target_id')
        );

        return redirect()->back()
            ->withSuccess("Success! Notication sent to {$total} users!");
    }

    public function update(Notification $notification, Request $request)
    {
        $total = (new NotificationService)->updateAdmin(
            $request->only('title', 'description', 'genre_id', 'published_at', 'target_id'),
            $notification->group_id
        );

        return redirect()->route('admin.notifications.show', $notification)
            ->withSuccess("Success! {$total} notications was updated!");
    }

    public function destroy(Notification $notification)
    {
        $notifications = Notification::whereGroupId($notification->group_id);
        $total = $notifications->count();
        $notifications->delete();


        return redirect()->route('admin.notifications.index')
            ->withSuccess("Success! {$total} notifications are deleted!");
    }

    public function myNotifications(Request $request)
    {
        $genres = Notification::getGenres();
        $targets = Notification::getTargets();
        $fields = $request->only('genre_id', 'from', 'to', 'target_id');
        $fields['notifiable_id'] = auth()->user()->id;
        $fields['notifiable_type'] = User::class;

        $notifications = (new NotificationService)->search(
            $fields,
            false,
            $request->get('sort', 'DESC'),
            true
        );

        return view('admin.notifications.index', compact('genres', 'notifications', 'targets'));
    }
}
