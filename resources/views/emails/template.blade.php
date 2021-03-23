@component('mail::message')
# Introduction

{{$data['name']}} المستخدم:
<br>
{{$data['place_url']}} ابلغ عن الرابط:

@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
