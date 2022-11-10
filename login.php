<?php
    $servername = "localhost";
    $username = "root";
    $password = "tlatms2033!";
    $dbname = "assem";

    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn -> connect_error)
    {
        die("Connection failed: " . $conn -> connect_error);
    }

    $id = $_POST['id'];
    $pw = $_POST['pw'];
    
    $sql_1 = "SELECT ID FROM assem_login WHERE ID = '" .$id. "';";
    $sql_2 = "SELECT PW FROM assem_login WHERE ID = '" .$pw. "';";
    $sql_3 = "SELECT ID, PW FROM assem_login WHERE ID = '" .$id. "' AND PW = '" .$pw. "';";

    $result_1 = mysqli_query($conn, $sql_1);
    
    
    $check = 0;

    if(mysqli_affected_rows($conn) > 0)
    {
        $check = 1;
        $result_2 = mysqli_query($conn, $sql_2);
        if(mysqli_affected_rows($conn) > 0 && $check == 1)
        {
            $check = 2;
            $result_3 = mysqli_query($conn, $sql_3);
            if(mysqli_affected_rows($conn) > 0 && $check == 2)
            {
                echo '<script>alert("로그인성공")</script>';
            }
        }
        else
        {
            echo '<script>alert("비밀버호가 틀렸습니다")</script>';
        }
    }
    else
    {
        echo '<script>alert("학번이 틀렸습니다")</script>';
    }
    $conn->close();
?>