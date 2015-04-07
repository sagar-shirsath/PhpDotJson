<?php


class Rout
{
    public function getTheFile($command){
            $files = simplexml_load_file("./actions.xml");

            if($files->$command){
                return array('file'=>(string)$files->$command->file,'class'=>(string)$files->$command->class,
                    'dir'=>(string)$files->$command->dir
                );
            }else{
                return false;
            }
    }
}


//$rout = new Rout();
//echo $rout->getTheFile('register');