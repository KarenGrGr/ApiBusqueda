<?php
class Receta {
    private $id;
    private $name;
    private $description;
 
    public function __construct($id,$name,$desc){
        $this->id=$id;
        $this->name=$name;
        $this->description=$desc;
    }
    public function convertirArray()
    {
        $receta=array("id"=>$this->id,"name"=>$this->name,"description"=>$this->description);
        return $receta;
    
    }
}
class RecetaDetallada {
    private $id;
    private $name;
    private $description;
    private $details;
 
    public function __construct($id,$name,$desc,$det){
        $this->id=$id;
        $this->name=$name;
        $this->description=$desc;
        $this->details=$det;
    }
    public function convertirArray()
    {
        $receta=array("id"=>$this->id,"name"=>$this->name,"description"=>$this->description,"details"=>$this->details);
        return $receta;
    
    }
}

//funcion para enviar las cabeceras y el JSON con un array vacío
function devolverArrayVacio(){
    header('Content-type: application/json; charset=utf-8' );
    header("HTTP/1.1 200 OK");
    echo json_encode(array());
}
?>