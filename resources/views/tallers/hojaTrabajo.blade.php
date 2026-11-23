<h2>ORDEN DE TRABAJO - TALLER ELÉCTRICO</h2>

<p>
    El mecánico <strong>{{ $reparacion->mecanico->user->name }}</strong> tiene asignada la reparación del vehículo
    perteneciente al cliente <strong>{{ $reparacion->cliente->nombre }} {{ $reparacion->cliente->apellidos }}</strong>
    con DNI <strong>{{ $reparacion->cliente->dni }}</strong>.
</p>
<ul>
    <li><strong>Fecha:</strong> {{ $reparacion->fecha_entrada }}</li>
    <li><strong>Descripción:</strong> {{ $reparacion->descripcion }}</li>
    <li><strong>Importe:</strong> {{ $reparacion->importe }} €</li>
</ul>

@if($reparacion->importe > 500)
    <h3 style="color: red;">Requiere autorización previa de gerencia antes de iniciar</h3>
@endif