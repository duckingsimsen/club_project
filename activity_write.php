<?php
    require_once __DIR__ . '/db.php';
    define('db', true);

    date_default_timezone_set('Asia/Seoul');
    $department = $_POST['department'];
    $title = $_POST['title'];
    $contents = $_POST['contents'];
    $date_ = date('Y-m-d H:i:s');

    if($department == null)
    {
        echo '<script> alert("부서를 선택하세요") </script>';
        echo "<script> history.back(); </script>";
    }

    echo $department;
    $sql_1 = "INSERT INTO assem_activity (department, title, contents, date_) VALUE ( '$department', '$title', '$contents', '$date_');";
    $result = mysqli_query($db, $sql_1);

    if($result)
    {
        echo '<script> alert("글쓰기 완료되었습니다.") </script>';
        echo "<script> location.href = './activity_login.html'</script>";
    }
    else
    {
        echo '<script> alert("글쓰기 실패했습니다") </script>';
        echo "<script> history.back(); </script>";
    }
?>