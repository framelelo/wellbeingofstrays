<?php

/**
 * FOR LOGIN
 * 
 * @param string $email
 * @param string $pwd
 * 
 * @return bool
 * 
 * */
function login(string $email, string $pwd): bool
{
    global $pdo;

    // Check if email already exists in database
    try {
        $query = $pdo->prepare("SELECT * FROM members WHERE email = :e");

        $query->execute([
            "e" => $email
        ]);
        $user = $query->fetch();

        // Check if user does not exist
        if (!$user) {
            return false;
        }

        if (!password_verify($pwd, $user["pwd"])) {
            return false;
        }
        // Set session variables
        $_SESSION["user"] = $user;

        return true;
    } catch (PDOEXCEPTION $e) {
        echo $e->getMessage();
        return false;
    }
}

/**
 * TO REGISTER A NEW USER
 * 
 * @param string $firstName
 * @param string $lastName 
 * @param int $tel
 * @param string $email
 * @param string $pwd
 * 
 * 
 * @return bool
 * 
 * */


function register(string $firstName, string $lastName, int $tel, string $email, string $pwd): bool
{
    global $pdo;
    // Check if email already exists in database
    try {
        $checkQuery = $pdo->prepare("SELECT * FROM members WHERE email = :e");
        $checkQuery->execute(["e" => $email]);
        $emailExists = $checkQuery->fetch();
        if ($emailExists) {
            return false;
        }
    } catch (PDOException $e) {
        echo $e->getMessage();
        return false;
    }



    // Insert user into database
    try {
        $query = $pdo->prepare("INSERT INTO members(name,last_name,tel,email,pwd) VALUES (:n,:l,:t,:e,:p)");

        $query->execute([
            "n" => $firstName,
            "l" => $lastName,
            "t" => $tel,
            "e" => $email,
            "p" =>  password_hash($pwd, PASSWORD_DEFAULT)
        ]);
        return true;
    } catch (PDOException $e) {
        echo $e->getMessage();
        return false;
    }
}
