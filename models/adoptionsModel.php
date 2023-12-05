<?php

function newAdoptions($id, $name,$specie, $picture, $gender, $description)
{

    global $pdo;

    try {
        $query = $pdo ->prepare("INSERT INTO adoptions(id_member,name,specie,picture,gender,description,date) VALUES (:i,:n,:s,:p,:g,:d,:c)");
    
        $query->execute([
            "i" => $id,
            "n" => $name,
            "s" => $specie,
            "p" => $picture,
            "g" => $gender,
            "d" => $description,
            "c" => date("Y-m-d H:i:s")
        ]);
        return true;
    }
    catch(PDOException $e){
        echo $e -> getMessage();
        return false;
    }
}
function showCatAdoptions()
{
    global $pdo;
    try {
        $query = $pdo->prepare("SELECT * FROM adoptions WHERE specie = 'cat' ORDER BY date DESC");
        $query->execute([]);
    
        $catAdoptions = $query->fetchAll();
        return $catAdoptions;    
    }
    catch(PDOException $e){
        echo $e -> getMessage();
        return false;
    }
}

function showDogAdoptions()
{
    global $pdo;
    try {
        $query = $pdo->prepare("SELECT * FROM adoptions WHERE specie = 'dog' ORDER BY date DESC");
        $query->execute([]);
    
        $datAdoptions = $query->fetchAll();
        return $datAdoptions;   
    }  
    catch(PDOException $e){
        echo $e -> getMessage();
        return false;
    }
}


function showAdoptions()
{
    global $pdo;
    try {
        $query = $pdo->prepare("SELECT * FROM adoptions ORDER BY date DESC");
        $query->execute([]);
    
        $allAdoptions = $query->fetchAll();
        return $allAdoptions;    
    }
    catch (PDOEXCEPTION $e) {
        return false;
    }
}

function showAdoption($id)
{
    global $pdo;
    try {
        $query = $pdo->prepare("SELECT * FROM adoptions WHERE id = :i");
        $query->execute([
            "i" => $id,
        ]);
    
        return $query->fetch();  
    }
    catch(PDOException $e){
        echo $e -> getMessage();
        return false;
    }
}

function removeAdoptions($id)
{
    global $pdo;
    try {
        $query = $pdo->prepare("DELETE FROM adoptions WHERE id = :i");
        $query->execute([
            "i" => $id,
        ]);
    
        return true;  
    }
    catch(PDOException $e){
        echo $e -> getMessage();
        return false;
    }
}

?>