package com.invetex.registro.utilidades;
import java.io.IOException;
import java.security.GeneralSecurityException;
import javax.crypto.spec.SecretKeySpec;



public class Encriptacion
{

        public static String encriptarPassword(String password)
                throws IOException, GeneralSecurityException
        {

            byte[] salt = new String("622836429").getBytes();
            int iterationCount = 10000;
            int keyLength = 128;

            LlaveSecreta object = new LlaveSecreta();
            SecretKeySpec key = object.generateSecretKey(
                    password.toCharArray(), salt, iterationCount,
                    keyLength);

            String originalPassword = password;
            System.out.println("Original password: "
                    + originalPassword);
            String encryptedPassword
                    = object.encrypt(originalPassword, key);

            System.out.println("Encrypted password: "
                    + encryptedPassword);

            return encryptedPassword;
        }

}
