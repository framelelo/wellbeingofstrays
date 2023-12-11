<?php

function updateProfiles($id, $firstName, $lastName, $tel, $email, $pwd, $role)
{
    global $pdo;

    try {
        $query = $pdo->prepare("UPDATE users SET name = :n, last_name = :l, tel = :t, email = :e, pwd = :p, role = :r WHERE id = :id");

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
function newProfile($firstName, $lastName, $tel, $email, $pwd, $role)
{

    global $pdo;

    try {
        $query = $pdo->prepare("INSERT INTO users(name,last_name,tel,email,pwd,role) VALUES (:n,:l,:t,:e,:p,:r)");

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

function showAllProfiles()
{
    global $pdo;

    try {
        $query = $pdo->prepare("SELECT * FROM users");

        $query->execute([]);
        return $query->fetchAll();
    } catch (PDOEXCEPTION $e) {
        echo $e->getMessage();
        return false;
    }
}



function showProfile($id)
{
    global $pdo;
    try {
        $query = $pdo->prepare("SELECT * FROM users WHERE id = :i");
        $query->execute(["i" => $id,]);
        return  $query->fetch();
    } catch (PDOEXCEPTION $e) {
        echo $e->getMessage();
        return false;
    }
}

function removeProfiles($id)
{
    global $pdo;
    try {
        $query = $pdo->prepare("DELETE FROM users WHERE id = :i");
        $query->execute([
            "i" => $id,
        ]);

        return true;
    } catch (PDOException $e) {
        echo $e->getMessage();
        return false;
    }
}
