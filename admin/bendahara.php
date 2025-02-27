<?php
$halaman = 'Bendahara';
include 'global_header.php';
?>

<div class="content">
    <div class="container-xl">
        <div class="page-header d-print-none">
            <div class="row align-items-center">
                <div class="col">
                    <h2 class="page-title">
                        <?= $halaman ?>
                    </h2>
                </div>
            </div>
        </div>
        <?php
                //menampilkan pesan jika ada pesan
                if (isset($_SESSION['pesan']) && $_SESSION['pesan'] <> '') {
                    $pesan = $_SESSION['pesan'];
                    echo '<div class="flash-data" data-flashdata="' . $_SESSION['pesan'] . '"></div>';
                }
                $_SESSION['pesan'] = '';
                ?>


        <div class="col-12">
            <div class="card">
                <div class="row row-0">
                    <div class="col">
                        <div class="card-body">
                            <h3 class="card-title">Halaman Edit <?= $halaman ?></h3>

                            <?php
                            $query = $koneksi->query("SELECT * FROM laporan WHERE id_laporan = '6'");
                            foreach ($query as $data):
                            ?>
                            <form action="" method="post" enctype="multipart/form-data">

                                <textarea class="ckeditor" id="ckeditor2" name="laporanksp" rows="7"
                                    placeholder="Content.."><?= $data['isilaporan'] ?></textarea>

                                <br>
                                <input class="btn btn-primary" name="tambah" type="submit" value="Update">
                                <input class="btn btn-danger" id="reset" type="reset" value="Batal"
                                    onclick="self.history.back()">
                            </form>

                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<?php
if (isset($_POST['tambah'])){
    $laporanksp = $_POST['laporanksp'];

$update = $koneksi->query("UPDATE laporan SET isilaporan = '".$laporanksp."' WHERE id_laporan = '6'  ");
$_SESSION['pesan'] = 'Ubah';
echo "<script> document.location.href='./laporanksp';</script>";
exit;
}
?>
<?php
include 'global_footer.php'
?>