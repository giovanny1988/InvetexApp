package com.invetex.registro.servicio;

import com.invetex.registro.pojo.PojoEntidad;
import com.invetex.registro.implementacion.RegistroImpl;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;

import java.io.IOException;
import java.security.GeneralSecurityException;

@Service
public class RegistroServicio {

    @Autowired
    private RegistroImpl registroImpl;

    public String registrarUsuario (PojoEntidad pojoEntidad) throws GeneralSecurityException, IOException {
        return registroImpl.registrarUsuario(pojoEntidad);
    }

}
