<?php



namespace util;


class Validacao{

    //Validação de tamanho min e max além de eliminar 
    //caracteres especiais
    public function validaCampoString($campo, $min, $max){
        //teste de tamanho válido
        //descobrir a qtde de caracteres do campo -- strlen
        //comparar com min e max 
        if(strlen($campo) >= $min && strlen($campo) <= $max  ){
                //tamanho válido  
                //filter_var() --> Validar ou sanitizar
                return filter_var($campo,FILTER_SANITIZE_STRING);
        }else{
            //tamanho inválido
            return false;
        }
    }




}