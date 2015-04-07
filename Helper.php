<?php



class Helper
{

    public static function validateInputParams($data){

        $conf = new Config();
        if(!empty($data['command'])){

            $params = json_decode($data['command'],true);
            if($conf->isLive){

                if(empty($params['unique_id'])){

                    return false;
                }
            }
         $_REQUEST['command']=$params;
         return true;

        }else{
            return false;
        }
    }
}