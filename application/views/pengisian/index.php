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
                                <th>Tanggal</th>
                                <th>Jumlah</th>
                                <th>Bukti</th>
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
                                    <td><?= date_indo($key->pengisian_tanggal) ?></td>
                                    <td>Rp. <?= $key->pengisian_jumlah ?></td>
                                    <td><img src="<?= base_url()?>assets/img/upload/<?= $key->pengisian_bukti?>" width="60px" height="60px" alt="<?= base_url()?>" style="width: 120px;" class="avatar rounded-circle d-block mx-auto"></td>
                                    <td><?php
                                        if ($key->pengisian_status == 'diterima') {
                                            ?>
                                            <span class="label label-success"><?= $key->pengisian_status ?></span>
                                            <?php
                                        } else if ($key->pengisian_status == 'menunggu') {
                                            ?>
                                            <span class="label label-warning"><?= $key->pengisian_status ?></span>
                                            <?php
                                        } else if ($key->pengisian_status == 'ditolak') {
                                            ?>
                                            <span class="label label-danger"><?= $key->pengisian_status ?></span>
                                            <?php
                                        } else {
                                            ?>
                                            <span class="label label-primary"><?= $key->pengisian_status ?></span>
                                            <?php
                                        }

                                        ?></td>
                                    <td>
                                        <a href="<?= base_url("administrator/pengisian/accept/" . $key->pengisian_id) ?>"
                                           onclick="return confirm('Apakah anda yakin ingin Menyetujui pengisian ini?')"
                                           class="btn btn-success btn-sm"><span class="elusive icon-ok"></span></a>
                                        <a onclick="return confirm('Apakah anda yakin ingin Menolak pengisian ini?')"
                                           href="<?= base_url("administrator/pengisian/tolak/" . $key->pengisian_id) ?>"
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