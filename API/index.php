<?php
header('Access-Control-Allow-Origin: *');
header("Content-type: application/json; charset=utf-8");

error_reporting(-1);
require_once('application/Application.php');

function router($params){
    $method = $params['method'];
    if($method){
        $app = new Application();
        switch($method){
            case 'addWorker': return $app->addWorker($params);
            case 'getWorkers': return $app->getWorkers(); 
            case 'getWorker': return $app->getWorker($params); 
        }
        return false;
    }
}

function answer($data){
    if($data){
        return array(
            'result' => 'ok',
            'data' => $data
        );
    } else {
        return array('result' => 'error');
    }
}

echo json_encode(answer(router(array_merge($_GET,$_POST))));

