<?php

class Config
{
   public $isLive=0;

   public function  localConf(){

       return array(
           'dbConf'=>array(
               'hostName'=>'localhost',
               'databaseName'=>'dbname',
               'userName'=>'username',
               'password'=>'password',
               'port'=>'port'

           ),
           'appConf'=>array(

           )


       );
    }

    public function liveConf(){
        array(
            'dbConf'=>array(
                'hostName'=>'livehost',
                'user'=>'live user',
                'password'=>'live password',
                'port'=>'live port'

            ),
            'appConf'=>array(

            )

        );
    }
}


