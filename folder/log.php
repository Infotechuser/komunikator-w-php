<?php
    require_once "connect.php";
    $polaczenie = @new mysqli($host, $db_user, $db_password, $db_name);

    if ($polaczenie->connect_errno!=0)
    {
        echo "Error: ".$polaczenie->connect_errno;
    }
    else
    {
        $login = $_POST['login'];
        $haslo = $_POST['haslo'];

        $sql = "SELECT * FROM uzytkownicy WHERE user='$login' AND pass='$haslo'";
        if ($wynik = @$polaczenie->query($sql))
        {
            $ilosc_urzy = $wynik->num_rows;
            if ($ilosc_urzy > 0)
            {
                $wiersz = $wynik->fetch_assoc();
                $user = $wiersz['user'];
                $wynik->close();
                header("Location: ind.php");
            }
        }

        $polaczenie->close();
    }
?>