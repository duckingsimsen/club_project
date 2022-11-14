<?php
    header('Content-type: text/html; charset=utf-8');
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
    $userpw = password_hash($pw, PASSWORD_DEFAULT); // 암호화 시킨것
    
    // $sql_1 = "SELECT * FROM assem_login WHERE a_id = $id;";
    // $sql_1_1 = "SELECT a_id FROM assem_login WHERE a_id = $id;";
    // $sql_2 = "SELECT * FROM assem_login WHERE a_pw = '$pw';";
    // $sql_3 = "SELECT a_id, a_pw FROM assem_login WHERE a_id = $id AND a_pw = '$pw';";
    $sql_4 = "SELECT * FROM assem_login";

    //------------------------------------------ 여기까진 문제가 없음

    // $result_1 = mysqli_query($conn, $sql_1);
    // $result_1_1 = mysqli_query($conn, $sql_1_1);
    // $result_2 = mysqli_query($conn, $sql_2);
    // $result_3 = mysqli_query($conn, $sql_3);
    //echo $conn;
    
    $result_4 = mysqli_query($conn, $sql_4);
    $check = 0;
    $i = 0;

    $result_4 = mysqli_query($conn, $sql_1_1);
    $row = mysqli_fetch_array($result_4);
    $hash = $row["a_pw"];

    if(password_verify($pw, $hash))
    {
        echo '<script>alert("회원가입이 완료되었습니다.")</script>';
        echo "<script>location.href = './login.html'</script>";
    }
    else
    {
        echo '<script>alert("회원가입에 실패했습니다.\n다시 시도해 주세요.")</script>';
        echo "<script>location.href = './membership.html'</script>";
    } 

    /*
    id 친거를 찾아서 그 행을 가져와서 비밀번호를 비교한다
    */

    echo $result_4;
    $sql_5 = "SELECT a_pw FROM assem_login WHERE a_id = '$id';";
    $result_5 = mysqli_query($conn, $sql_5);

    if($result_1_1 == $id)//id가 있음
    {
        if($userpw == $result_5) // 로그인 성공
        {
?>
            <script type="text/javascript">location.replace("log_success.html");</script>
<?php
        }
        else // 암호가 안맞음
        {
            echo "<script type='text/javascript'>alert('비밀번호가 틀립니다 assem');</script>";
        }
    }
    else//id가 없음
    {
        echo "<script type='text/javascript'>alert('학번이 틀립니다 assem');</script>";
    }


    /*if(mysqli_affected_rows($conn) > 0) // 총 몇줄인지
    {
        $check = 1;
        if(mysqli_affected_rows($conn) > 0 && $check == 1)
        {
            $check = 2;
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
    }*/
    $conn->close();
?>