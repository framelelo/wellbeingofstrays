<?php

/** CREATE NEW ADOPTION IN DATABASE
 * 
 * @param int $id
 * @param string $name
 * @param string $specie
 * @param string $picture
 * @param string $gender
 * @param string $description
 * @param string $contact
 * 
 * @return bool
 * 
 */

function newAdoptions(int $id, string $name, string $specie, string $picture, string $gender, string $description, string $contact): bool
{

    global $pdo;

    // Add a new adoption to the database
    try {
        $query = $pdo->prepare("INSERT INTO adoptions(id_member,name,specie,picture,gender,description, contact,date) VALUES (:i,:n,:s,:p,:g,:d,:c)");

        $query->execute([
            "i" => $id,
            "n" => $name,
            "s" => $specie,
            "p" => $picture,
            "g" => $gender,
            "d" => $description,
            "a" => $contact,
            "c" => date("Y-m-d H:i:s")
        ]);
        return true;
    } catch (PDOException $e) {
        return false;
    }
}

/** UPDATE ADOPTIONS IN DATABASE
 * 
 * @param int $id
 * @param int $id_user
 * @param string $name
 * @param string $specie
 * @param string $picture
 * @param string $gender
 * @param string $description
 * 
 * 
 * @return bool
 * */

function updateAdoptions(int $id, int $id_user, string $name, string $specie, string $picture, string $gender, string $description, string $contact): bool
{
    global $pdo;

    try {
        $query = $pdo->prepare("UPDATE adoptions SET id_member = :u, name = :n, specie = :s, picture = :p, gender = :g, description = :d, contact = :a,date = :c WHERE id = :i");

        $query->execute([
            "i" => $id,
            "u" => $id_user,
            "n" => $name,
            "s" => $specie,
            "p" => $picture,
            "g" => $gender,
            "d" => $description,
            "a" => $contact,
            "c" => date("Y-m-d H:i:s")
        ]);

        return true;
    } catch (PDOException $e) {
        return false;
    }
}

/**
 * SELECT ADOPTIONS WHERE SPECIE = CHAT
 * 
 */
function showCatAdoptions()
{
    global $pdo;
    // SELECT ADOPTIONS WHERE SPECIE = CHAT
    try {
        $query = $pdo->prepare("SELECT * FROM adoptions WHERE specie = 'chat' ORDER BY date DESC");
        $query->execute([]);

        $catAdoptions = $query->fetchAll();
        return $catAdoptions;
    } catch (PDOException $e) {
        return false;
    }
}

/**
 * SELECT ADOPTIONS WHERE SPECIE = CHIEN
 * 
 */
function showDogAdoptions()
{
    global $pdo;
    // SELECT ADOPTIONS WHERE SPECIE = CHIEN
    try {
        $query = $pdo->prepare("SELECT * FROM adoptions WHERE specie = 'chien' ORDER BY date DESC");
        $query->execute([]);

        $dogAdoptions = $query->fetchAll();
        return $dogAdoptions;
    } catch (PDOException $e) {
        return false;
    }
}

/**
 * SELECT ALL ADOPTIONS FROM DATABASE
 * 
 */
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

/**
 * SELECT ADOPTIONS BY ID  FROM DATABASE
 * 
 * @param int $id
 * 
 */
function showAdoption(int $id)
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

/**
 * DELETE ADOPTION BY ID FROM DATABASE
 * 
 * @param int $id
 * 
 * @return bool
 * 
 */
function removeAdoptions(int $id): bool
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
