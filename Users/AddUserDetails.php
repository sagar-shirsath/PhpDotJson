<?php

require_once("AppController.php");

class AddUserDetails extends AppController
{
    public  function execute(){
        try {
            $db = $this->database();
            $id = "";
            if(!empty($_REQUEST['command']['mobile_number'])){

                $mobile_number = $_REQUEST['command']['mobile_number'];
                $id = $mobile_number;
                $where = ' where mobile_number="'.$mobile_number.'"';
            }else{
                $access_token = $_REQUEST['command']['access_token'];
                $id = $access_token;
                $where = ' where mobile_number="'.$access_token.'"';
            }
            unset($_REQUEST['command']['command']);
            unset($_REQUEST['command']['mobile_number']);
            $command = array_keys($_REQUEST['command']);
            $queryParams= implode( ',', $command );

            $params =  ':' . implode( ',:', $command );

            $paramsData = $this->dataCombine($_REQUEST['command']);
//    var_dump('update users set '.$paramsData[1].$where);die;
            $stmt = $db->prepare('update users set '.$paramsData[1].$where);

            $result = $stmt->execute($paramsData[0]);
            $response = $this->responseSuccess();
            $response[RESPONSE_MESSAGE] = "fileds are added " . $id;
            $response[RESPONSE_DATA] = $result;
        } catch (Exception $e) {
            $response[DB_ERROR] = $e->getMessage();
        }
        return $response;

    }

    private function dataCombine($command){
        $request = array();
        $params = "";
        foreach($command as  $key=>$req){
            $request[':'.$key] = $req;
            $params .=$key."=:".$key.",";
        }
        $params = substr($params,0,strlen($params) - 1);
        return array($request,$params);
    }

}
