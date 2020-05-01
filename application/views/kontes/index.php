<div id="wrapper">

    <!-- Main page header -->
    <section class="container" role="main">
        <div class="row">
            <!-- Data block -->
            <?php if ($this->session->flashdata('msg')) {
                ?>
                <div class="auto-hide alert alert-success" role="alert">
                    <strong>Selamat !</strong> <?= $this->session->flashdata('msg') ?>
                </div>
                <?php
            } ?>
            <article class="col-sm-12">
                <div class="dark data-block">
                    <header>
                        <h2><?= $title ?></h2>
                        <ul class="data-header-actions">
                            <li><a href="<?= base_url('administrator/kontes/tambah') ?>">Tambah Kontes</a></li>
                        </ul>
                    </header>
                    <section>
                        <table class="datatable table table-striped table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>Pengaju</th>
                                <th>Judul</th>
                                <th>Tanggal</th>
                                <th>Kuota</th>
                                <th>Nomor</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $no = 1;
                            foreach ($data as $key) {
                                ?>
                                <tr class="odd gradeX">
                                    <td><?= $no ?></td>
                                    <td><?= $key->pengguna_nama ?></td>
                                    <td><?= $key->kontes_nama ?></td>
                                    <td><?= date_indo($key->kontes_tanggal_mulai) ?></td>
                                    <td><?= $key->kontes_jumlah_pemesan . "/" . $key->kontes_kuota ?></td>
                                    <td><?= $key->kontes_nomor ?></td>
                                    <td><?php
                                        if ($key->kontes_status == 'selesai') {
                                            ?>
                                            <span class="label label-success"><?= $key->kontes_status ?></span>
                                            <?php
                                        } else if ($key->kontes_status == 'menunggu') {
                                            ?>
                                            <span class="label label-warning"><?= $key->kontes_status ?></span>
                                            <?php
                                        } else if ($key->kontes_status == 'ditolak') {
                                            ?>
                                            <span class="label label-danger"><?= $key->kontes_status ?></span>
                                            <?php
                                        } else {
                                            ?>
                                            <span class="label label-primary"><?= $key->kontes_status ?></span>
                                            <?php
                                        }

                                        ?></td>
                                    <td>
                                        <a id="detailKontes" class="btn btn-primary detail"
                                           data-id="<?= $key->kontes_id ?>" data-toggle="modal"
                                           href="#modalKontes"><span class="elusive icon-eye-open"></span></a>
                                        <a href="<?= base_url("kontes/cetak/" . $key->kontes_id) ?>"
                                           class="btn btn-warning btn-sm"><span class="elusive icon-book"></span></a>
                                        <a href="<?= base_url("administrator/kontes/accept/" . $key->kontes_id) ?>"
                                           onclick="return confirm('Apakah anda yakin ingin Menyetujui Kontes ini?')"
                                           class="btn btn-success btn-sm"><span class="elusive icon-ok"></span></a>
                                        <a onclick="return confirm('Apakah anda yakin ingin Menolak Kontes ini?')"
                                           href="<?= base_url("administrator/kontes/tolak/" . $key->kontes_id) ?>"
                                           class="btn btn-danger btn-sm"><span class="elusive icon-remove"></span></a>
                                    </td>
                                </tr>
                                <?php
                                $no++;
                            }
                            ?>
                            </tbody>
                        </table>

                    </section>
                </div>
            </article>

            <!-- /Data block -->

        </div>
        <!-- /Grid row -->

    </section>
    <!-- /Main page container -->

</div>
<div class="modal primary fade" id="modalKontes">

    <!-- Modal dialog -->
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal header -->
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Rincian Pengguna</h4>
            </div>
            <!-- /Modal header -->

            <!-- Modal body -->
            <div class="modal-body">

                <div class="text-center" style="width: 150px;height: auto   ;margin:0 auto;">
                    <p id="foto" align="center"></p>
                </div>
                <h3 class="text-center" id="nama"></h3>
                <table class="table table-striped table-bordered table-hover">

                    <tr>
                        <td>Tanggal Mulai</td>
                        <td><p align="center">:</p></td>
                        <td><p id="tgl_mulai"></p></td>
                    </tr>
                    <tr>
                        <td>Tanggal Selesai</td>
                        <td><p align="center">:</p></td>
                        <td><p id="tgl_selesai"></p></td>
                    </tr>
                    <tr>
                        <td>Status</td>
                        <td><p align="center">:</p></td>
                        <td><p id="status"></p></td>
                    </tr>
                    <tr>
                        <td>Pemesanan</td>
                        <td><p align="center">:</p></td>
                        <td><p id="pemesanan"></p></td>
                    </tr>
                    <tr>
                        <td>Kuota</td>
                        <td><p align="center">:</p></td>
                        <td><p id="kuota"></p></td>
                    </tr>
                    <tr>
                        <td>Lokasi</td>
                        <td><p align="center">:</p></td>
                        <td><p id="lokasi"></p></td>
                    </tr>
                    <tr>
                        <td>Deskripsi</td>
                        <td><p align="center">:</p></td>
                        <td><p id="deskripsi"></p></td>
                    </tr>
                </table>

            </div>
            <!-- /Modal body -->

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
            <!-- /Modal footer -->

        </div>
    </div>
    <!-- /Modal dialog -->

</div>