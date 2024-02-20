<?php 
include'konfig.php';
    $id_guru = '';
    $nama_guru = '';
    $jk = '';
    $alamat = '';
    $no_telp = '';
    $email = '';

    if(isset($_GET['edit'])){
        $id_guru = $_GET['edit'];
        $sql = "SELECT * FROM data_guru WHERE id_guru='$id_guru';";
        $query = mysqli_query($db, $sql);
        $result = mysqli_fetch_assoc($query);
        $nama_guru = $result['nama_guru'];
        $jk = $result['jenis_kelamin'];
        $alamat = $result['alamat'];
        $no_telp = $result['no_telp'];
        $email = $result['email'];
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SMK Negeri 1 Lagos</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css"/>
</head>
<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">SMK Negeri 1 Lagos</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
            <a class="nav-link active" aria-current="page" href="guru.php">Home</a>
            <a class="nav-link" href="form-guru.php">Data Guru</a>
        </div>
        </div>
    </div>
    </nav>
    <div class="container mt-4">
    <h2>Formulir Data Guru SMK Negeri 1 Lagos</h2><br>
        <form action="proses-guru.php" method="POST">
        <input type="hidden" value="<?php echo $id_guru;?>" name="id_guru">
            <div class="mb-3">
                <label for="nama" class="form-label">Nama Guru: </label>
                <input type="text" class="form-control" name="nama" value="<?php echo $nama_guru;?>" placeholder="nama lengkap" />
            </div>
            <div class="mb-3">
                <label for="alamat" class="form-label">Alamat</label>
                <textarea class="form-control" name="alamat" rows="3"><?php echo $alamat;?></textarea>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Alamat Email: </label>
                <input type="email" class="form-control" name="email" value="<?php echo $email;?>" placeholder="email " />
            </div>
            <div class="mb-3">
                <label for="no_telp" class="form-label">No.Tel: </label>
                <input type="number" class="form-control" name="no_telp" value="<?php echo $no_telp;?>" placeholder="nomor telepon" />
            </div>
            <div class="mb-3">
            <div class="form-check">
            <label for="jenis_kelamin" class="form-label">Jenis Kelamin:</label><br> 
                <input class="form-check-input" type="radio" name="jenis_kelamin" <?php if($jk == 'laki-laki'){echo "checked";}?> value="laki-laki">
                <label class="form-check-label" for="laki-laki">Laki-Laki</label><br>
                <input class="form-check-input" type="radio" name="jenis_kelamin" <?php if($jk == 'perempuan'){echo "checked";}?> value="perempuan"> 
                <label class="form-check-label" for="laki-laki">Perempuan</label>
            </div>
            </div>
            <div class="mb-3 row mt-4">
                <div class="col">
                    <?php 
                        if(isset($_GET['edit'])){
                    ?>
                            <button type="submit" name="aksi" value="edit" class="btn btn-primary">
                                simpan perubahan
                        </button>
                        <?php
                        }else{
                        ?>
                            <button type="submit" name="aksi" value="add" class="btn btn-primary">
                                daftar
                        </button>
                        <?php
                        }
                        ?>
                        <a href="guru.php" type="button" class="btn btn-danger">batal</a>
                        
                </div>
            </div>
        </form>
    </div>

</body>
</html>