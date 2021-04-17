<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NotificacionesController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        // Buscamos
        $notificaciones = auth()->user()->unreadNotifications;
        // Reseteamos
        auth()->user()->Notifications->markAsRead();
        // dd : die end down
        return view('notificaciones.index', compact('notificaciones'));
    }
}
