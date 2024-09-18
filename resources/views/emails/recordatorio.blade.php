<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmación de Cita</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f1f8f6;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            border: 1px solid #e0e0e0;
        }
        .header {
            text-align: center;
            padding-bottom: 20px;
            border-bottom: 2px solid #4db6ac;
            margin-bottom: 20px;
        }
        .header img {
            max-width: 120px;
            height: auto;
        }
        .header h1 {
            color: #004d40;
            font-size: 24px;
            margin: 10px 0;
        }
        .subheader {
            text-align: center;
            color: #00796b;
            font-size: 16px;
            margin-bottom: 20px;
        }
        .divider {
            margin: 20px 0;
            border-top: 2px solid #4db6ac;
        }
        .details {
            color: #004d40;
            line-height: 1.6;
            border-collapse: collapse;
            width: 100%;
        }
        .details th, .details td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #e0e0e0;
        }
        .details th {
            background-color: #4db6ac;
            color: #ffffff;
        }
        .details td {
            background-color: #f9f9f9;
        }
        .footer {
            text-align: center;
            margin-top: 20px;
            color: #00796b;
            font-size: 14px;
        }
        .footer a {
            color: #00796b;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Confirmación de Cita</h1>
        </div>
        <div class="subheader">
            Nos complace informarte que tu cita ha sido agendada con éxito. A continuación, te proporcionamos los detalles de tu cita:
        </div>
        <div class="divider"></div>
        <table class="details">
            <tr>
                <th>Cliente</th>
                <td>{{ $cita->cliente->nombre }}</td>
            </tr>
            <tr>
                <th>Tratamiento</th>
                <td>{{ $cita->tratamiento->nombre }}</td>
            </tr>
            <tr>
                <th>Fecha</th>
                <td>{{ \Carbon\Carbon::parse($cita->fecha)->locale('es')->translatedFormat('d \d\e F \d\e Y') }}</td>
            </tr>
            <tr>
                <th>Hora</th>
                <td>{{ \Carbon\Carbon::parse($cita->hora)->format('g:i A') }}</td>
            </tr>
            <tr>
                <th>Costo</th>
                <td>${{ number_format($cita->costo, 2) }}</td>
            </tr>
        </table>
        <div class="footer">
            Si tienes alguna pregunta, no dudes en contactarnos. <br>
            <a href="mailto:info@consultorio.com">info@consultorio.com</a>
        </div>
    </div>
</body>
</html>
