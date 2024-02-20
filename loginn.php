<?php
if(isset($_POST['submit'])){
    session_start();
    include 'db.php';

    $user = mysqli_real_escape_string($iconn, $_POST['user']);
    $pass = mysqli_real_escape_string($iconn, $_POST['pass']);

    $cek = mysqli_query($conn, "SELECT * FROM tb_admin WHERE username = '".$user."'AND password = '".$pass."'");
    if (mysqli_num_rows($cek)>0){
        $d = mysqli_fetch_object($cek);
        $_SESSION['status_login']= true;
        $_SESSION['a_global'] = $d;
        $_SESSION['id'] = $d->admin_id;
        echo '<script>window.location="dashboard.php"</script>';
    }else {
        echo '<script>alert("username atau passwoerd anda salah")</script>';
    }
}