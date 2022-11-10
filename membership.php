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

    $name = $_POST['name'];
    $id = $_POST['id'];
    $pw_ = $_POST['pw'];
    $userpw = password_hash($pw_, PASSWORD_DEFAULT);
    
    $sql = "INSERT INTO assem_login (l_name,l_id,l_pw) VALUES ('".$name."','".$id."','".$userpw."');";
    $result = mysqli_query($conn, $sql);
    if($result) 
    {
        echo '<script>alert("회원가입이 완료되었습니다.")</script>';
        echo "<script>location.href = './login.html'</script>";
    }
    else
    {
        echo '<script>alert("회원가입에 실패했습니다.\n다시 시도해 주세요.")</script>';
        echo "<script>location.href = './membership.html'</script>";
    } 

    $conn->close();
?>
    