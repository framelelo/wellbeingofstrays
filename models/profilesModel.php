<?php
/** 
 * 
 * UPDATE PROFILES IN DATABASE
 * 
 * @param int $id
 * @param string $firstName
 * @param string $lastName
 * @param int $tel
 * @param string $email
 * @param string $pwd
 * @param string $role
 * 
 * @return bool
 * */
function updateProfiles($id, $firstName, $lastName, $tel, $email, $pwd, $role): bool
{
    global $pdo;

    try {
        $query = $pdo->prepare("UPDATE members SET name = :n, last_name = :l, tel = :t, email = :e, pwd = :p, role = :r WHERE id = :id");

        $query->execute([
            "n" => $firstName,
            "l" => $lastName,
            "t" => $tel,
            "e" => $email,
            "p" => password_hash($pwd, PASSWORD_DEFAULT),
            "r" => $role,
            "id" => $id
        ]);

        return true;
    } catch (PDOException $e) {
        echo 'Error: ' . $e->getMessage();
        return false;
    }
}

/**
 * ADD A NEW PROFILE IN DATABASE
 * 
 * @param string $firstName
 * @param string $lastName
 * @param int $tel
 * @param string $email
 * @param string $pwd
 * @param string $role
 * 
 * @return bool
 */
function newProfile(string $firstName, string $lastName, int $tel, string $email, string $pwd, string $role): bool
{

    global $pdo;

    // Check if email already exists in database
    try {
        $checkQuery = $pdo->prepare("SELECT COUNT(*) FROM members WHERE email = :e");
        $checkQuery->execute(["e" => $email]);
        $emailExists = $checkQuery->fetchColumn();
        if ($emailExists) {
            return false;
        }
    } catch (PDOException $e) {
        echo $e->getMessage();
        return false;
    }

    // Insert new user into database
    try {
        $query = $pdo->prepare("INSERT INTO members(name,last_name,tel,email,pwd,role) VALUES (:n,:l,:t,:e,:p,:r)");

        $query->execute([
            "n" => $firstName,
            "l" => $lastName,
            "t" => $tel,
            "e" => $email,
            "p" =>  password_hash($pwd, PASSWORD_DEFAULT),
            "r" => $role
        ]);
        return true;
    } catch (PDOException $e) {
        echo $e->getMessage();
        return false;
    }
}

/**
 * SHOW ALL PROFILES
 */
function showAllProfiles()
{
    global $pdo;

    try {
        $query = $pdo->prepare("SELECT * FROM members");

        $query->execute([]);
        return $query->fetchAll();
    } catch (PDOEXCEPTION $e) {
        echo $e->getMessage();
        return false;
    }
}

/**
 * SHOW PROFILE BY ID
 * 
 * @param int $id
 * 
 */

function showProfile( int $id)
{
    global $pdo;
    try {
        $query = $pdo->prepare("SELECT * FROM members WHERE id = :i");
        $query->execute(["i" => $id,]);
        return  $query->fetch();
    } catch (PDOEXCEPTION $e) {
        echo $e->getMessage();
        return false;
    }
}

/**
 * 
 * REMOVE PROFILE
 * 
 */
function removeProfiles($id)
{
    global $pdo;
    try {
        $query = $pdo->prepare("DELETE FROM members WHERE id = :i");
        $query->execute([
            "i" => $id,
        ]);

        return true;
    } catch (PDOException $e) {
        echo $e->getMessage();
        return false;
    }
}
