<?php
class DB 
{
    function __construct()
    {
        $host = 'localhost';
        $port = '3306';
        $name = 'testwork';
        $user = 'root';
        $pass = '';
        $this->siteLink = 'http://testwork';
        try {
            $this->db = new PDO(
                'mysql:' .
                'host=' . $host . ';' .
                'port=' . $port . ';' .
                'dbname=' . $name,
                $user,
                $pass
                );
        }
        catch (Exception $e) {
            print_r($e->getMessage());
            die();
        }
    }

    public function addWorker($email, $fullName, $age, $experience, $avgSalary, $photoName){
        $imageVariable = ($photoName == '') ? '' : "$this->siteLink/images/$photoName";
        $query = "INSERT INTO `workers`
        (email, fullName, age, experience, avgSalary, photo)
        VALUES ('$email', '$fullName', $age, $experience, $avgSalary, '$imageVariable')";
        $result = $this->db->query($query);
        if($result){
            return true;
        }
    }

    public function getWorkers(){
        $query = "SELECT * FROM `workers`";
        return $this->db->query($query)
            ->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getWorker($id){
        $query = "SELECT * FROM `workers`
        WHERE id= '$id'";
        return $this->db->query($query)
            ->fetchObject();
    }
}