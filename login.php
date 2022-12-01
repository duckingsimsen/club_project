<?php
    require_once __DIR__ . '/db.php';
    define('db', true);

    $id = $_POST['id'];
    $pw = $_POST['pw'];
    $userpw = password_hash($pw, PASSWORD_DEFAULT); // 암호화 시킨것
    
    $sql_1 = "SELECT a_NUM FROM assem_login WHERE a_id = $id;";
    $sql_2 = mysqli_query($db, $sql_1);
    $result_1 = $sql_2 -> fetch_array();
    $num = $result_1["a_NUM"];
    
    $sql_2 = "SELECT a_pw FROM assem_login WHERE a_NUM = $num;";
    $sql_3 = mysqli_query($db, $sql_2);
    $result_2 = $sql_3 -> fetch_array();
    $hash = $result_2["a_pw"];

    $sql_4 = "SELECT a_id FROM assem_login WHERE a_id = $id;";
    $sql_5 = mysqli_query($db, $sql_4);
    $result_3 = $sql_5 -> fetch_array();
    $id_ = $result_3["a_id"];

    $sql_6 = "SELECT a_name FROM assem_login WHERE a_id = $id;";
    $sql_7 = mysqli_query($db, $sql_6);
    $result_4 = $sql_7 -> fetch_array();
    $name_ = $result_4["a_name"];

    if($id_ != null)//id가 있음
    {
        if(password_verify($pw, $hash))
        {
            echo "<script type = 'text/javascript'> alert('반갑습니다. $name_ 님');</script>";
            echo "<script type = 'text/javascript'> location.replace('main.html'); </script>";
        }
        else
        {
            echo "<script type = 'text/javascript'> alert('비밀번호가 틀렸습니다. \n다시 시도해주세요.');</script>";
        }
    }
    else//id가 없음
    {
        echo "<script type='text/javascript'>alert('학번이 틀렸습니다. \n다시 시도해주세요');</script>";
    }
    $conn->close();
?>