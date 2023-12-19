<?php include "../controllers/c_login.php";
$halaman = "tabel";
$data = $_SESSION['data'];
$nama = $_SESSION['username'] = $data['username'];
$role = $_SESSION['role'] = $data['role'];
include_once "template/header.php";
include_once "../controllers/c_barang.php";
$baru = new c_barang();
?>

<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">

        <!-- Topbar -->
        <!-- <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow"> -->

            <!-- Sidebar Toggle (Topbar) -->
            

            <!-- Topbar Search -->
            

            <!-- Topbar Navbar -->

                <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                

                <!-- Nav Item - Alerts -->
                
        <!-- </nav> -->
        <!-- End of Topbar -->
        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h4 class="m-0 font-weight-bold text-primary">Generate Laporan</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Qty</th>
                                    <th>Harga</th>
                                    <th>Gambar</th>
                                </tr>
                            </thead>
                            <?php $i = 1; ?>
                            <?php foreach ($baru->read() as $read) : ?>
                                <tbody>
                                    <tr>
                                        <td><?= $i; ?></td>
                                        <td><?= $read->nama_barang ?></td>
                                        <td><?= $read->qty ?></td>
                                        <td><?= 'Rp. ' . number_format($read->harga, 0, '', '.'); ?></td>
                                        <td>
                                            <img src="../assets/img/<?= $read->photo ?>" alt="" width="50px" height="50px">
                                        </td>
                                    </tr>
                                    <?php $i++; ?>
                                </tbody>
                            <?php endforeach; ?>
                        </table>
                    </div>
                </div>
            </div>

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->

    <!-- Footer -->

    <!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->

<script>
    window.print();
</script>

<!-- Logout Modal-->


<?php include_once "template/footer.php" ?>