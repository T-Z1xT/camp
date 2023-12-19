<?php
include_once "c_koneksi.php";
class c_reservasi
{
    public function insert($id_reservasi, $tgl_order, $id_barang, $qty, $tgl_kembali, $harga, $photo)
    {
        $conn = new c_koneksi();
        $query = "INSERT INTO reservasi VALUES ('$id_reservasi', '$tgl_order', '$id_barang', '$qty', '$tgl_kembali', '$harga', '$photo')";
        $data = mysqli_query($conn->conn(), $query);
        var_dump($query);
    }

    public function read()
    {
        $conn = new c_koneksi();
        // perintah mengambil semua data dari barang dan mengurutkan sesuai data terbaru diatas
        $query = "SELECT * FROM reservasi ORDER BY id_reservasi DESC";
        $data = mysqli_query($conn->conn(), $query);

        // mengubah query data menjadi objek
        while ($row = mysqli_fetch_object($data)) {
            // array kosong untuk menampung data objek
            $rows[] = $row;
        }

        // mengembalikan nilai
        return $rows;
    }

    public function edit($id_reservasi)
    {
        $conn = new c_koneksi();

        // perintah mengambil data dari barng berdasarkan id
        $query = "SELECT * FROM reservasi WHERE id_reservasi = $id_reservasi";
        $data = mysqli_query($conn->conn(), $query);
        while ($row = mysqli_fetch_object($data)) {
            $rows[] = $row;
        }
        return $rows;
    }

    public function update($id_reservasi, $tgl_order, $id_barang, $harga, $photo)
    {
        $conn = new c_koneksi();
        // perintah untuk update data dari barang 
        $query = "UPDATE reservasi SET tgl_order='$tgl_order', id_barang='$id_barang', harga='$harga', photo='$photo' WHERE id_reservasi = $id_reservasi";
        $data = mysqli_query($conn->conn(), $query);
    }

    public function delete($id_reservasi)
    {
        $conn = new c_koneksi();

        // perintah untuk menghapus data dari barang berdasarkan id
        $query = "DELETE FROM reservasi WHERE id_reservasi = $id_reservasi";
        $data = mysqli_query($conn->conn(), $query);

        header("Location: ../views/reservarsi.php");
    }

    public function laporan()
    {
        echo "<script>window.print();</script>";
    }
}
