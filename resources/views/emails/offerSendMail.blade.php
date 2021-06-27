@component('mail::message')
# Task List:

@component('mail::text', ['url' => 'https://www.google.com'])
Button Text
@endcomponent

Thank You.<br>

Best Regards,
{{ Auth::user()->name }}
@endcomponent

