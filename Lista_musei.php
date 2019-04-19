<?php
    $link = mysqli_connect("127.0.0.1", "root", "", "museumdb");
    if ($link->connect_error) {
        die("Connessione fallita: " . $link->connect_error);
    }

    $rs = mysqli_query($link, "SELECT musei.id, musei.nome, musei.indirizzo FROM musei");
    $num_row = mysqli_num_rows($rs);

    if ($num_row > 0) {

        $i = 0;
        $res = "";
        while($row = $rs->fetch_assoc()) {

            $res ["id".$i] = utf8_encode($row["id"]);
            $res ["museo".$i] = utf8_encode($row["nome"]);
            $res ["indirizzo".$i] = utf8_encode($row["indirizzo"]);
            $i++;
        }
        $res["success"] = utf8_encode("ok");
        echo json_encode($res);
    }
    else {
        $res["success"] = "invalid";
        echo json_encode($res);
    }

?>