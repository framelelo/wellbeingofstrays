<?php

/** CREATE NEW ADOPTIONS CARDS
 * @var $pdo
 * 
 * @param int $id, string $name, string $specie, string $picture, string $gender, string $description
 * 
 * @return bool
 * 
 * @throws PDOException
*/

function newAdoptions(int $id, string $name, string $specie, string $picture, string $gender, string $description)
{

    global $pdo;

    try {
        $query = $pdo->prepare("INSERT INTO adoptions(id_member,name,specie,picture,gender,description,date) VALUES (:i,:n,:s,:p,:g,:d,:c)");

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
    } catch (PDOException $e) {
        return false;
    }
}

function updateAdoptions($id, $id_user, $name, $specie, $picture, $gender, $description)
{
    global $pdo;

    try {
        $query = $pdo->prepare("UPDATE adoptions SET id_member = :u, name = :n, specie = :s, picture = :p, gender = :g, description = :d, date = :c WHERE id = :i");

        $query->execute([
            "i" => $id,
            "u" => $id_user,
            "n" => $name,
            "s" => $specie,
            "p" => $picture,
            "g" => $gender,
            "d" => $description,
            "c" => date("Y-m-d H:i:s")
        ]);

        return true;
    } catch (PDOException $e) {
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
    } catch (PDOException $e) {
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
    } catch (PDOException $e) {
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
    } catch (PDOEXCEPTION $e) {
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
    } catch (PDOException $e) {
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
    } catch (PDOException $e) {
        return false;
    }
}
