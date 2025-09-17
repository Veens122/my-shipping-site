@component('mail::message')
# New Contact Request

You received a new message from your website:

- **Name:** {{ $data['name'] }}
- **Email:** {{ $data['email'] }}
- **Phone:** {{ $data['phone'] ?? 'N/A' }}

**Message:**
{{ $data['message'] }}

Thanks,
{{ config('app.name') }}
@endcomponent