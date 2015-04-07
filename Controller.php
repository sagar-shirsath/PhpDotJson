<?php
/**
 * Created by JetBrains PhpStorm.
 * User: sagar
 * Date: 30/11/14
 * Time: 1:25 PM
 * To change this template use File | Settings | File Templates.
 */
function __autoload($class_name)
{
    include_once $class_name . '.php';
}

class Controller
{

    private $helper;


    public function init()
    {

        $helper = new Helper();
        if (!$helper->validateInputParams($_REQUEST)) {
            $params['data'] = "";
            $params['error_message'] = "wrong data";
            $params['error_code'] = "001";

            $this->response($params);
        }

    }

    public function loadConfiguration()
    {

        $conf = new Config();

        if ($conf->isLive) {
            ini_set('display_errors',0);

            $_REQUEST['conf'] = $conf->liveConf();

        } else {
            error_reporting(E_ALL);
            ini_set('display_errors', 1);

            $_REQUEST['conf'] = $conf->localConf();

        }
    }

    public function loadRespectiveFile()
    {
        $rout = new Rout();
        $filePath = $rout->getTheFile($_REQUEST['command']['command']);
         if ($filePath) {
            $className = $filePath['dir']."/".$filePath['class'];
              include_once $className.".php";
              $class = new $filePath['class']();
            $response = $class->execute();

        }else{
            $response = array('error_message'=>"command not found",'error_code'=>2);
         }
        $this->response($response);

    }


    public function response($params)
    {
        echo json_encode($params,true);
        exit;
    }


}


$controller = new Controller();
$controller->init();

$controller->loadConfiguration();
$controller->loadRespectiveFile();
