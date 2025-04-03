<x-mail::message>
# Introduction

Thanks for subscribing to our newsletter.
<x-mail::button :url="url('/')">
Button Text
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
