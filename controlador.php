<?php

session_start();

$_SESSION['errMsg'] = 0;

require_once ('modelo/Database.php');

$controlador = $_REQUEST['gui'];

// logica del controlador
if(!isset($_REQUEST['c']))
{
  require_once("controladores/Controlador".ucwords($controlador).".php");
  $controlador = 'Controlador'.ucwords($controlador);
  $controlador = new $controlador;
  $controlador->index();
}

else
{ 
    // Obtenemos el controlador que queremos cargar
    $controlador  = $_REQUEST['c'];
    $accion       = isset($_REQUEST['a']) ? $_REQUEST['a'] : 'Index';

    // Instanciamos el controlador
    require_once("controladores/Controlador".ucwords($controlador).".php");
    $controlador = 'Controlador'.ucwords($controlador);
    $controlador = new $controlador;

    // Llama la accion

    call_user_func( array( $controlador, $accion ) );
}

//adaptado de http://facturacionweb.site/blog/crud-usando-php-pdo-poo-mvc/
