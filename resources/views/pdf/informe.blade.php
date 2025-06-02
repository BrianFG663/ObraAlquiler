<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Informe de Maquinaria</title>
</head>

<body>

    <header>
        <img src="{{ public_path('images/excavador.png') }}" alt="Logo">
        <div class="empresa">ObrAlquiler S.A.</div>
        <div class="dominio">www.ObrAlquiler.com</div>
    </header>

    <footer>
        Página <span class="page"></span> - Generado el {{ \Carbon\Carbon::now()->format('d/m/Y') }}
    </footer>

    <br><br><br><br><br>
    <main>
        <div class="titulo">Informe de Maquinaria {{ $maquina->serial_number }}</div>

        <div class="info-section">
            <table>
                <tr><th>Tipo:</th><td>{{ $maquina->machineType->name }}</td></tr>
                <tr><th>Modelo:</th><td>{{ $maquina->model }}</td></tr>
                <tr><th>Fecha de compra</th><td>{{ $maquina->created_at->format('d/m/Y') }}</td></tr>
                <tr><th>Cantidad de uso</th><td>{{ $maquina->assignments->count() }}</td></tr>
                <tr><th>Kilómetros totales</th><td>{{ $maquina->life_time_km }}</td></tr>

                @if ($maquina->assignments->isNotEmpty())
                    @if ($maquina->assignments->last()->end_date == null)
                        <tr><th>En uso actualmente</th><td>Sí</td></tr>
                    @else
                        <tr><th>En uso actualmente</th><td>No</td></tr>
                    @endif
                @else
                    <tr><th>En uso actualmente</th><td>No</td></tr>
                @endif

                @if ($maquina->maintenances->isNotEmpty())
                    <tr><th>Cantidad de mantenimientos</th><td>{{ $maquina->maintenances->count() }}</td></tr>
                @else
                    <tr><th>Cantidad de mantenimientos</th><td style="color:red">No se han realizado mantenimientos.</td></tr>
                @endif
            </table>
        </div>
        <br><br>
        <div class="info-section mantenimientos">
            <h3>Historial de Mantenimientos</h3>
            <table>
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Fecha</th>
                        <th>Descripción</th>
                        <th>KM de la maquinaria</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($maquina->maintenances->isNotEmpty())
                        @foreach ($maquina->maintenances as $index => $mantenimiento)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ \Carbon\Carbon::parse($mantenimiento->maintenance_date)->format('d/m/Y') }}</td>
                                <td>{{ $mantenimiento->description }}</td>
                                <td>{{ $mantenimiento->kilometers_maintenances }} km</td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="4" style="text-align: center; padding: 10px; color:red">
                                No se han realizado mantenimientos.
                            </td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </main>

</body>

<style>
    @page {
        margin: 160px 40px 80px 40px;
    }

    body {
        font-family: DejaVu Sans, sans-serif;
        font-size: 12px;
        color: #000;
    }

    header {
        position: fixed;
        top: -110px; /* ↓ más bajo para dar espacio */
        left: 0;
        right: 0;
        text-align: center;
        padding: 30px 0 15px;
        border-bottom: 4px solid #f1c40f;
        background-color: #000;
        color: #f1c40f;
    }

    header img {
        width: 100px;
        margin-bottom: 10px;
    }

    .empresa {
        font-size: 24px;
        font-weight: bold;
        color: white;
    }

    .dominio {
        font-size: 14px;
        color: white;
    }

    footer {
        position: fixed;
        bottom: -50px;
        left: 0;
        right: 0;
        text-align: center;
        font-size: 11px;
        color: #555;
        border-top: 1px solid #ccc;
        padding-top: 5px;
    }

    footer .page::after {
        content: counter(page);
    }

    .titulo {
        text-align: center;
        font-size: 20px;
        margin: 60px 0 25px;
        text-transform: uppercase;
        color: #000;
        font-weight: bold;
    }

    .info-section {
        margin-bottom: 25px;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 10px;
    }

    table th,
    table td {
        border: 1px solid #ddd;
        padding: 8px;
        vertical-align: top;
    }

    table th {
        background-color: #fdf3c0;
        color: #000;
        font-weight: bold;
    }

    .mantenimientos h3 {
        margin: 0 0 5px;
        color: #000;
    }
</style>

</html>
