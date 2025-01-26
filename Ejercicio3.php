<?php
/*
 * Ejercicio 3:
 * Crear un programa donde sea posible añadir diferentes armas 
 * a ciertos personajes de videojuegos. Debes utilizar al menos 
 * dos personajes para este ejercicio.
 * 
 * Para llevar a cabo esta tarea, aplica el patrón de diseño Decorator.
 */

// Interfaz base de los personajes
interface CharacterInterface {
    public function getDescription(): string;
    public function getPower(): int;
}

// Clase concreta: Guerrero
class Warrior implements CharacterInterface {
    public function getDescription(): string {
        return "Guerrero";
    }

    public function getPower(): int {
        return 50; // Poder base del Guerrero
    }
}

// Clase concreta: Mago
class Mage implements CharacterInterface {
    public function getDescription(): string {
        return "Mago";
    }

    public function getPower(): int {
        return 40; // Poder base del Mago
    }
}

// Clase base para los Decorators
abstract class CharacterDecorator implements CharacterInterface {
    protected $character;

    public function __construct(CharacterInterface $character) {
        $this->character = $character;
    }

    public function getDescription(): string {
        return $this->character->getDescription();
    }

    public function getPower(): int {
        return $this->character->getPower();
    }
}

// Decorador concreto: Espada
class SwordDecorator extends CharacterDecorator {
    public function getDescription(): string {
        return $this->character->getDescription() . " con una espada";
    }

    public function getPower(): int {
        return $this->character->getPower() + 30; // Incrementa el poder en 30
    }
}

// Decorador concreto: Arco
class BowDecorator extends CharacterDecorator {
    public function getDescription(): string {
        return $this->character->getDescription() . " con un arco";
    }

    public function getPower(): int {
        return $this->character->getPower() + 20; // Incrementa el poder en 20
    }
}

// Decorador concreto: Varita mágica
class WandDecorator extends CharacterDecorator {
    public function getDescription(): string {
        return $this->character->getDescription() . " con una varita mágica";
    }

    public function getPower(): int {
        return $this->character->getPower() + 25; // Incrementa el poder en 25
    }
}

// Uso del patrón Decorator
// Crear un Guerrero básico
$warrior = new Warrior();
echo $warrior->getDescription() . " con poder: " . $warrior->getPower() . "\n";

// Añadirle una espada al Guerrero
$warriorWithSword = new SwordDecorator($warrior);
echo $warriorWithSword->getDescription() . " con poder: " . $warriorWithSword->getPower() . "\n";

// Añadirle un arco al Guerrero
$warriorWithSwordAndBow = new BowDecorator($warriorWithSword);
echo $warriorWithSwordAndBow->getDescription() . " con poder: " . $warriorWithSwordAndBow->getPower() . "\n";

// Crear un Mago básico
$mage = new Mage();
echo $mage->getDescription() . " con poder: " . $mage->getPower() . "\n";

// Añadirle una varita mágica al Mago
$mageWithWand = new WandDecorator($mage);
echo $mageWithWand->getDescription() . " con poder: " . $mageWithWand->getPower() . "\n";

// Añadirle un arco al Mago
$mageWithWandAndBow = new BowDecorator($mageWithWand);
echo $mageWithWandAndBow->getDescription() . " con poder: " . $mageWithWandAndBow->getPower() . "\n";
?>