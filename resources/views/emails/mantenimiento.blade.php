@component('mail::message')
# Alerta de Mantenimiento

La máquina **{{ $maquina->serial_number }}** requiere mantenimiento.

- Modelo: {{ $maquina->model }}
- Sobrepaso su km recomendad: {{ $maquina->maintenance_km }} KM

@component('mail::button', ['url' => url('/verMaquina/' . $maquina->id)])
Ver máquina
@endcomponent

Gracias, Equipo de mantenimiento ObraAlquiler
@endcomponent
