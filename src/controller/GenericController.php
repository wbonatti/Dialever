<?php

/**
 * Created by PhpStorm.
 * User: wbonatti
 * Date: 03/08/17
 * Time: 21:30
 */
class GenericController
{
    /**
     * @var app
     */
    protected $app;

    /**
     * Conexao constructor.
     * @param Conexao $con
     */
    public function __construct($app)
    {
        $this->app = $app;
    }

    public function criaArray(GenericModel $objeto, $itens){

        if(empty($itens)){
            return ;
        }

        if(empty($itens[1])){
            return $objeto->convertArray($itens);
        }

        $array = array();

        foreach($itens as $object){
            array_push($array,$objeto->convertArray($object));
        }

        return $array;

    }

    public function criaArrayMensagem($objetos){
        $array = array([
            "key" => 'OK',
            "message" => $objetos
        ]);

        return $array[0];
    }

    public function criaArrayErro($objetos){
        $array = array([
            "key" => 'NOK',
            "message" => $objetos
        ]);

        return $array[0];
    }

    public function isLoggedIn($app){
        $usuario  = unserialize($_SESSION["user"]);

        if (empty($usuario)) {
            $app->logger->info("Usuario nao logado");
            throw new Exception('Usuario nao logado');
        }

        $array = array([
            'login' => $usuario['login'],
            'name' => $usuario['name']
        ]);

        return $array[0];

    }

    public function mandatoryFields($app, $objeto){

        $array = array();

        $refClass = new ReflectionClass($objeto);

        foreach ($refClass->getProperties() as $refProperty) {

            $app->logger->info("Campos obrigatorios Atributo = " . $refProperty->getName());

            $a = $refProperty->getDocComment();

            $app->logger->info("Campos obrigatorios Atributo - DOC = " . $a);

            if (strpos($a, '@mandatory')){

                $app->logger->info("Entrou no mandatory = ");

                $refProperty->setAccessible(true);

                $app->logger->info("Campos obrigatorios Atributo eh obrigatorio = " . $refProperty->getValue($objeto));

                if(empty($refProperty->getValue($objeto))){

                    //define the regular expression pattern to use for string matching
                    $pattern = "#(@name+\s*[a-zA-Z0-9, ()_].*)#";

                    //perform the regular expression on the string provided
                    preg_match_all($pattern, $a, $matches, PREG_PATTERN_ORDER);

                    array_push($array, substr($matches[0], 5));
                }
            }
        }

        $app->logger->info("Total de Campos obrigatorios array = " . sizeof($array));

        return $array;

    }

    function tirarAcentos($string){
        return preg_replace(
            array(
                "/(á|à|ã|â|ä)/",
                "/(Á|À|Ã|Â|Ä)/",
                "/(é|è|ê|ë)/",
                "/(É|È|Ê|Ë)/",
                "/(í|ì|î|ï)/",
                "/(Í|Ì|Î|Ï)/",
                "/(ó|ò|õ|ô|ö)/",
                "/(Ó|Ò|Õ|Ô|Ö)/",
                "/(ú|ù|û|ü)/",
                "/(Ú|Ù|Û|Ü)/",
                "/(ñ)/",
                "/(Ñ)/"
            ),
            explode(" ","a A e E i I o O u U n N"),
            $string);
    }

}