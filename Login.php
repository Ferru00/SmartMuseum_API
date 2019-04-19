<?php
    session_start();
    $link = mysqli_connect ("127.0.0.1", "root", "", "museumdb");
    if ($link->connect_error) {
            die("Connessione fallita: " . $link->connect_error);
        }

    $Email = mysqli_real_escape_string($link,trim($_POST["Email"]));
    $Password = mysqli_real_escape_string($link,trim($_POST["Password"]));

    //$cPassword = md5($Password);

    $rs = mysqli_query($link, "SELECT * FROM utenti where email = '$Email' AND password = '$Password'");
    $row = mysqli_num_rows($rs);

    if ($row == 1)
    {
        $user  = mysqli_fetch_array($rs);

        $_SESSION['id'] = $user["id"];
        $_SESSION['name'] = $user["nome"];

        $res ['success'] = "ok";
        $res ['nome'] = $user["nome"];
        $res ['email'] = $user["email"];
        $res ['cookie'] = session_id();
        echo json_encode($res);
    }
    else {
        $res ['success'] = "invalid";
        echo json_encode($res);
    }
?>