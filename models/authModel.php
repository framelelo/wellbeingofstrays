<?php

function login($email, $pwd)
{

    global $pdo;

    try {
        $query = $pdo->prepare("SELECT * FROM members WHERE email = :e");

        $query->execute([
            "e" => $email
        ]);
        $user = $query->fetch();
        if (!$user) {
            return false;
        }

        if (!password_verify($pwd, $user["pwd"])) {
            return false;
        }

        $_SESSION["user"] = $user;

        return true;
    } catch (PDOEXCEPTION $e) {
        echo $e->getMessage();
        return false;
    }
}


function registrer($firstName, $lastName, $tel, $email, $pwd)
{

    global $pdo;

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
