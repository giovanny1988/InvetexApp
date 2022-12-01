package com.invetex.registro.repository;

import com.invetex.registro.entidad.RegistroEntidad;
import org.springframework.data.repository.CrudRepository;
import org.springframework.stereotype.Repository;

@Repository
public interface IRegistroRepository extends CrudRepository <RegistroEntidad, Long> {
}
