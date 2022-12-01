package com.invetex.registro.implementacion;

import com.invetex.registro.entidad.RegistroEntidad;
import com.invetex.registro.pojo.PojoEntidad;
import com.invetex.registro.repository.IRegistroRepository;
import com.invetex.registro.utilidades.Encriptacion;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Component;

import java.io.IOException;
import java.security.GeneralSecurityException;

@Component
public class RegistroImpl implements InterfaceRegistro {
    @Autowired
    private IRegistroRepository iRegistroRepository;

    private RegistroEntidad registroEntidad;
    @Override
    public String registrarUsuario(PojoEntidad pojoEntidad) throws GeneralSecurityException, IOException {
        registroEntidad = new RegistroEntidad();
        registroEntidad.setEmail(pojoEntidad.getEmail());
        registroEntidad.setId(pojoEntidad.getId());
        registroEntidad.setNombre(pojoEntidad.getNombre());
        registroEntidad.setTelefono(pojoEntidad.getTelefono());
        registroEntidad.setPassword(Encriptacion.encriptarPassword(pojoEntidad.getPassword()));

        System.out.println("1" + registroEntidad.getId());
        try {


            if (!iRegistroRepository.existsById(registroEntidad.getId())) {
                System.out.println("2" + registroEntidad.getId());
                iRegistroRepository.save(registroEntidad);
                return "Usuario registrado correctamente";
            }

            else {
                return "Documento ya existe";
            }
        }

        catch (Exception e){
            System.out.println("Error" + e.getMessage());
            return "Error" + e.getMessage();
        }
    }
}
