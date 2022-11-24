<?php
    require_once __DIR__ . '/db.php';
    define('db', true);

    $name = $_POST['name'];
    $id = $_POST['id'];
    $pw_ = $_POST['pw'];
    $userpw = password_hash($pw_, PASSWORD_DEFAULT);

    $sql_1 = "SELECT a_id FROM assem_login WHERE a_id = $id";
    $sql_2 = mysqli_query($db, $sql_1);
    $result_1 = $sql_2 -> fetch_array();
    $id_ = $result_1['a_id'];

    if($id_ == null)
    {
        $sql_3 = "INSERT INTO assem_login (a_name, a_id, a_pw) VALUES ('$name','$id','$userpw');";
        $sql_4 = mysqli_query($db, $sql_3);
        echo '<script>alert("회원가입이 완료되었습니다.")</script>';
        echo "<script>location.href = './login.html'</script>";
    }
    else
    {
        echo '<script>alert("학번이 겹칩니다.\n다시 시도해 주세요.")</script>';
        echo "<script>location.href = './membership.html'</script>";
    }

    $conn->close();
?>
    