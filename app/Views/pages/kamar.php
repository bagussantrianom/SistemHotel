<?= $this->extend('templates/index'); ?>

<?= $this->section('content'); ?>
<div class="container-fluid">

    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800"><?php echo ($title); ?></h1>
        </div>

        <!-- Content Row -->
        <!-- Button trigger modal -->

        <button type="button" class="btn btn-info mb-3" data-toggle="modal" data-target="#modaltambah">
            Tambah data kamar
        </button>

        <table class="table table-bordered table-striped" style="margin-bottom: 5%">
            <tr>
                <th class="text-center">No.</th>
                <th class="text-center">Kode Kamar</th>
                <th class="text-center">Nama Kamar</th>
                <th class="text-center">Harga per Malam</th>
                <th class="text-center">Action</th>
            </tr>
            <!-- melakukan perulangan array dataKamar pada kontroller untuk menginisiasi semua data pada db -->
            <!-- inisiasi nomor = 1 -->
            <?php $no = 1;
            foreach ($dataKamar as $dk) : ?>

                <tr>
                    <!-- memanggil semua data di db dengan memanggil masing masing atributnya -->
                    <td class="text-center"><?= $no++; ?></td>
                    <td class="text-center"><?= $dk->kode_kamar ?></td>
                    <td class="text-center"><?= $dk->nama_kamar ?></td>
                    <td class="text-center">Rp. <?= $dk->harga_kamar ?></td>
                    <td>
                        <center>
                            <!--tombol edit mengarahkan ke modal berdasarkan kode kamar -->
                            <button data-target="#modaledit<?= $dk->kode_kamar; ?>" type=" button" class="btn btn-warning" data-toggle="modal">
                                <i class=" fa fa-edit"></i>
                            </button>
                            <!-- menampilkan fungsi hapus data -->
                            <a onclick="return confirm('Apakah data akan dihapus ?')" href="<?php echo base_url("Kamar/hapusData"); ?>/<?= $dk->kode_kamar ?>" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                        </center>
                    </td>
                </tr>

            <?php endforeach; ?>
        </table>

        <!-- Modal tambah -->
        <div class="modal fade" id="modaltambah" tabindex="-1" role="dialog" aria-labelledby="modaltambah" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modaltambah">Tambah data kamar</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <!-- mengirim method post dan fungsi simpan post ke controller -->
                        <!-- method post berfungsi untuk menyimpan data ke controller kamar dengan function simpan form -->
                        <form method="POST" action="<?php echo base_url('Kamar/simpanForm'); ?>">
                            <div class="form-group">
                                <label>Kode Kamar</label>
                                <input type="text" name="kodeKamar" id="kodeKamar" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Nama Kamar</label>
                                <input type="text" name="namaKamar" id="namaKamar" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Harga Kamar</label>
                                <input type="number" name="hargaKamar" id="hargaKamar" class="form-control">
                            </div>
                            <div class="modal-footer">
                                <button type="reset" class="btn btn-danger">Reset</button>
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>

        <!-- Modal edit -->
        <!-- fungsi perulangan untuk menampilkan semua data di tabel -->
        <?php $no = 1;
        foreach ($dataKamar as $dk) : ?>
            <!-- parameter kode kamar sebagai penghubung antara tombol edit dan modal -->
            <div class="modal fade" id="modaledit<?= $dk->kode_kamar; ?>" tabindex="-1" role="dialog" aria-labelledby="modaltambah" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modaltambah">Tambah data kamar</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <!-- mengirim method dan fungsi edit post ke controller -->
                            <form method="POST" action="<?php echo base_url('Kamar/editForm'); ?>">
                                <!-- menambahkan value id dengan tipe hidden sebagai parameter where -->
                                <input type="hidden" value="<?= $dk->id ?>" name="id_kamar">
                                <div class="form-group">
                                    <label>Kode Kamar</label>
                                    <!-- memasukkan value database ke masing masing inputan  -->
                                    <input value="<?= $dk->kode_kamar; ?>" type="text" name="kodeKamar" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Nama Kamar</label>
                                    <input value="<?= $dk->nama_kamar; ?>" type="text" name="namaKamar" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Harga Kamar</label>
                                    <input value="<?= $dk->harga_kamar; ?>" type="number" name="hargaKamar" class="form-control">
                                </div>
                                <div class="modal-footer">
                                    <button type="reset" class="btn btn-danger">Reset</button>
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        <?php endforeach ?>


    </div>

</div>
<?= $this->endSection(); ?>