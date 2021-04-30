@component('mail::message')
# Your Post was liked

{{$liker->name}} liked one of your posts

@component('mail::button', ['url' => route('show',$post)])
    view post
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
