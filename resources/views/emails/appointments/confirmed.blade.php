<x-mail::message>
# {{ __('Appointment Confirmation') }}

{{ __('Hello') }} {{ $appointment->patient->name }},

{{ __('Your appointment for') }} **{{ $appointment->service->name }}** {{ __('has been successfully scheduled.') }}

**{{ __('Details:') }}**
- **{{ __('Date:') }}** {{ $appointment->appointment_date->format('d/m/Y H:i') }}
- **{{ __('Doctor:') }}** {{ $appointment->doctor->name }}
- **{{ __('Service:') }}** {{ $appointment->service->name }}

{{ __('Please arrive 10 minutes before your scheduled time.') }}

<x-mail::button :url="config('app.url')">
{{ __('View My Appointments') }}
</x-mail::button>

{{ __('Thanks,') }}<br>
{{ config('app.name') }}
</x-mail::message>
