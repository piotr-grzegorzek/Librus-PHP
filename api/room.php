<?php
session_start();
require_once ("../internal/common.php");
require_once ("../api/connect.php");
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if ($_SESSION["permissions"] == "ADMIN") {
        $data["type"] = filter_input(INPUT_POST, "type", FILTER_SANITIZE_STRING);
        $data["name"] = filter_input(INPUT_POST, "name", FILTER_SANITIZE_STRING);
        $data["id"] = filter_input(INPUT_POST, "id", FILTER_SANITIZE_NUMBER_INT);
        switch ($data["type"]) {
            case "INSERT":
                if (!empty ($data["name"])) {
                    try {
                        $db = connect();
                        $sql = "INSERT INTO rooms (name) VALUES (:name)";
                        $db->prepare($sql)->execute([':name' => $data["name"]]);
                    } catch (Exception | PDOException $err) {
                        echo $err;
                        http_response_code(500);
                    }
                }
                break;
            case "UPDATE":
                if (!empty ($data["name"]) && !empty ($data["id"])) {
                    try {
                        $db = connect();
                        $sql = "UPDATE rooms SET name = :name WHERE id = :id";
                        $db->prepare($sql)->execute([$data["name"], $data["id"]]);
                    } catch (Exception | PDOException $err) {
                        echo $err;
                        http_response_code(500);
                    }
                }
                break;
            case "DELETE":
                if (!empty ($data["id"])) {
                    try {
                        $db = connect();
                        $sql = "DELETE FROM rooms WHERE id = :id";
                        $db->prepare($sql)->execute([':id' => $data["id"]]);
                    } catch (Exception | PDOException $err) {
                        echo $err;
                        http_response_code(500);
                    }
                }
                break;
            default:
                http_response_code(400);
        }
    } else
        http_response_code(401);
} else if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (isset ($_SESSION['permissions'])) {
        $data["id"] = filter_input(INPUT_GET, "id", FILTER_SANITIZE_NUMBER_INT);
        if (empty ($data["id"])) {
            try {
                $db = connect();
                $res = $db->query("SELECT * FROM rooms")->fetchAll();
                echo json_encode($res);
            } catch (Exception | PDOException $err) {
                echo $err;
                http_response_code(500);
            }
        } else {
            try {
                $db = connect();
                $stmt = $db->prepare("SELECT * FROM rooms WHERE id=:id");
                $stmt->execute($data);
                $res = $stmt->fetchAll();
                echo json_encode($res);
            } catch (Exception | PDOException $err) {
                echo $err;
                http_response_code(500);
            }
        }
    } else
        http_response_code(401);
}
?>