<?php
require_once("AppController.php");

class Register extends AppController
{
    public function execute()
    {

        try {
            $db = $this->database();
            $mobile_no = $_REQUEST['command']['mobile_number'];
            $name = $_REQUEST['command']['name'];
            $gender = $_REQUEST['command']['gender'];
            $occupation = $_REQUEST['command']['occupation'];
            $verification_code = rand(99999,100000);
            $access_token = md5(uniqid(rand(), true)).'-'.md5(uniqid(rand(), true));

            $response = $this->responseSuccess();


            $rs = $db->query("select id from users where  mobile_number='".$mobile_no."'")->fetchAll();

            if(sizeof($rs)>=1){
                $response[RESPONSE_MESSAGE] = "user with mobile number already exists ";
                $response[RESPONSE_DATA] = $mobile_no;
                $response[RESPONSE_TYPE]= ERROR;
                $response[ERROR_CODE] = ERROR_ALREADY_EXISTS;
                return $response;
            }
            $stmt = $db->prepare('insert into users (name,mobile_number,verification_code,access_token,occupation,gender) values (:name,:mobile_number,:verification_code,:access_token,:occupation,:gender)');
            $result = $stmt->execute(array(
                'name'=>$name,
                ':mobile_number' => $mobile_no,
                ':occupation' => $occupation,
                ':gender' => $gender,
                ':verification_code'=>$verification_code,
                'access_token' => $access_token));

            $data['access_token']=$access_token;
            $data['name']=$name;
            $data['mobile_no']=$mobile_no;
            $data['occupation']=$occupation;
            $data['result']= $result;

            $response[RESPONSE_MESSAGE] = "New user has been created with phone number " . $mobile_no;
            $response[RESPONSE_DATA] = $data;
        } catch (Exception $e) {
            $response[DB_ERROR] = $e->getMessage();
        }
        return $response;

    }

}