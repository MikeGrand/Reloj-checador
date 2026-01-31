<?php
// Configuración de la base de datos
$host = "localhost";
$user = "root";
$password = "";
$dbname = "relojchecador";

// Conectar a la base de datos
$mysqli = new mysqli($host, $user, $password, $dbname);

// Verificar conexión
if ($mysqli->connect_error) {
    die("Error en la conexión: " . $mysqli->connect_error);
}

// Consulta a la base de datos
$query = "SELECT * FROM entradassalidas";
$result = $mysqli->query($query);

// Verificar si hay resultados
if (!$result) {
    die("Error en la consulta: " . $mysqli->error);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registros del Reloj Checador</title>
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
        h2 {
            text-shadow: 0 0 20px rgba(10, 175, 230, 1);
            margin-bottom: 20px;
        }
        table {
            margin: 20px auto;
            border-collapse: collapse;
            width: 90%;
            max-width: 1000px;
            background: rgba(10, 175, 230, 0.1);
            color: #ffffff;
            border: 1px solid rgba(10, 175, 230, 0.5);
        }
        th, td {
            padding: 10px;
            text-align: center;
            border: 1px solid rgba(10, 175, 230, 0.3);
        }
        th {
            background: rgba(10, 175, 230, 0.5);
            text-shadow: 0 0 10px rgba(10, 175, 230, 0.7);
        }
        tr:nth-child(even) {
            background: rgba(10, 175, 230, 0.2);
        }
        .no-data {
            text-align: center;
            padding: 20px;
            font-size: 18px;
            color: rgba(255, 255, 255, 0.7);
        }
    </style>
</head>
<body>
    <h2>Registros del Reloj Checador</h2>
    <?php if ($result->num_rows > 0): ?>
        <table>
            <thead>
                <tr>
                    <th>ID Trabajador</th>
                    <th>Entrada</th>
                    <th>Salida de Comer</th>
                    <th>Regreso de Comer</th>
                    <th>Salida</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?= htmlspecialchars($row['idTrabajador']) ?></td>
                        <td><?= htmlspecialchars($row['entrada']) ?></td>
                        <td><?= htmlspecialchars($row['salidaComer']) ?></td>
                        <td><?= htmlspecialchars($row['regresoComer']) ?></td>
                        <td><?= htmlspecialchars($row['salida']) ?></td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p class="no-data">No hay registros disponibles en la base de datos.</p>
    <?php endif; ?>

    <?php
    // Liberar resultados y cerrar conexión
    $result->free();
    $mysqli->close();
    ?>
</body>
</html>
