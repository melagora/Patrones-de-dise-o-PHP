<?php
/*
 * Ejercicio 2:
 * Estamos trabajando con distintas versiones de sistemas operativos Windows 7 y
 * Windows 10. Al compartir archivos como Word, Excel, Power Point, surgen
 * problemas al abrirlos en Windows 10 debido a la falta de compatibilidad con la
 * versión Windows 7. Debes crear un programa donde Windows 10 pueda aceptar estos
 * archivos independientemente de que sean de versiones anteriores.
 * 
 * Para ello, aplica el patrón de diseño Adapter.
 */

// Interfaz que espera Windows 10
interface Windows10FileInterface
{
    public function open();
}

// Clase de archivos incompatibles (archivos antiguos de Windows 7)
class Windows7File
{
    private $fileName;

    public function __construct($fileName)
    {
        $this->fileName = $fileName;
    }

    // Método que representa la apertura de un archivo de Windows 7
    public function openOldFile()
    {
        return "Abriendo archivo en formato de Windows 7: {$this->fileName}";
    }
}

// Adapter que convierte el archivo de Windows 7 al formato esperado por Windows 10
class Windows7ToWindows10Adapter implements Windows10FileInterface
{
    private $windows7File;

    public function __construct(Windows7File $windows7File)
    {
        $this->windows7File = $windows7File;
    }

    // Implementación del método que Windows 10 espera
    public function open()
    {
        // Llamamos a la funcionalidad del archivo Windows 7, adaptada al formato de Windows 10
        return $this->windows7File->openOldFile();
    }
}

// Simulamos un archivo creado en Windows 7
$windows7File = new Windows7File('documento_antiguo.docx');

// Creamos el adapter para convertirlo a un formato compatible con Windows 10
$adapter = new Windows7ToWindows10Adapter($windows7File);

// Usamos el archivo a través de la interfaz de Windows 10
echo $adapter->open();

?>