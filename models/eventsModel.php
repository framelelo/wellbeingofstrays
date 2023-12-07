<?php

function updateEvents($id, $id_user, $title, $picture,$link,$description)
{
    global $pdo;

    try {
        $query = $pdo->prepare("UPDATE events SET id_member = :i, title = :t,picture = :p, link = :l, description = :d, date = :c WHERE id = :id");

        $query->execute([
            "i" => $id_user,
            "t" => $title,
            "p" => $picture,
            "l" => $link,
            "d" => $description,
            "c" => date("Y-m-d H:i:s"),
            "id" => $id
        ]);

        return true;
    } catch (PDOException $e) {
        echo 'Error: ' . $e->getMessage();
        return false;
    }
}

function newEvents($id_user, $title, $picture, $link, $description)
{
    global $pdo;

    try {
        $query = $pdo->prepare("INSERT INTO events(id_member, title, picture, link, description, date) VALUES (:i, :t, :p, :l, :d, :c)");

        $query->execute([
            "i" => $id_user,
            "t" => $title,
            "p" => $picture,
            "l" => $link,
            "d" => $description,
            "c" => date("Y-m-d H:i:s")
        ]);

        return true;
    } catch (PDOException $e) {
        error_log('Error inserting new event: ' . $e->getMessage());  // Log error to PHP error log
        return false;
    }
}



function showEvents()
{
    global $pdo;
    try {
        $query = $pdo->prepare("SELECT * FROM events ORDER BY date DESC");
        $query->execute([]);
    
        $allEvents = $query->fetchAll();
        return $allEvents;    
    }
    catch (PDOEXCEPTION $e) {
        return false;
    }
}

function showEvent($id)
{
    global $pdo;
    try {
        $query = $pdo->prepare("SELECT * FROM events WHERE id = :i");
        $query->execute([ "i" => $id,]);
           return  $query->fetch();     
          
    }
    catch (PDOEXCEPTION $e) {
        return false;
    }
}

function removeEvents($id)
{
    global $pdo;
    try {
        $query = $pdo->prepare("DELETE FROM events WHERE id = :i");
        $query->execute([
            "i" => $id,
        ]);
    
        return true;  
    }
    catch(PDOException $e){
        return false;
    }
}

?>