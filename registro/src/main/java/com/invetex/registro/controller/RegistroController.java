package com.invetex.registro.controller;

import com.invetex.registro.pojo.PojoEntidad;
import com.invetex.registro.servicio.RegistroServicio;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.http.HttpStatus;
import org.springframework.http.ResponseEntity;
import org.springframework.web.bind.annotation.*;

import java.io.IOException;
import java.security.GeneralSecurityException;

@RestController
@RequestMapping(value="/Registro/v1/")

public class RegistroController {


    @Autowired
    private RegistroServicio registroServicio ;
    @CrossOrigin (origins = "http://127.0.0.1:5501/")
    @PostMapping("registrar")
    public ResponseEntity <String> registrarUsuario (@RequestBody PojoEntidad pojoEntidad) throws GeneralSecurityException, IOException {

        System.out.println(pojoEntidad.toString());
        System.out.println("pojo ENTIDAD" + pojoEntidad.getId());

    return new ResponseEntity<String>(registroServicio.registrarUsuario(pojoEntidad), HttpStatus.OK);
    }

}
