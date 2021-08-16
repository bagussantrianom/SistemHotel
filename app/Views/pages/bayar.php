<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Pembayaran</title>

    <link rel="stylesheet" type="text/css" href="/css/bayar.css">
    <link href="<?= base_url(); ?>/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body>

    <table class="body-wrap">
        <tbody>
            <tr>
                <td></td>
                <td class="container" width="600">
                    <div class="content">
                        <table class="main" width="100%" cellpadding="0" cellspacing="0">
                            <tbody>
                                <tr>
                                    <td class="content-wrap aligncenter">
                                        <table width="100%" cellpadding="0" cellspacing="0">
                                            <tbody>
                                                <tr>
                                                    <td class="content-block">
                                                        <h2>Invoice</h2>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="content-block">
                                                        <table class="invoice">
                                                            <tbody>
                                                                <tr>
                                                                    <td><?= $nama ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <td><?php

                                                                        use CodeIgniter\I18n\Time;

                                                                        echo Time::today('Asia/Jakarta') ?>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>
                                                                        <table class="invoice-items" cellpadding="0" cellspacing="0">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td><?= $tipe_kamar ?></td>
                                                                                    <td class="alignright">Rp. <?= $harga_kamar ?></td>
                                                                                </tr>
                                                                                <tr class="total">
                                                                                    <td class="alignright" width="80%">Total</td>
                                                                                    <td class="alignright">Rp. <?= $harga_kamar ?></td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="content-block">
                                                        HOTELKU.COM
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                            </tbody>
                        </table>


                        <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>

                        <form action="<?= base_url('/Bayar/actionKonfirmasi') ?>" method="POST" enctype="multipart/form-data">
                            <center>
                                <div class=" mt-3 custom-file">
                                    <input type="hidden" name="id" value="<?= $id ?>">
                                    <input type="file" class="btn btn-outline-primary" id="inputGroupFile01" name="upload_file">

                                </div>


                                <button class="mt-5 btn btn-info" type="submit">
                                    Konfirmasi Pembayaran
                                </button>
                            </center>
                        </form>

                        <div class="footer">
                            <table width="100%">

                                <tr>
                                    <td class="aligncenter content-block">Questions? Email <a href="mailto:">support@hotelku.com</a></td>
                                </tr>

                            </table>
                        </div>
                    </div>
                </td>
                <td></td>
            </tr>
        </tbody>
    </table>

    <!-- JS -->
    <script src="js/bayar.js"></script>

</body>

</html>