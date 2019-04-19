<?php

    $link = mysqli_connect("127.0.0.1", "root", "", "museumdb");
    if ($link->connect_error) {
            die("Connessione fallita: " . $link->connect_error);
        }
    $Nome = mysqli_real_escape_string($link,trim($_POST["Nome"]));
    $Cognome = mysqli_real_escape_string($link,trim($_POST["Cognome"]));
    $Email = mysqli_real_escape_string($link,trim($_POST["Email"]));
    $Password = mysqli_real_escape_string($link,trim($_POST["Password"]));

    //$cPassword = md5($Password);

    $sql = "INSERT INTO utenti VALUES (DEFAULT ,'$Nome', '$Cognome', '$Email', '$Password')";

    if ($link->query($sql) === TRUE) {
        echo "Ok";
    }else{
       echo mysqli_error($link);
    }
?>