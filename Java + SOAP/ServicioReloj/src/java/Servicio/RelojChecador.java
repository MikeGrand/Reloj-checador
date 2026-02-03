/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package Servicio;

import BaseDatos.ConfigDataBase;
import java.sql.Connection;
import java.sql.PreparedStatement;
import java.sql.SQLException;
import java.time.LocalDateTime;

public class RelojChecador {

    public static void main(String[] args) {
        int idTrabajador = 12346; // Cambia este ID según tus datos
        String tipoEvento = "entrada"; // Cambia a "salidacomer", "regresocomer", etc.

        String resultado = registrarEvento(idTrabajador, tipoEvento);
        System.out.println(resultado);
    }

    public static String registrarEvento(int idTrabajador, String tipoEvento) {
        String columna = obtenerColumna(tipoEvento);
        if (columna == null) {
            return "Tipo de evento no válido.";
        }

        try (Connection connection = ConfigDataBase.obtenerConexion()) {
            String query = "UPDATE entradassalidas SET " + columna + " = ? WHERE idTrabajador = ?";
            try (PreparedStatement stmt = connection.prepareStatement(query)) {
                stmt.setTimestamp(1, java.sql.Timestamp.valueOf(LocalDateTime.now()));
                stmt.setInt(2, idTrabajador);
                int filasActualizadas = stmt.executeUpdate();
                if (filasActualizadas > 0) {
                    return "Evento registrado con éxito.";
                } else {
                    return "ID de trabajador no encontrado.";
                }
            }
        } catch (SQLException e) {
            e.printStackTrace();
            return "Error al registrar el evento: " + e.getMessage();
        }
    }

    private static String obtenerColumna(String tipoEvento) {
        switch (tipoEvento.toLowerCase()) {
            case "entrada": return "entrada";
            case "salidacomer": return "salidaComer";
            case "regresocomer": return "regresoComer";
            case "salida": return "salida";
            default: return null;
        }
    }
}

