@component('mail::message')
# Your post was liked

{{ $liker->name}} like one of your post

@component('mail::button', ['url' => route('posts.show', $post)])
    View Post
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent