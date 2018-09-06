@component('mail::message')
# Permohonan Tempahan Telah Diluluskan.

Berikut adalah maklumat peralatan yang diluluskan.

@component('mail::table')
| Name       | Quantity         |
| ------------- |:-------------:|
@foreach($application->items as $item)
| {{ $item->name }} | {{ $item->peralatan->quantity }} |
@endforeach
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent