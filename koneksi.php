<?php
    $koneksi = new mysqli('localhost', 'root', '', 'david_pplg1')
        or die(mysqli_error($koneksi));


    if (isset($_POST['simpan'])) {
        $id = $_POST['id'];
        $nama = $_POST['nama'];
        $jk = $_POST['jk'];
        $alamat = $_POST['alamat'];
        $koneksi->query("INSERT INTO pasien (id, nama, jk, alamat) values('$id', '$nama', '$jk', '$alamat')");

        header('location:pasien.php');
    }


    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $koneksi->query("DELETE FROM pasien where id = 'id'");
        header ("location:pasien.php");
    }

    if (isset($_POST['edit'])) {
        $id = $_POST['id'];
        $nama = $_POST['nama'];
        $jk = $_POST['jk'];
        $alamat = $_POST['alamat'];

        $koneksi->query("UPDATE pasien SET id='$id', nama='$nama', jk='$jk', alamat='$alamat'");
        header("location:pasien.php");
    }
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $koneksi->query("DELETE FROM pasien WHERE id = '$id'");
    
        // Set session variable for deletion notification
        $_SESSION['deleted'] = true;
    
        header("Location: pasien.php");
        exit();
    }
    ?>