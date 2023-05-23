<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Notifications\Messages\MailMessage;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
      VerifyEmail::toMailUsing(function ($notifiable,$url){
        return (new MailMessage)
        -> subject('Verificar Cuenta')
        -> line('Tu Cuenta esta de Regreso solo debes precionar en el Boton de verificacion para que  puedas accerder en ella')
        ->action('Confirmar Cuenta',$url)
        ->line('Si tu no fuiste que Envio el reseteo de cuenta puedes IGNORAR ESTE MENSAJE');

      });

      
        //
    }
}
