<?php

class Workers
{
    function __construct($db){
        $this->db = $db;
    }

    public function addWorker($email, $fullName, $age, $experience, $avgSalary, $photo){
        $photoName = md5(md5($photo['name'] . rand(0, 1000)) . rand(0, 1000));
        if(filter_var($email, FILTER_VALIDATE_EMAIL)){
            move_uploaded_file($photo['tmp_name'], '../images/' . $photoName . '.png');
            $photoName = $this->db->siteLink . "/images/$photoName.png";
            return $this->db->addWorker($email, $fullName, $age, $experience, $avgSalary, $photoName);
        }
    }
}