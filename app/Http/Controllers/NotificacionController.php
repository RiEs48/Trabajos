<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NotificacionController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $notificaciones = auth()->user()->unreadNotifications;
        // invoke solo se usa para ver  notificaciones sin editar nada ni subir nada 
        //limpiar las Notificaciones
        auth()->user()->unreadNotifications->markAsRead();
     
        return view('notificaciones.index', [
        'notificaciones' => $notificaciones,

      ]);
    }
}
