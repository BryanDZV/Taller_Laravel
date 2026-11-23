<h1>Listado de Reparaciones Asignadas</h1>
<table border="1">
    <tr>
        <th>Fecha de Entrada</th>
        <th>Descripción</th>
        <th>DNI Cliente</th>
        <th>Acciones</th>
    </tr>
    @forelse($reparaciones as $rep)
        <tr>
            <td>{{ \Carbon\Carbon::parse($rep->fecha_entrada)->format('d-m-Y') }}</td>
            <td>{{ $rep->descripcion }}</td>
            <td>{{ $rep->cliente->dni }}</td>
            <td>
                <a href="{{ route('tallers.hojaTrabajo', $rep->id) }}"><button>Generar Hoja de Trabajo</button></a>
            </td>
        </tr>
    @empty
        <tr>
            <td colspan="4">No tienes reparaciones planificadas desde hoy.</td>
        </tr>
    @endforelse
</table>