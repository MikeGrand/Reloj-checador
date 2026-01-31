<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reloj Digital - Reloj Checador</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Share+Tech+Mono&display=swap" rel="stylesheet">
    <style>
        /* Estilos generales */
        * {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }
        body {
            width: 100%;
            height: 100vh;
            background: radial-gradient(ellipse at center, #0a2e38 0%, #000000 70%);
            font-family: 'Share Tech Mono', monospace;
            color: #ffffff;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }
        p {
            margin: 0;
            padding: 0;
        }
        .reloj {
            text-align: center;
            text-shadow: 0 0 20px rgba(10, 175, 230, 1), 0 0 20px rgba(10, 175, 230, 0);
            margin-bottom: 30px;
        }
        .tiempo {
            letter-spacing: 0.05em;
            font-size: 80px;
            padding: 5px 0;
        }
        .fecha {
            letter-spacing: 0.1em;
            font-size: 24px;
        }

        /* Estilos para el formulario */
        form {
            background: rgba(255, 255, 255, 0.1);
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 15px rgba(10, 175, 230, 0.5);
            text-align: center;
            width: 300px;
        }
        label, select, input {
            display: block;
            margin: 10px auto;
            text-align: left;
            width: 80%;
        }
        input, select {
            padding: 8px;
            border: 1px solid #0a2e38;
            border-radius: 4px;
            background: #1c3b4a;
            color: #fff;
            outline: none;
        }
        button {
            margin-top: 10px;
            padding: 10px 20px;
            background: #0a2e38;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background 0.3s ease;
        }
        button:hover {
            background: rgba(10, 175, 230, 1);
        }
        h2 {
            margin-bottom: 20px;
            font-size: 20px;
            text-shadow: 0 0 10px rgba(10, 175, 230, 0.5);
        }
        .respuesta {
            text-align: center;
            margin-top: 30px;
            padding: 20px;
            background: rgba(10, 175, 230, 0.2);
            border: 1px solid rgba(10, 175, 230, 0.5);
            border-radius: 10px;
            color: white;
            font-family: 'Share Tech Mono', monospace;
            text-shadow: 0 0 10px rgba(10, 175, 230, 0.5);
            width: 60%;
            margin-left: auto;
            margin-right: auto;
        }
        .respuesta h3 {
            margin-bottom: 10px;
            font-size: 24px;
            color: rgba(10, 175, 230, 1);
        }
        .respuesta p {
            font-size: 18px;
            line-height: 1.5;
        }

    </style>
</head>
<body>
    <!-- Reloj Digital -->
    <div class="reloj">
        <p class="fecha"></p>
        <p class="tiempo"></p>
    </div>

    <!-- Formulario para registrar evento -->
    <h2>Registro de Evento - Reloj Checador</h2>
    <form action="../SOAP/registrar_evento.php" method="POST">
        <label for="idTrabajador">ID de Trabajador:</label>
        <input type="text" id="idTrabajador" name="idTrabajador" required>
        
        <label for="tipoEvento">Tipo de Evento:</label>
        <select id="tipoEvento" name="tipoEvento" required>
            <option value="entrada">Entrada</option>
            <option value="salidacomer">Salida Comer</option>
            <option value="regresocomer">Regreso Comer</option>
            <option value="salida">Salida</option>
        </select>
        
        <button type="submit">Registrar Evento</button>
    </form>

    <!-- Script del reloj -->
    <script>
        const $tiempo = document.querySelector('.tiempo'),
        $fecha = document.querySelector('.fecha');

        function digitalClock() {
            let f = new Date(),
                dia = f.getDate(),
                mes = f.getMonth() + 1,
                anio = f.getFullYear(),
                diaSemana = f.getDay();

            dia = ('0' + dia).slice(-2);
            mes = ('0' + mes).slice(-2);

            let timeString = f.toLocaleTimeString();
            $tiempo.innerHTML = timeString;

            let semana = ['DOM', 'LUN', 'MAR', 'MIE', 'JUE', 'VIE', 'SAB'];
            let showSemana = (semana[diaSemana]);
            $fecha.innerHTML = `${anio}-${mes}-${dia} ${showSemana}`;
        }

        setInterval(() => {
            digitalClock();
        }, 1000);
    </script>
</body>
</html>
