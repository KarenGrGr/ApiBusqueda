<?php
require "vendor/autoload.php";
include 'utilidades.php';

//Recogo la url que ha hecho la petición y la divido en partes, me quedo con la que ocupa la posición 3
//que es el nombre de la comida que desea buscar

$url= $_SERVER['REQUEST_URI'];
$partesUrl = explode('/',$url);


$Headers = ['Accept' =>  'application/json'];
//verify=>false es necesario porque no tenemos certificado SSL
$baseServiceURL = ['base_uri' => 'https://api.punkapi.com','verify' => false]; 
$client = new GuzzleHttp\Client($baseServiceURL,array("request.options" => array( "headers" => $Headers )));


if ($_SERVER['REQUEST_METHOD'] == 'GET')
{
    if (isset($partesUrl[3]))
    {
        if ($partesUrl[3]!="") //si hayalgo la palabra busqueda/ en la uri
        {
            //si tiene espacios los convertimos para enviar toda la cadena como especifica la api
            $busqueda=str_replace("%20","_",$partesUrl[3]);
            $response = $client->get("/v2/beers?food=$busqueda");               
            $datos= $response->getBody();
        
            $datos= json_decode($datos,true);

                if($datos)
                {
                    foreach($datos as $elemento)
                    {
                        $detalles=array("image_url"=>$elemento['image_url'],"tagline"=>$elemento['tagline'],"first_brewed"=>$elemento['first_brewed']);
                        $receta=new RecetaDetallada($elemento['id'],$elemento['name'],$elemento['description'],$detalles);
                        $nuevo[]=$receta->convertirArray();
                    } 
                }
                else
                {
                    //mandamos un array vacío porque no obtiene respuesta
                    $nuevo=array();
                }
    
            header('Content-type: application/json; charset=utf-8' );
            header("HTTP/1.1 200 OK");
            echo json_encode($nuevo);
        }
        else
        { //si la cadena de busqueda está vacía también mandamos el array vacío
            devolverArrayVacio();
        }
    }
    else
    { //si la cadena de busqueda no existe también mandamos el array vacío
        devolverArrayVacio();
    }

}
else //si no va con la peticion get
{
    header("HTTP/1.1 405 Method Not ALlowed");
}
?>