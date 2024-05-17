<?php 
include_once 'header.php';
include_once 'sidebar.php';

$praktikum = 'praktikum 1';
$title = 'Array Buah';
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><?= htmlspecialchars($title) ?></h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#"><?= htmlspecialchars($praktikum) ?></a></li>
                        <li class="breadcrumb-item"><a href="#"><?= htmlspecialchars($title) ?></a></li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <!-- Default box -->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title"><?= htmlspecialchars($title) ?></h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <p>Selamat datang di Dashboard Program studi <?= htmlspecialchars($title) ?>!</p>
                            <ul>
                                <?php
                                $ar_buah = ["Pepaya", "Mangga", "Pisang", "Jambu"];
                                
                                //Cetak buah index ke-2
                                echo '<li>' . $ar_buah[2] . '</li>';
                                
                                //Cetak jumlah buah
                                echo '<li>Jumlah Buah : ' . count($ar_buah) . '</li>';
                                
                                //Cetak seluruh buah
                                foreach ($ar_buah as $buah) {
                                    echo '<li>' . $buah . '</li>';
                                }
                                
                                // Tambahkan buah
                                $ar_buah[] = "Durian";
                                array_push($ar_buah, "Apel", "Salak");
                                print_r($ar_buah);
                                
                                // Hapus buah index ke-1
                                unset($ar_buah[1]);
                                print_r($ar_buah);
                                
                                // Ubah index ke-2 menjadi manggis
                                $ar_buah[2] = "Manggis";
                                print_r($ar_buah);
                                
                                // Cetak Seluruh buah dengan indexnya
                                foreach ($ar_buah as $k => $v) {
                                    echo "<li>Buah index - $k adalah $v</li>";
                                }
                                ?>
                            </ul>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php 
include_once 'footer.php';
?>
