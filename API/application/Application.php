<?php
require_once('db/DB.php');
require_once('workers/Workers.php');
class Application
{
    function __construct(){
        $db = new DB();
        $this->db = $db;
        $this->workers = new Workers($db);
    }

    public function addWorker($params){
        $email = $params['email'];
        $fullName = $params['fullName'];
        $age = $params['age'];
        $experience = $params['experience'];
        $avgSalary = $params['avgSalary'];
        $photo = $_FILES['photo'];
        if($email && $fullName && $age && $experience && $avgSalary && $photo){
            return $this->workers->addWorker($email, $fullName, $age, $experience, $avgSalary, $photo);
        }
    }

    public function getWorkers(){
        return $this->db->getWorkers();
    }

    public function getWorker($params){
        $email = $params['email'];
        if($email){
            return $this->db->getWorker($email);
        }
    }
}