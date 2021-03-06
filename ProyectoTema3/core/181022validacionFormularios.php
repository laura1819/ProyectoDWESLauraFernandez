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
 * @since Versión 1.1 Se han formateado los mensajes de error y modificado validarDni()
 * @since Version 1.2 Se han acabado de formatear los mensajes de error, se han modificado validarURL() y se han añadido validarCp(), validarPassword(), validarRadioB() y validarCheckBox()
 * @copyright 21-10-2018
 */
class validacionFormularios{
    /**
     * @function comprobarAlfabetico();
     * @param $cadena Cadena que se va a comprobar.
     * @param $maxTamanio Tamaño máximo de la cádena.
     * @param $minTamanio Tamaño mínimo de la cadena.
     * @param $obligatorio Valor booleano indicado mediante 1, si es obligatorio o 0 si no lo es.
     * @return null|string Devuelve null en el caso en el que esté correcto, si no devuelve una cadena con el mensaje de error.
     */

    //La librería contiene los siguientes métodos: comprobarAlfabetico(), comprobarAlfanumerico(), comprobarEntero(), 
    //comprobarFloat(), validarEmail(), validarURL(), validarFecha(), validarDni(), comprobarNoVacio(), comprobarMaxTamanio()
    //comprobarMinTamanio(), validateDate(), comprobarCodigo(), validarElementoEnLista(), validarTelefono().
    
    public static function comprobarAlfabetico($cadena, $maxTamanio, $minTamanio, $obligatorio){
        // Patrón para campos de solo texto
        $patron_texto = "/^[a-zA-ZáéíóúÁÉÍÓÚäëïöüÄËÏÖÜàèìòùÀÈÌÒÙñÑ\s]+$/";
        $cadena = htmlspecialchars(strip_tags(trim((string)$cadena)));
        $mensajeError = null;
        if (preg_match($patron_texto, $cadena) && self::comprobarNoVacio((string)$cadena) && self::comprobarMaxTamanio((string)$cadena, $maxTamanio)
            && self::comprobarMinTamanio((string)$cadena, $minTamanio)) {
            $mensajeError = null;
        } else {
            $mensajeError = " No has introducido un valor correcto. ";
        }
        if (!preg_match($patron_texto, $cadena)) {
            $mensajeError .= "Solo se admiten letras. ";
        }
        if (self::comprobarNoVacio((string)$cadena) == false) {
            $mensajeError .= " Campo vacío. ";
        }
        if (self::comprobarMaxTamanio((string)$cadena, $maxTamanio) == false) {
            $mensajeError .= " El tamaño maximo es " . $maxTamanio.". " ;
        }
        if (self::comprobarMinTamanio((string)$cadena, $minTamanio) == false) {
            $mensajeError .= " El tamaño minimo es " . $minTamanio.". " ;
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
            $mensajeError = " Error, ";
        }
        if (self::comprobarNoVacio((string)$cadena) == false) {
            $mensajeError .= "campo vacío.";
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
     * @param $integer Número entero a comprobar
     * @param $obligatorio Valor booleano indicado mediante 1, si es obligatorio o 0 si no lo es.
     * @return null|string Devuelve null en el caso en el que esté correcto, si no devuelve una cadena con el mensaje de error.
     */
    public static function comprobarEntero($integer, $obligatorio){
        $mensajeError = null;
        if (filter_var($integer, FILTER_VALIDATE_INT) && self::comprobarNoVacio($integer)) {
            $correcto = null;
        } else {
            $mensajeError = " Error, ";
        }
        if (!filter_var($integer, FILTER_VALIDATE_INT)) {
            $mensajeError .= "no es un entero.";
        }
        if (!self::comprobarNoVacio($integer)) {
            $mensajeError .= " Campo vacío";
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
     * @param $float Número entero a comprobar
     * @param $obligatorio Valor booleano indicado mediante 1, si es obligatorio o 0 si no lo es.
     * @return null|string Devuelve null en el caso en el que esté correcto, si no devuelve una cadena con el mensaje de error.
     */
    public static function comprobarFloat($float, $obligatorio){
        $mensajeError = null;
        if (filter_var($float, FILTER_VALIDATE_FLOAT) && self::comprobarNoVacio($float)) {
            $mensajeError = null;
        } else {
            $mensajeError = " Error, ";
        }
        if (!filter_var($float, FILTER_VALIDATE_FLOAT)) {
            $mensajeError .= " float no valido.";
        }
        if (!self::comprobarNoVacio($float)) {
            $mensajeError .= " Campo vacío";
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
            $mensajeError = " Campo vacío";
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
// Función para comprobar si es una url, local o no
// Devuelve null si es correcto, sino muestra el mensaje de error
// Si el parámetro $obligatorio es un 1 es obligatorio, si es un 0 es opcional
    /**
     * @function validarURL();
     * @author Christian Muñiz de la Huerga y Mario Casquero Jáñez
     * @param $url Cadena a comprobar.
     * @param $obligatorio Valor booleano indicado mediante 1, si es obligatorio o 0 si no lo es.
     * @return null|string Devuelve null si es correcto o un mensaje de error en caso de que lo haya.
     */
    public static function validarURL($url, $obligatorio){
        $mensajeError = null;
        
        if (!filter_var($url, FILTER_VALIDATE_URL)){
            $mensajeError = " Formato incorrecto de URL";
        }        
        
        if($obligatorio==0 && empty($url)){
            $mensajeError=null;
        }        
                
        return $mensajeError;
    }
    /**
     * @function validarFecha();
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
            $mensajeError = "Por favor introduzca una fecha entre ".$fechaMinima." y ".$fechaMaxima.".";
        }
        if (!self::validateDate($fecha, 'Y-m-d')) {
            $mensajeError = " Formato incorrecto de fecha (Año-Mes-dia) (2000-01-01).";
        }
        if ($fecha < $fechaMinima) {
            $mensajeError = " La fecha tiene que ser superior a $fechaMinima";
        }
        if ($fecha > $fechaMaxima) {
            $mensajeError = " La fecha tiene que ser inferior a $fechaMaxima";
        }
        if (empty(htmlspecialchars(strip_tags(trim($fecha)))) && $obligatorio == 0) {
            $mensajeError = null;
        }
        return $mensajeError;
    }
// Valida el DNI, si es opcional da por válido que sea correcto o este vacío, si es obligatorio solo da por válido que esté correcto
    /**
     * @function validarDni();
     * @author Mario Casquero Jañez
     * @param $dni cadena a comprobar.
     * @param $obligatorio Valor booleano indicado mediante 1, si es obligatorio o 0 si no lo es.
     * @return null|string Devuelve null si es correcto o un mensaje de error en caso de que lo haya.
     */
    public static function validarDni($dni, $obligatorio){
        $mensajeError=null;
        $letra = substr($dni, -1);
	$numeros = substr($dni, 0, -1);
	
        if (!(substr("TRWAGMYFPDXBNJZSQVHLCKE", $numeros%23, 1) == $letra && strlen($letra) == 1 && strlen ($numeros) == 8)){
            $mensajeError=" El DNI no es válido";
	}
        
        if($obligatorio==0 && empty($dni)){           
            $mensajeError=null;                        
        }
        return $mensajeError;
    }
// Valida el código postal, si es opcional da por válido que sea correcto o este vacío, si es obligatorio solo da por válido que esté correcto
    /**
     * @function validarCp();
     * @author Mario Casquero Jañez
     * @param $cp cadena a comprobar.
     * @param $obligatorio Valor booleano indicado mediante 1, si es obligatorio o 0 si no lo es.
     * @return null|string Devuelve null si es correcto o un mensaje de error en caso de que lo haya.
     */
    public static function validarCp($cp, $obligatorio){
        $mensajeError=null;
        	
        if (strlen($cp)!=5){
            $mensajeError=" El código postal no es válido";
	}
        
        if($obligatorio==0 && empty($cp)){           
            $mensajeError=null;                        
        }
        return $mensajeError;
    }
    
// Valida el password, comprueba longitud y si al menos contiene una mayúscula y un número, si es opcional da por válido que sea correcto o este vacío, si es obligatorio solo da por válido que esté correcto
    /**
     * @function validarPassword();
     * @author Mario Casquero Jañez
     * @param $passwd cadena a comprobar.
     * @param $obligatorio valor booleano indicado mediante 1, si es obligatorio o 0 si no lo es.
     * @param $longitud valor que indica la longitud mínima de la contraseña
     * @return null|string Devuelve null si es correcto o un mensaje de error en caso de que lo haya.
     */
    public static function validarPassword($passwd, $obligatorio, $longitud){
        $mensajeError=null;
        	
        if (strlen($passwd)<$longitud){
            $mensajeError=" La contraseña debe ser del al menos 8 caracteres.";
	}
        if(!preg_match("`[A-Z]`",$passwd) || !preg_match("`[0-9]`", $passwd)){
            $mensajeError.=" La contraseña debe contener una mayúscula y un número";
        }
        
        if($obligatorio==0 && empty($passwd)){           
            $mensajeError=null;                        
        }
        return $mensajeError;
    }
    
// Valida el radio button, comprueba que tiene al menos un valor marcado, si es opcional da por válido que sea correcto o este vacío, si es obligatorio solo da por válido que esté correcto
    /**
     * @function validarRadioB();
     * @author Mario Casquero Jañez
     * @param $radioB nombre del radio button o grupo de radio buttons.
     * @param $obligatorio valor booleano indicado mediante 1, si es obligatorio o 0 si no lo es.
     * @return null|string Devuelve null si es correcto o un mensaje de error en caso de que lo haya.
     */
    public static function validarRadioB($radioB, $obligatorio){
        $mensajeError=null;        
        
        if(is_null($radioB)){
            $mensajeError=" Debe marcarse al menos un valor";
        }
        
        if($obligatorio==0){           
            $mensajeError=null;                        
        }
        return $mensajeError;
    }
    
// Valida el radio button, comprueba que tiene al menos un valor marcado, si es opcional da por válido que sea correcto o este vacío, si es obligatorio solo da por válido que esté correcto
    /**
     * @function validarCheckBox();
     * @author Mario Casquero Jañez
     * @param $checkB nombre del checkbox o grupo ellos.
     * @param $obligatorio valor booleano indicado mediante 1, si es obligatorio o 0 si no lo es.
     * @return null|string Devuelve null si es correcto o un mensaje de error en caso de que lo haya.
     */
    public static function validarCheckBox($checkB, $obligatorio){
        $mensajeError=null;        
        
        if(is_null($checkB)){
            $mensajeError=" Debe marcarse al menos un valor";
        }
        
        if($obligatorio==0){           
            $mensajeError=null;                        
        }
        return $mensajeError;
    }
// Función para validar si no esta vacio
// Return false esta vacio, true no esta vacio
    /**
     * @function comprobarNoVacio();
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
            $mensajeError.= " Campo vacío";
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
        $mensajeError=null; 
        $patron="/^[9|6|7][0-9]{8}$/";
    
        if(!preg_match($patron, $tel)) { 
            $mensajeError.= " El teléfono debe comenzar por 9,6 o 7 y a continuación 8 dígitos del 0 al 9"; 
        } 
        if(empty(htmlspecialchars(strip_tags(trim($tel)))) && $obligatorio==0) { 
            $mensajeError=null; 
        } 
        return $mensajeError;  
    } 
}
?>