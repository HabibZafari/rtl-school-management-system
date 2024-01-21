@component('mail::message')
Hello {{$user->name}},

<p>کاربر گرامی، از طریق این ایمیل بازیابی رمز عبور خود را انجام دهید</p>
@component('mail::button', ['url' => url('reset', $user->remember_token)])بازیابی رمز عبور
    
@endcomponent
<p>اگر این ایمیل را نشان ندهید، این ایمیل را نادیده بگیرید.</p>
Thanks,<br>
{{ config('app.name') }}
    
@endcomponent