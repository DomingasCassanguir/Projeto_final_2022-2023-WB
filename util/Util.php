<?php
namespace util;

use PDO;

class Util {


    static function getElemento($tabela, $campo, $id, $conexao){

        $qry = $conexao->prepare("SELECT $campo FROM $tabela WHERE id = ". $id);
        $qry->execute();
        $res = $qry->fetchAll(PDO::FETCH_ASSOC);

        if (empty($res[0])) {
            return "";
        }
        return $res[0]["$campo"];
    }

    
    static function find($tabela, $id, $conexao){

        $qry = $conexao->prepare("SELECT * FROM $tabela WHERE id = ". $id);
        $qry->execute();
        $res = $qry->fetchAll(PDO::FETCH_ASSOC);

        if (empty($res[0])) {
            return "";
        }
        return $res[0];
    }

}


?>