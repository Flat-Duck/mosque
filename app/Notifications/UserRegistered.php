<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class UserRegistered extends Notification
{
    use Queueable;

    /**
     * The password reset token.
     *
     * @var string
     */
    public $mosque;
    
    public $name;
    
    public $email;

    public $password;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($mosque, $email, $name,$password)
    {
        $this->mosque = $mosque;
        $this->email = $email;
        $this->name = $name;
        $this->password = $password;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }
    
    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('تسجيل حساب جديد')
            ->greeting('مرحبا ' . $this->name . ',')
            ->line('انت ترى هذه الرسالة لانه تم تسجيلك في منظومة الاوفاف لادارة المساجد')
            ->line($this->mosque . 'تم تسجيلك كمشرف على مسجد')
            ->line(':بيانات تسجبل الدخول كالاتي')
            ->line($this->email .':البريد الالكتروني')
            ->line($this->password . ':كلمة المرور')
            ->line('ننصحك بتغيير كلمة المرور حال تسجيل دخولك الى الموقع')
           
            ->action('إضغط هنا لتسجيل الدخول', route('user.login', [
                'email' => $this->email,
                'password' => $this->password
            ]))
            ->line('شكرا لاهتمامك')
        ;
    }//, 'email' => $this->email
    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}