<?php
/**
 * Class validacionFormularios
 *
 * Clase que contiene funciones para validar los campos de los formularios
 *
 * PHP version 7.0
 *
 * @category Validacion
 * @package  Validacion
 * @source ClaseValidacion.php
 * @since Versión 1.0
 * @copyright 19-10-2018
 */
class validacionFormularios{
    /**
     * @function comprobarAlfabetico();
     *
     * @param $cadena Cadena que se va a comprobar.
     * @param $maxTamanio Tamaño máximo de la cádena.
     * @param $minTamanio Tamaño mínimo de la cadena.
     * @param $obligatorio Valor booleano indicado mediante 1, si es obligatorio o 0 si no lo es.
     * @return null|string Devuelve null en el caso en el que esté correcto, si no devuelve una cadena con el mensaje de error.
     */

    public static function comprobarAlfabetico($cadena, $maxTamanio, $minTamanio, $obligatorio){
        // Patrón para campos de solo texto
        $patron_texto = "/^[a-zA-ZáéíóúÁÉÍÓÚäëïöüÄËÏÖÜàèìòùÀÈÌÒÙñÑ\s]+$/";
        $cadena = htmlspecialchars(strip_tags(trim((string)$cadena)));
        $mensajeError = null;
        if (preg_match($patron_texto, $cadena) && self::comprobarNoVacio((string)$cadena) && self::comprobarMaxTamanio((string)$cadena, $maxTamanio)
            && self::comprobarMinTamanio((string)$cadena, $minTamanio)) {
            $mensajeError = null;
        } else {
            $mensajeError = "No has introducido un valor correcto <br>";
        }
        if (!preg_match($patron_texto, $cadena)) {
            $mensajeError .= "Solo se admiten letras <br>";
        }
        if (self::comprobarNoVacio((string)$cadena) == false) {
            $mensajeError .= " Campo Vacio <br>";
        }
        if (self::comprobarMaxTamanio((string)$cadena, $maxTamanio) == false) {
            $mensajeError .= " El tamaño maximo es " . $maxTamanio . "<br>";
        }
        if (self::comprobarMinTamanio((string)$cadena, $minTamanio) == false) {
            $mensajeError .= " El tamaño minimo es " . $minTamanio . "<br>";
        }
        if (empty($cadena) && $obligatorio == 0) {
            $mensajeError = null;
        }
        return $mensajeError;
    }
// Función para comprobar un campo AlfaNumerico
// Return null es correcto, si no muestra el mensaje de error
// Si es un 1 es obligatorio, si es un 0 no lo es
    /**
     * @function comprobarAlfaNumerico();
     *
     * @param $cadena Cadena que se va a comprobar.
     * @param $maxTamanio Tamaño máximo de la cádena.
     * @param $minTamanio Tamaño mínimo de la cadena.
     * @param $obligatorio Valor booleano indicado mediante 1, si es obligatorio o 0 si no lo es.
     * @return null|string Devuelve null en el caso en el que esté correcto, si no devuelve una cadena con el mensaje de error.
     */
    public static function comprobarAlfaNumerico($cadena, $maxTamanio, $minTamanio, $obligatorio){
        $cadena = htmlspecialchars(strip_tags(trim((string)$cadena)));
        $mensajeError = null;
        if (self::comprobarNoVacio((string)$cadena) && self::comprobarMaxTamanio((string)$cadena, $maxTamanio) && self::comprobarMinTamanio((string)$cadena, $minTamanio)) {
            $mensajeError = null;
        } else {
            $mensajeError = "Error ";
        }
        if (self::comprobarNoVacio((string)$cadena) == false) {
            $mensajeError .= "campo Vacio";
        }
        if (self::comprobarMaxTamanio((string)$cadena, $maxTamanio) == false) {
            $mensajeError .= " El tamaño maximo es " . $maxTamanio;
        }
        if (self::comprobarMinTamanio((string)$cadena, $minTamanio) == false) {
            $mensajeError .= " El tamaño minimo es " . $minTamanio;
        }
        if (empty($cadena) && $obligatorio == 0) {
            $mensajeError = null;
        }
        return $mensajeError;
    }
// Función para comprobar si es un campo entero
// Return null es correcto, si no muestra el mensaje de error
// Si es un 1 es obligatorio, si es un 0 no lo es
    /**
     * @function comprobarEntero();
     *
     * @param $integer Número entero a comprobar
     * @param $obligatorio Valor booleano indicado mediante 1, si es obligatorio o 0 si no lo es.
     * @return null|string Devuelve null en el caso en el que esté correcto, si no devuelve una cadena con el mensaje de error.
     */
    public static function comprobarEntero($integer, $obligatorio){
        $mensajeError = null;
        if (filter_var($integer, FILTER_VALIDATE_INT) && self::comprobarNoVacio($integer)) {
            $correcto = null;
        } else {
            $mensajeError = "Error ";
        }
        if (!filter_var($integer, FILTER_VALIDATE_INT)) {
            $mensajeError .= "no es un entero";
        }
        if (!self::comprobarNoVacio($integer)) {
            $mensajeError .= " campo vacio";
        }
        if (empty($integer) && $obligatorio == 0) {
            $mensajeError = null;
        }
        return $mensajeError;
    }
// Función para comprobar si es un campo float
// Return null es correcto, si no muestra el mensaje de error
// Si es un 1 es obligatorio, si es un 0 no lo es
    /**
     * @function comprobarFloat();
     *
     * @param $float Número entero a comprobar
     * @param $obligatorio Valor booleano indicado mediante 1, si es obligatorio o 0 si no lo es.
     * @return null|string Devuelve null en el caso en el que esté correcto, si no devuelve una cadena con el mensaje de error.
     */
    public static function comprobarFloat($float, $obligatorio){
        $mensajeError = null;
        if (filter_var($float, FILTER_VALIDATE_FLOAT) && self::comprobarNoVacio($float)) {
            $mensajeError = null;
        } else {
            $mensajeError = "Error ";
        }
        if (!filter_var($float, FILTER_VALIDATE_FLOAT)) {
            $mensajeError .= " float no valido";
        }
        if (!self::comprobarNoVacio($float)) {
            $mensajeError .= "campo vacio";
        }
        if (empty($float) && $obligatorio == 0) {
            $mensajeError = null;
        }
        return $mensajeError;
    }
// Función para comprobar si es un correo electronico
// Return null es correcto, si no muestra el mensaje de error
// Si es un 1 es obligatorio, si es un 0 no lo es
//CAMBIADOS LOS MENSAJES DE ERROR POR JUAN JOSÉ
    /**
     * @function validarEmail();
     *
     * @param $email Cadena a comprobar.
     * @param $maxTamanio Tamaño máximo de la cadena.
     * @param $minTamanio Tamaño mínimo de la cadena.
     * @param $obligatorio Valor booleano indicado mediante 1, si es obligatorio o 0 si no lo es.
     * @return null|string Devuelve null si es correcto o un mensaje de error en caso de que lo haya.
     */
    public static function validarEmail($email, $maxTamanio, $minTamanio, $obligatorio){
        $mensajeError = null;
        if (filter_var($email, FILTER_VALIDATE_EMAIL) && self::comprobarNoVacio($email) && self::comprobarMaxTamanio($email, $maxTamanio) && self::comprobarMinTamanio($email, $minTamanio)) {
            $mensajeError = null;
        } else {
            $mensajeError = "fallo al introducir el correo";
        }
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $mensajeError = " correo no valido ej: tunombre@hotmail.com";
        }
        if (!self::comprobarNoVacio($email)) {
            $mensajeError = " campo Vacio";
        }
        if (!self::comprobarMaxTamanio($email, $maxTamanio)) {
            $mensajeError = " El tamaño maximo es " . $maxTamanio;
        }
        if (!self::comprobarMinTamanio($email, $minTamanio)) {
            $mensajeError = " El tamaño minimo es " . $minTamanio;
        }
        if (empty(htmlspecialchars(strip_tags(trim($email)))) && $obligatorio == 0) {
            $mensajeError = null;
        }
        return $mensajeError;
    }
// Función para comprobar si es una url
// Return null es correcto, si no muestra el mensaje de error
// Si es un 1 es obligatorio, si es un 0 no lo es
    /**
     * @function validarURL();
     *
     * @param $url Cadena a comprobar.
     * @param $obligatorio Valor booleano indicado mediante 1, si es obligatorio o 0 si no lo es.
     * @return null|string Devuelve null si es correcto o un mensaje de error en caso de que lo haya.
     */
    public static function validarURL($url, $obligatorio){
        $mensajeError = null;
        if (filter_var($url, FILTER_VALIDATE_URL) && comprobarNoVacio($url)) {
            $mensajeError = null;
        } else {
            $mensajeError = "Error ";
        }
        if (!filter_var($url, FILTER_VALIDATE_URL)) {
            $mensajeError .= " formato incorrecto de url";
        }
        if (!self::comprobarNoVacio($url)) {
            $mensajeError .= " campo Vacio";
        }
        if (empty(htmlspecialchars(strip_tags(trim($url)))) && $obligatorio == 0) {
            $mensajeError = null;
        }
        return $mensajeError;
    }
    /**
     * @function validarFecha();
     *
     * @param $fecha Cadena a comprobar.
     * @param $obligatorio Valor booleano indicado mediante 1, si es obligatorio o 0 si no lo es.
     * @return null|string Devuelve null si es correcto o un mensaje de error en caso de que lo haya.
     */
    public static function validarFecha($fecha, $obligatorio){
        $mensajeError = null;
        $fechaMinima = "1900-01-01";
        $fechaMaxima = "2999-12-12";
        if (self::validateDate($fecha) && self::comprobarNoVacio($fecha) && ($fecha > $fechaMinima) && ($fecha < $fechaMaxima)) {
            $mensajeError = null;
        } else {
            $mensajeError = "Por favor introduzca una fecha entre " . $fechaMinima . " y " . $fechaMaxima;
        }
        if (!self::validateDate($fecha, 'Y-m-d')) {
            $mensajeError = " formato incorrecto de fecha (Año-Mes-dia) (2000-01-01)";
        }
        if ($fecha < $fechaMinima) {
            $mensajeError = " la fecha tiene que ser superior a $fechaMinima";
        }
        if ($fecha > $fechaMaxima) {
            $mensajeError = " la fecha tiene que ser inferior a $fechaMaxima";
        }
        if (empty(htmlspecialchars(strip_tags(trim($fecha)))) && $obligatorio == 0) {
            $mensajeError = null;
        }
        return $mensajeError;
    }
    /**
     * @function validarDni();
     *
     * @param $dni cadena a comprobar.
     * @param $obligatorio Valor booleano indicado mediante 1, si es obligatorio o 0 si no lo es.
     * @return null|string Devuelve null si es correcto o un mensaje de error en caso de que lo haya.
     */
    public static function validarDni($dni, $obligatorio){
        $mensajeError=null;
        $letra=substr($dni, -1);
	$numeros=substr($dni, 0, -1);
            if(substr("TRWAGMYFPDXBNJZSQVHLCKE", $numeros%23, 1)==$letra && strlen($letra)==1 && (strlen($numeros)==8 || strlen($numeros)==9)){
		$mensajeError=" el DNI no es válido";
            }
        return $mensajeError;
    }
// Función para validar si no esta vacio
// Return false esta vacio, true no esta vacio
    /**
     * @function comprobarNoVacio();
     *
     * @param $cadena Cadena a comprobar que no está vacía.
     * @return bool Devuelve null si es correcto y si no un mensaje de error.
     */
    public static function comprobarNoVacio($cadena){
        $mensajeError = false;
        $cadena = htmlspecialchars(strip_tags(trim($cadena)));
        if (!empty($cadena)) {
            $mensajeError = true;
        }
        return $mensajeError;
    }
// Función para tamaño maximo
// Si tamaño es 0 significa que no tiene limite
// Return false no es correcto, true es correcta
    /**
     * @function comprobarMaxTamanio();
     *
     * @param $cadena Cadena para comprobar
     * @param $tamanio Longitud de la cadena
     * @return bool Devuelve null si es correcto y si no un mensaje de error.
     */
    public static function comprobarMaxTamanio($cadena, $tamanio){
        $mensajeError = false;
        if ((strlen($cadena)) <= $tamanio || $tamanio == 0) {
            $mensajeError = true;
        }
        return $mensajeError;
    }
// Función para tamaño minimo
// Si el tamaño es 0 significa que no tiene limite
// Return false no es correcto, true es correcta
    /**
     * @function comprobarMinTamanio();
     *
     * @param $cadena Cadena para comprobar
     * @param $tamanio Longitud de la cadena
     * @return bool Devuelve null si es correcto y si no un mensaje de error.
     */
    public static function comprobarMinTamanio($cadena, $tamanio){
        $mensajeError = false;
        if (strlen($cadena) >= $tamanio || $tamanio == 0) {
            $mensajeError = true;
        }
        return $mensajeError;
    }
// Función para validar la fecha
// Recibe una fecha y un formato el por defecto es año-mes-dia
// Devuelve True si es una fecha valida y un false si no la es
    /**
     * @function validateFecha();
     *
     * @param $date Fecha a comprobar
     * @param string $format formato de la cadena
     * @return bool Devuelve null si es correcto, y si no devuelve un error
     */
    public static function validateDate($date, $format = 'Y-m-d'){
        $d = DateTime::createFromFormat($format, $date);
        return $d && $d->format($format) == $date;
    }
    //Autor: Rodrigo
//Fecha: 24/11/2017
//Función para comprobar codigo de departamentos, solo se pueden meter letras de la a a la z minuscula
//y la A y Z mayusculas.
    /**
     * @function comprobarCodigo();
     *
     * @param $cadena Cadena que se va a comprobar.
     * @param $maxTamanio Tamaño máximo de la cádena.
     * @param $minTamanio Tamaño mínimo de la cadena.
     * @param $obligatorio Valor booleano indicado mediante 1, si es obligatorio o 0 si no lo es.
     * @return null|string Devuelve null en el caso en el que esté correcto, si no devuelve una cadena con el mensaje de error.
     */
    public static function comprobarCodigo($cadena,$maxTamanio,$minTamanio,$obligatorio){
        // Patrón para campos de solo texto
        $patron_texto = "/^[a-zA-Z]+$/";
        $cadena=htmlspecialchars(strip_tags(trim((string)$cadena)));
        $mensajeError=null;
        if( preg_match($patron_texto, $cadena) && self::comprobarNoVacio((string)$cadena) && self::comprobarMaxTamanio((string)$cadena,$maxTamanio)
            && self::comprobarMinTamanio((string)$cadena,$minTamanio) )
        {
            $mensajeError = null;
        }else{
            $mensajeError="Error ";
        }
        if(!preg_match($patron_texto, $cadena)){
            $mensajeError.=" Solo pueden ser letras";
        }
        if (comprobarNoVacio((string)$cadena)==false){
            $mensajeError.= " campo Vacio";
        }
        if (comprobarMaxTamanio((string)$cadena,$maxTamanio)==false){
            $mensajeError .=" El tamaño maximo es ".$maxTamanio ;
        }
        if (comprobarMinTamanio((string)$cadena,$minTamanio)==false){
            $mensajeError.=" El tamaño minimo es ".$minTamanio;
        }
        if (empty($cadena) && $obligatorio==0){
            $mensajeError=null;
        }
        return $mensajeError;
    }
    /**
     * @author Christian Muñiz de la Huerga
     * @function validarElementoEnLista();
     * @param $elementoElegido Elemento introducido que se va a comprobar.
     * @param $aOpciones Array con los posibles valores posibles con el que se va a comparar el elemento.
     * @param $obligatorio Valor booleano indicado mediante 1, si es obligatorio o 0 si no lo es.
     * @return null|string Devuelve null en el caso en el que esté correcto, sino devuelve una cadena con el mensaje de error.
     */
    public static function validarElementoEnLista($elementoElegido, $aOpciones, $obligatorio) {
        $mensajeError = null; //Inicializa el mensaje de error a null.
        foreach ($aOpciones as $opcion) { //Convierte cada elemento del array a minúsculas.
            $aOpciones[$opcion] = strtolower($opcion);
        }
        //Si el elemento, convertido a minúsculas, no se encuentra en el array y es obligatorio O no se encuentra en el array siendo opcional pero teniendo un valor incorrecto se le pasará el mensaje de error.
        if ((!in_array(strtolower($elementoElegido), $aOpciones) && $obligatorio == 1) || (!in_array(strtolower($elementoElegido), $aOpciones) && $obligatorio == 0 && $elementoElegido != null)) {
            $mensajeError = "El elemento no se encuentra entre los posibles valores";
        }
        return $mensajeError; //Devuelve el mensaje de error.
    }
    
    /** 
     * @function validaTelefono(); 
     * @author Tania Mateos 
     * @param $tel Telefono que se va a comprobar. 
     * @param $obligatorio Valor booleano indicado mediante 1, si es obligatorio o 0 si no lo es. 
     * @return Devuelve null en el caso en el que esté correcto, si no devuelve una cadena con el mensaje de error. 
     */ 
    public static function validaTelefono($tel, $obligatorio){ 
        $mensaje=null; 
        $patron="/^[9|6|7][0-9]{8}$/"; 
        if (!self::comprobarNoVacio($tel)) { 
            $mensaje .= "<span style='color:red'> Campo Vacío. </span>"; 
        } 
        if (!preg_match($patron, $tel)) { 
            $mensaje .= " <span style='color:red'> El telefono debe comenzar por 9,6 o 7 y a continuación 8 diígitos del 0 al 9</span>"; 
        } 
        if (empty(htmlspecialchars(strip_tags(trim($tel)))) && $obligatorio == 0) { 
            $mensaje = null; 
        } 
        return $mensaje;  
    } 
}
?>