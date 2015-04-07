<?php

require_once("Constants.php");

class AppController
{

    public function database(){
        $pdo = new PDO('mysql:host='.$_REQUEST['conf']['dbConf']['hostName'].';dbname='.$_REQUEST['conf']['dbConf']['databaseName'],
            $_REQUEST['conf']['dbConf']['userName'], $_REQUEST['conf']['dbConf']['password']);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    }

    public function  responseSuccess(){
            return array(
                RESPONSE_TYPE=>SUCCESS,

            );
    }

    public function responseError(){
        return array(
            RESPONSE_TYPE=>ERROR
        );
    }

}