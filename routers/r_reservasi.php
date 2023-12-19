<?php
include_once "../controllers/c_reservasi.php";
$reservasi = new c_reservasi();

if ($_GET["aksi"] == "tambah") {
    $id = $_POST["id_reservasi"];
    $tgl = $_POST["tgl"];
    $barang = $_POST["barang"];
    $qty = $_POST["qty"];
    $kembali = $_POST["kembali"];
    $harga = $_POST["harga"];
    $photo = $_FILES["photo"]["name"];
    $tmp = $_FILES["photo"]["tmp_name"];

    move_uploaded_file($tmp, '../assets/img/' . $photo);

    $reservasi->insert($id=0, $tgl, $barang, $qty, $kembali, $harga, $photo);

    if ($barang) {
        echo "<script> alert('Data berhasil di tambahkan!');
        document.location.href = '../views/reservasi.php';
        </script>";
    }
} elseif ($_GET["aksi"] == "tambah") {
    $id = $_POST["id"];
    $tgl = $_POST["tgl"];
    $barang = $_POST["barang"];
    $harga = $_POST["harga"];

    $photo = $_FILES["photo"]["name"];
    $tmp = $_FILES["photo"]["tmp_name"];

    move_uploaded_file($tmp, '../assets/img/' . $photo);

    $barang->insert($id, $tgl, $barang, $harga, $photo);

    if ($barang) {
        echo "<script> alert('Data berhasil di tambahkan!');
        document.location.href = '../views/barang.php';
        </script>";
    }
} elseif ($_GET["aksi"] == "delete") {
    $id = $_GET["id"];
    $reservasi->delete($id);
} elseif ($_GET["aksi"] == "laporan") {
    $reservasi->laporan();
}
