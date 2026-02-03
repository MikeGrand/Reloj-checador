/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package Objetos;

import java.time.LocalDateTime;

/**
 *
 * @author Chovy
 */
public class Registro {
    private int idTrabajador;
    private LocalDateTime entrada;
    private LocalDateTime salidaComer;
    private LocalDateTime regresoComer;
    private LocalDateTime salida;
    
    public Registro(int idTrabajador, LocalDateTime entrada, LocalDateTime salidaComer, LocalDateTime regresoComer, LocalDateTime salida) {
        this.idTrabajador = idTrabajador;
        this.entrada = entrada;
        this.salidaComer = salidaComer;
        this.regresoComer = regresoComer;
        this.salida = salida;
    }


    public int getIdTrabajador() {
        return idTrabajador;
    }

    public void setIdTrabajador(int idTrabajador) {
        this.idTrabajador = idTrabajador;
    }

    public LocalDateTime getEntrada() {
        return entrada;
    }

    public void setEntrada(LocalDateTime entrada) {
        this.entrada = entrada;
    }

    public LocalDateTime getSalidaComer() {
        return salidaComer;
    }

    public void setSalidaComer(LocalDateTime salidaComer) {
        this.salidaComer = salidaComer;
    }

    public LocalDateTime getRegresoComer() {
        return regresoComer;
    }

    public void setRegresoComer(LocalDateTime regresoComer) {
        this.regresoComer = regresoComer;
    }

    public LocalDateTime getSalida() {
        return salida;
    }

    public void setSalida(LocalDateTime salida) {
        this.salida = salida;
    }
    
}
