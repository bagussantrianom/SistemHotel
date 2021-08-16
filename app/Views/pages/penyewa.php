<?= $this->extend('templates/index'); ?>

<?= $this->section('content'); ?>
<div class="container-fluid">

    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800"><?php echo ($title); ?></h1>
        </div>

        <!-- Content Row -->

        <table class="table table-bordered table-striped" style="margin-bottom: 5%">
            <tr>
                <th class="text-center">No</th>
                <th class="text-center">Nama</th>
                <th class="text-center">Tanggal Check In</th>
                <th class="text-center">Tanggal Check Out</th>
                <th class="text-center">Dewasa</th>
                <th class="text-center">Anak Anak</th>
                <th class="text-center">Tipe Kamar</th>
                <th class="text-center">Email</th>
                <th class="text-center">Nomor</th>
                <th class="text-center">Bukti Pembayaran</th>
                <th class="text-center">Konfirmasi Pembayaran</th>
            </tr>
            <?php $no = 1;
            foreach ($dataSewa as $ds) : ?>
                <tr>
                    <td class="text-center"><?= $no++; ?></td>
                    <td class="text-center"><?= $ds->nama ?></td>
                    <td class="text-center"><?= $ds->tgl_checkin ?></td>
                    <td class="text-center"><?= $ds->tgl_checkout ?></td>
                    <td class="text-center"><?= $ds->dewasa ?></td>
                    <td class="text-center"><?= $ds->anakanak ?></td>
                    <td class="text-center"><?= $ds->tipe_kamar ?></td>
                    <td class="text-center"><?= $ds->email ?></td>
                    <td class="text-center"><?= $ds->nomor ?></td>
                    <td class="text-center">
                        <button type="button" class="btn btn-info" data-toggle="modal" onclick="$('#imageBukti').attr('src','<?= base_url('uploads/berkas/' . $ds->bukti_bayar) ?>');$('#bayar').modal()">
                            <i class="fas fa-eye"></i>
                        </button>
                    </td>
                    <td class="text-center">
                        <?php if ($ds->Status == 'Menunggu') : ?>
                            <form action="<?= base_url('Penyewa/actionUpdateValidasi') ?>" method="POST">
                                <input type="hidden" name="id" value="<?= $ds->id ?>">
                                <button type="submit" class="btn btn-success" name="terima">
                                    <i class="fas fa-check"></i>
                                </button>
                                <button type="submit" class="btn btn-danger" name="tolak">
                                    <i class="fas fa-times"></i>
                                </button>
                            </form>
                        <?php else : ?>
                            <?= $ds->Status ?>
                        <?php endif; ?>
                    </td>
                </tr>

            <?php endforeach ?>
        </table>

    </div>
</div>
<!-- Modal bayar -->
<div class="modal fade" id="bayar" tabindex="-1" role="dialog" aria-labelledby="bayar" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="bayar">Bukti pembayaran penyewa</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <center>
                    <img id="imageBukti" src="" alt="" width="70%">
                </center>
            </div>

        </div>
    </div>
</div>
<?= $this->endSection(); ?>