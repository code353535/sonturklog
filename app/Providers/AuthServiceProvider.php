<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Auth\Notifications\VerifyEmail;
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
        VerifyEmail::toMailUsing(function ($notifiable, $url) {
            return (new MailMessage)
                ->subject('E-posta Adresini doğrula')
                ->line('Merhaba ' . $notifiable->name . ',')
                ->line('Size, hesabınıza bağlı ' . $notifiable->email .  ' e-posta adresinin doğru olduğundan emin olmak için yazıyoruz. E-posta adresinizi doğrulamanız hesabınızın güvenliği için önemlidir. Lütfen aşağıdaki bağlantıyı kullanarak, e-posta adresinizi doğrulayın.')
                ->action('E-posta Adresini doğrula', $url)
                ->line('Doğrulama işleminin tamamlanabilmesi için bu cihazda Turklog.net hesabınıza giriş yapmış ve oturumunuzun halen açık durumda olması gerekmektedir.');
        });
    }
}
