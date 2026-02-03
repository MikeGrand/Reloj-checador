package ServiciosWeb;
import BaseDatos.ConfigDataBase;
import javax.jws.WebMethod;
import javax.jws.WebParam;
import javax.jws.WebService;
import java.sql.Connection;
import java.sql.PreparedStatement;
import java.sql.SQLException;
import java.time.LocalDateTime;

@WebService
public class RelojChecadorService {

    @WebMethod
    public String registrarEvento(
        @WebParam(name = "idTrabajador") int idTrabajador, 
        @WebParam(name = "tipoEvento") String tipoEvento) {
        
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

    private String obtenerColumna(String tipoEvento) {
        switch (tipoEvento.toLowerCase()) {
            case "entrada": return "entrada";
            case "salidacomer": return "salidaComer";
            case "regresocomer": return "regresoComer";
            case "salida": return "salida";
            default: return null;
        }
    }
}
