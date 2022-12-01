package com.invetex.registro.implementacion;

import com.invetex.registro.pojo.PojoEntidad;

import java.io.IOException;
import java.security.GeneralSecurityException;

public interface InterfaceRegistro {

    public String registrarUsuario (PojoEntidad pojoEntidad) throws GeneralSecurityException, IOException;
}
