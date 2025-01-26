<?php
/*
 * Ejercicio 4:
 * Tenemos un sistema donde mostramos mensajes en distintos tipos de salida,
 * como por consola, formato JSON y archivo TXT. Debes crear un programa
 * donde se muestren todos estos tipos de salidas.
 * 
 * Para este propósito, aplica el patrón de diseño Strategy.
 */

// Interfaz para las estrategias de salida
interface OutputStrategy {
    public function display(string $message): void;
}

// Estrategia concreta: Mostrar mensaje por consola
class ConsoleOutput implements OutputStrategy {
    public function display(string $message): void {
        echo "Consola: " . $message . PHP_EOL;
    }
}

// Estrategia concreta: Mostrar mensaje en formato JSON
class JsonOutput implements OutputStrategy {
    public function display(string $message): void {
        echo json_encode(["message" => $message], JSON_PRETTY_PRINT) . PHP_EOL;
    }
}

// Estrategia concreta: Guardar mensaje en un archivo TXT
class TxtOutput implements OutputStrategy {
    public function display(string $message): void {
        $filePath = 'output.txt';
        file_put_contents($filePath, $message . PHP_EOL, FILE_APPEND);
        echo "El mensaje se guardó en el archivo: {$filePath}" . PHP_EOL;
    }
}

// Contexto: Usa diferentes estrategias de salida
class MessagePrinter {
    private OutputStrategy $strategy;

    // Establecer la estrategia
    public function setStrategy(OutputStrategy $strategy): void {
        $this->strategy = $strategy;
    }

    // Mostrar el mensaje utilizando la estrategia actual
    public function displayMessage(string $message): void {
        $this->strategy->display($message);
    }
}

// Uso del programa
// Crear el contexto
$messagePrinter = new MessagePrinter();

// Mensaje a mostrar
$message = "Hola, este es un mensaje utilizando el patrón Strategy.";

// Estrategia: Mostrar en consola
$messagePrinter->setStrategy(new ConsoleOutput());
$messagePrinter->displayMessage($message);

// Estrategia: Mostrar en formato JSON
$messagePrinter->setStrategy(new JsonOutput());
$messagePrinter->displayMessage($message);

// Estrategia: Guardar en un archivo TXT
$messagePrinter->setStrategy(new TxtOutput());
$messagePrinter->displayMessage($message);

?>