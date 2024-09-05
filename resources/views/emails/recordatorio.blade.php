<!DOCTYPE html>
<html>
<head>
    <title>Registro de Cita</title>
</head>
<body style="font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; background: linear-gradient(to right, #ff7e5f, #feb47b); margin: 0; padding: 20px;">
    <div style="max-width: 600px; margin: 0 auto; background-color: #ffffff; padding: 30px; border-radius: 10px; box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);">
        <h1 style="text-align: center; color: #333333; font-size: 26px;">¡Tu Cita ha sido Registrada!</h1>
        <p style="text-align: center; color: #555555;">Estamos encantados de informarte que tu cita ha sido agendada con éxito. Aquí tienes los detalles:</p>
        <div style="margin: 20px 0; border-top: 3px solid #feb47b;"></div>
        <ul style="list-style-type: none; padding: 0; text-align: center; color: #333333;">
            <li style="margin-bottom: 12px;">
                <strong>Cliente:</strong> {{ $cita->cliente->nombre }}
            </li>
            <li style="margin-bottom: 12px;">
                <strong>Tratamiento:</strong> {{ $cita->tratamiento->nombre }}
            </li>
            <li style="margin-bottom: 12px;">
                <strong>Fecha:</strong> {{ $cita->fecha }}
            </li>
            <li style="margin-bottom: 12px;">
                <strong>Hora:</strong> {{ $cita->hora }}
            </li>
            <li style="margin-bottom: 12px;">
                <strong>Costo:</strong> ${{ $cita->costo }}
            </li>
        </ul>
    </div>
</body>
</html>
