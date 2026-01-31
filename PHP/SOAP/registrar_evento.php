<?php
// Verificar si el formulario fue enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario
    $idTrabajador = $_POST['idTrabajador'];
    $tipoEvento = $_POST['tipoEvento'];

    // Dirección del WSDL del servicio web
    $wsdl = "http://localhost:8080/ServicioReloj/RelojChecadorService?wsdl"; // Asegúrate de que esta URL sea correcta

    try {
        // Crear cliente SOAP
        $client = new SoapClient($wsdl, array('trace' => 1));

        // Definir los parámetros para el servicio
        $params = array(
            'idTrabajador' => $idTrabajador,  // ID del trabajador
            'tipoEvento' => $tipoEvento       // Tipo de evento ('entrada', 'salidacomer', etc.)
        );

        // Llamar al servicio SOAP
        $response = $client->__soapCall('registrarEvento', array($params));

        
        // Mostrar la respuesta del servicio con estilos generales
        echo "
        <!DOCTYPE html>
        <html lang='en'>
        <head>
            <meta charset='UTF-8'>
            <meta name='viewport' content='width=device-width, initial-scale=1.0'>
            <link rel='preconnect' href='https://fonts.googleapis.com'>
            <link rel='preconnect' href='https://fonts.gstatic.com' crossorigin>
            <link href='https://fonts.googleapis.com/css2?family=Share+Tech+Mono&display=swap' rel='stylesheet'>
            <title>Reloj Checador - Respuesta</title>
            <style>
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
                .respuesta {
                    text-align: center;
                    margin-top: 30px;
                    padding: 20px;
                    background: rgba(10, 175, 230, 0.2);
                    border: 1px solid rgba(10, 175, 230, 0.5);
                    border-radius: 10px;
                    color: white;
                    text-shadow: 0 0 10px rgba(10, 175, 230, 0.5);
                    width: 60%;
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
            <div class='respuesta'>
                <h3>Respuesta del Servicio</h3>";
        if (is_object($response)) {
            echo "<p>" . htmlspecialchars($response->return) . "</p>";
        } else {
            echo "<p>" . htmlspecialchars($response) . "</p>";
        }
        echo "
            </div>
        </body>
        </html>";



    } catch (SoapFault $e) {
        // Manejo de errores
        echo "<h3>Error al consumir el servicio:</h3>";
        echo "<p>" . htmlspecialchars($e->getMessage()) . "</p>";
    }
}
?>
