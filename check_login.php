<?php
/**
 * Created by PhpStorm.
 * User: Francesco
 * Date: 09/02/2019
 * Time: 16:47
 */
$sessionID = $_POST["sid"];

session_start($sessionID);
if(isset($_SESSION["nome"]) && isset($_SESSION["email"])){
    $res ['success'] = "ok";
    $res ['nome'] = $user["nome"];
    $res ['email'] = $user["email"];
    echo json_encode($res);
}else
    echo json_encode("nolog");
?>