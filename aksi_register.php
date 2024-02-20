<?php
session_start();
include 'koneksi.php';

if(isset($_post['tambah'])) {
    $username = $_post['username'];
    $password = $_post['password'];
    $email = $_post['email'];
    $nama = $_post['nama'];
    $alamat = $_post['alamat'];

    //mengambil informasi file
    $foto_pro = $_FILES['namafoto_pro']['name'];
    $foto_pro = $_FILES['namafoto_pro']['name'];

    //validasi file
    if (isset($_FILES['namafoto_pro']) && $_FILES['namafoto_pro']['error'] === 0){
     //file berhasil diunggah
    $lokasi_pro = 'assets/img/';
    $namafoto_pro = $foto_pro; //mengubah nama file menjadi nama asli

    //memindahkan file
    move_uploaded_file($tmp,$lokasi_pro . $namafoto_pro);

    //Query untuk memeriksa ketersediaaan nama pengguna
    $check_query = "SELECT * FROM user WHERE username ='$username'";
    $result =mysqli_query($conn,$check_query);

    //periksa jumlah baris yang dikembalikan
    if (mysqli_num_row($result) > 0){
        //jika nama pengguna sudah ada dalam database
        echo "<script>
        alert('nama pengguna sudah digunakan.silahkan pilih nama pengguna lain.');
        location.href = 'register.php?status=gagal';
        </script>";
    }else{
        $sql = mysqli_query($conn, "INSERT INTO user (username, password, email, namalengkap, alamat, namafoto_pro)
        VALUE('$username','$password','$email','$nama','$alamat','$namafoto_pro')");

    if($sql) {
        //jika pendaftaran berhasil
        echo "<script>
        alert('pendaftaran akun berhasil');
        location.href = 'login.php?setatus=berhasil';
        </script>";
         
        }else{
            //jika pendaftaran gagal
            echo"<script>
            alert('pendaftaran akun gagal.silahkan coba lagi.');
            location.href = 'register.php?status=gagal';
            </script>";

        }
    }
 }else{
    //file gagal diunggah
    echo "<script>
    alert('file gagal diunggah.silahkan coba lagi.');
    location.href = 'register.php?status=gagal';
    </script>";
 }
}
