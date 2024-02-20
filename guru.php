<?php include("konfig.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SMK1LAGOS</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Smkn 1 Lagos</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-link active" aria-current="page" href="guru.php">Home</a>
                <a class="nav-link" href="klola.php">Pendaftaran</a>
                <a class="nav-link" href="klola-guru.php">Data Guru</a>
            </div>
            </div>
        </div>
    </nav>
        <div class="container mt-5">
        <h2>Data guru</h2>
        <a class="btn btn-primary" href="klola.guru.php" role="button">Tambah Data</a>
        <br><br>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>Jenis Kelamin</th>
                        <th>no_telp</th>
                        <th>Email</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $sql = "SELECT * FROM data_guru";
                        $query = mysqli_query($db, $sql);
                        while($guru = mysqli_fetch_array($query)) {
                            echo "<tr>";
                            echo "<td>".$guru['id_guru']."</td>";
                            echo "<td>".$guru['nama_guru']."</td>";
                            echo "<td>".$guru['alamat']."</td>";
                            echo "<td>".$guru['jenis_kelamin']."</td>";
                            echo "<td>".$guru['no_telp']."</td>";
                            echo "<td>".$guru['email']."</td>";
                            echo "<td>
                            <a href='klola.guru.php?edit=".$guru['id_guru']."' class='btn btn-warning'>Edit</a>
                            <a href='proses-guru.php?hapus=".$guru['id_guru']. "' class='btn btn-danger'>Delete</a>
                            </td>";
                        echo "</tr>";
                    }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html