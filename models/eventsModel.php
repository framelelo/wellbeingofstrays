<?php
/**
 * UPDATE EVENTS IN DATABASE
 * 
 * @param int $id
 * @param int $id_user
 * @param string $title
 * @param string $picture
 * @param string $link
 * @param string $description
 * 
 * @return bool
 */
function updateEvents(int $id, int $id_user,string $title, string $picture, string $link, string $description, $feature): bool
{
    global $pdo;

    try {
        $query = $pdo->prepare("UPDATE events SET id_member = :i, title = :t,picture = :p, link = :l, description = :d, feature = :f, date = :c WHERE id = :id");

        $query->execute([
            "i" => $id_user,
            "t" => $title,
            "p" => $picture,
            "l" => $link,
            "d" => $description,
            "f" => $feature,
            "c" => date("Y-m-d H:i:s"),
            "id" => $id
        ]);

        return true;
    } catch (PDOException $e) {
        echo 'Error: ' . $e->getMessage();
        return false;
    }
}

/**
 * ADD NEW EVENT IN DATABASE
 * 
 * @param int $id_user
 * @param string $title
 * @param string $picture
 * @param string $link
 * @param string $description
 * 
 * @return bool
 */
function newEvents(int $id_user, string $title, string $picture, string $link, string $description, $feature) : bool
{
    global $pdo;

    try {
        $query = $pdo->prepare("INSERT INTO events(id_member, title, picture, link, description, feature, date) VALUES (:i, :t, :p, :l, :d, :f, :c)");

        $query->execute([
            "i" => $id_user,
            "t" => $title,
            "p" => $picture,
            "l" => $link,
            "d" => $description,
            "f" => $feature,
            "c" => date("Y-m-d H:i:s")
        ]);

        return true;
    } catch (PDOException $e) {
        error_log('Error inserting new event: ' . $e->getMessage());  // Log error to PHP error log
        return false;
    }
}


/**
 * SELECT ALL EVENTS FROM DATABASE
 * 
 */
function showEvents()
{
    global $pdo;
    try {
        $query = $pdo->prepare("SELECT * FROM events ORDER BY date DESC");
        $query->execute([]);

        $allEvents = $query->fetchAll();
        return $allEvents;
    } catch (PDOEXCEPTION $e) {
        return false;
    }
}

/**
 * SELECT EVENTS BY ID FROM DATABASE
 * 
 * @param int $id
 * 
 * 
 */
function showEvent(int $id)
{
    global $pdo;
    try {
        $query = $pdo->prepare("SELECT * FROM events WHERE id = :i");
        $query->execute(["i" => $id,]);
        return  $query->fetch();
    } catch (PDOEXCEPTION $e) {
        return false;
    }
}

/**
 * REMOVE EVENTS FROM DATABASE
 * 
 * @param int $id
 * 
 * @return bool
 */

function removeEvents(int $id): bool
{
    global $pdo;

    try {
        // Remove event by id
        $query = $pdo->prepare("DELETE FROM events WHERE id = :i");
        $query->execute([
            "i" => $id,
        ]);

        return true;
    } catch (PDOException $e) {
        return false;
    }
}
