@component('mail::message')
# Your post was liked

{{ $liker->name }} liked on of your posts

The body of your message.

@component('mail::button', ['url' => route('posts.show', $post)])
    View post
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
