<?php

 require_once('config.php');

 class conexion
 {
  private $host;
  private $user;
  private $database;
  private $password;
  private $cadenaconexion;
 
  function __construct()
  {
   try
   {
    $this->host = DB_HOST;
    $this->user = DB_USER;
    $this->database = DB_DATABASE;
    $this->password = DB_PASSWORD;    	
    
    $this->cadenaconexion = mysqli_connect($this->host, $this->user, $this->password) or die("Error al conectar con la base de datos.");        

    mysqli_select_db($this->cadenaconexion, $this->database) or die("No se ha encontrado la base de datos.");

    mysqli_set_charset($this->cadenaconexion, "utf8");
   } 
   catch(Exception $e)
   {
   	throw $e;
   }

  }

  function consultarsencillo($sql)
  {

   $res = mysqli_query($this->cadenaconexion, $sql);
   
   return $res;
  }  

  function consultar($sql)
  {

   $res = mysqli_query($this->cadenaconexion, $sql);
   
   $data = null;

   while ($fila = mysqli_fetch_assoc($res)) {
   	$data[] = $fila;
   }
   return $data;
  }

  function insertar($sql)
  {
   $res = mysqli_query($this->cadenaconexion, $sql);
    
   if(mysqli_affected_rows($this->cadenaconexion)<=0)
    echo "<script>alert('No se ha completado el registro.');</script>";     
   else
    echo "<script>alert('El registro se realizo exitosamente.');</script>";
  }

  function modificar($sql)
  {   
   $res = mysqli_query($this->cadenaconexion, $sql);
    
   if(mysqli_affected_rows($this->cadenaconexion)<=0)
    echo "<script>alert('No se ha completado la modificacion.');</script>";        
   else
    echo "<script>alert('La modificacion se realizo con exito.');</script>";      
  }

  function eliminar($sql)
  {   
   $res = mysqli_query($this->cadenaconexion, $sql);
    
   if(mysqli_affected_rows($this->cadenaconexion)<=0)
    echo "<script>alert('No se ha realizado la eliminacion.');</script>";     
   else
    echo "<script>alert('El registro se elimino exitosamente.');</script>";
  }     

 }
 
?>