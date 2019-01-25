<?php
use App\Model\Llibre;

$app->group('/llibre/', function () {

    $this->get('', function ($req, $res, $args) {
        $obj = new Llibre();   
        return $res
           ->withHeader('Content-type', 'application/json')
           ->getBody()
           ->write(
            json_encode(
                $obj->mostrarTodos()
            )
        );
    });
    
    $this->get('{id}', function ($req, $res, $args) {
        $obj = new Llibre();   
        return $res
           ->withHeader('Content-type', 'application/json')
           ->getBody()
           ->write(
            json_encode(
                $obj->llegirLlibrePK($args["id"])
            )
        );         
    });
           
    $this->post('', function ($req, $res, $args) {
            $atributs=$req->getParsedBody();  //llista atributs del client
            $obj = new Llibre();
            return $res
               ->withHeader('Content-type', 'application/json')
               ->getBody()
               ->write(
                json_encode(
                    $obj->altaLlibre($atributs)
                )
            );             
    });

    $this->put('{id}', function ($req, $res, $args) {
        $atributs=$req->getParsedBody();  //llista atributs del client
        $atributs["id"]=$args["id"];     // Afegim id a la llista d'atributs
        $obj = new Llibre();
        return $res
           ->withHeader('Content-type', 'application/json')
           ->getBody()
           ->write(
            json_encode(
                $obj->update($atributs)
            )
        ); 
    });  
    
    $this->delete('{id}', function ($req, $res, $args) {
        $obj = new Llibre();   
        return $res
           ->withHeader('Content-type', 'application/json')
           ->getBody()
           ->write(
            json_encode(
                $obj->delete($args["id"])
            )
        ); 
    });

    $this->post('{idLlib}/autors/{idAut}', function ($req, $res, $args) {
        $atributs=$req->getParsedBody();  //llista atributs del client
        $obj = new Llibre();
        return $res
           ->withHeader('Content-type', 'application/json')
           ->getBody()
           ->write(
            json_encode(
                $obj->autorLlibre($args["idAut"], $args["idLlib"])
            )
        );             
    });

    $this->delete('{idLlib}/autors/{idAut}', function ($req, $res, $args) {
        $atributs=$req->getParsedBody();  //llista atributs del client
        $obj = new Llibre();
        return $res
           ->withHeader('Content-type', 'application/json')
           ->getBody()
           ->write(
            json_encode(
                $obj->baixaAutorLlibre($args["idAut"], $args["idLlib"])
            )
        );             
    });

    $this->get('{idLlib}/autors/', function ($req, $res, $args) {
        $atributs=$req->getParsedBody();  //llista atributs del client
        $obj = new Llibre();
        return $res
           ->withHeader('Content-type', 'application/json')
           ->getBody()
           ->write(
            json_encode(
                $obj->llegirAutorsLlibre($args["idLlib"])
            )
        );             
    });
        
});
