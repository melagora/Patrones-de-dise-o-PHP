<?php
/*
 * Ejercicio 1:
 * Crear un programa que contenga dos personajes: "Esqueleto" y "Zombi". 
 * Cada personaje tendrá una lógica diferente en sus ataques y velocidad. La creación de los personajes dependerá del nivel del juego:
 *
 * - En el nivel fácil se creará un personaje "Esqueleto".
 * - En el nivel difícil se creará un personaje "Zombi".
 *
 * Debes aplicar el patrón de diseño Factory para la creación de los personajes.
 */

// Interfaz para los personajes
interface Personaje
{
    public function atacar();
    public function getVelocidad();
}

/**
 * Clase Esqueleto que implementa la interfaz Personaje.
 * Representa un personaje de tipo Esqueleto.
 */
class Esqueleto implements Personaje
{
    /**
     * Método para realizar un ataque.
     *
     * @return string Descripción del ataque del Esqueleto.
     */
    public function atacar()
    {
        return "El Esqueleto ataca con una flecha.";
    }

    /**
     * Método para obtener la velocidad del Esqueleto.
     *
     * @return string Velocidad del Esqueleto.
     */
    public function getVelocidad()
    {
        return "Velocidad del Esqueleto: 5.";
    }
}

/**
 * Clase Zombi que implementa la interfaz Personaje.
 * Representa un personaje de tipo Zombi.
 */
class Zombi implements Personaje
{
    /**
     * Método para realizar un ataque.
     *
     * @return string Descripción del ataque del Zombi.
     */
    public function atacar()
    {
        return "El Zombi ataca con un mordisco.";
    }

    /**
     * Método para obtener la velocidad del Zombi.
     *
     * @return string Velocidad del Zombi.
     */
    public function getVelocidad()
    {
        return "Velocidad del Zombi: 2.";
    }
}

// Clase Factory para crear personajes
class PersonajeFactory
{
    // Método estático para crear un personaje basado en el nivel de dificultad
    public static function crearPersonaje($nivel)
    {
        // Si el nivel es "facil", crea y retorna una instancia de Esqueleto
        if ($nivel === "facil") {
            return new Esqueleto();

        // Si el nivel es "dificil", crea y retorna una instancia de Zombi
        } elseif ($nivel === "dificil") {
            return new Zombi();

        // Si el nivel no es válido, lanza una excepción
        } else {
            throw new Exception("Nivel de juego no válido.");
        }
    }
}

/**
 * Ejemplo de uso
 * 
 * Este bloque de código muestra cómo utilizar la fábrica de personajes para crear un personaje
 * basado en el nivel de dificultad especificado y luego realizar acciones con el personaje.
 * 
 * @throws Exception Si ocurre un error durante la creación del personaje.
 */
try {
    /**
     * Nivel de dificultad del personaje.
     * Puede cambiar entre "facil" y "dificil" para probar diferentes configuraciones de personaje.
     * 
     * @var string $nivel
     */
    $nivel = "dificil"; // Cambiar entre "facil" y "dificil" para probar

    /**
     * Creación del personaje utilizando la fábrica de personajes.
     * 
     * @var Personaje $personaje
     */
    $personaje = PersonajeFactory::crearPersonaje($nivel);

    /**
     * Realiza un ataque con el personaje y muestra el resultado.
     * 
     * @return string Resultado del ataque.
     */
    echo $personaje->atacar() . PHP_EOL;

    /**
     * Obtiene y muestra la velocidad del personaje.
     * 
     * @return int Velocidad del personaje.
     */
    echo $personaje->getVelocidad() . PHP_EOL;
} catch (Exception $e) {
    /**
     * Captura y muestra cualquier error que ocurra durante la creación del personaje.
     * 
     * @param Exception $e Excepción capturada.
     * @return void
     */
    echo "Error: " . $e->getMessage() . PHP_EOL;
}
