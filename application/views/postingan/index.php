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

                    </header>
                    <section>
                        <table class="datatable table table-striped table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Pengguna</th>
                                <th>Kategori</th>
                                <th>Tanggal</th>
                                <th>Deskripsi</th>
                                <th>Status</th>
                                <th>Report</th>
                                <th>Komentar</th>
                                <th>Aksi</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $no = 1;
                            foreach ($data as $key) {
                                $report = $this->ReportModel->get_report_join($key->postingan_id)->num_rows();
                                $komentar = $this->KomentarModel->get_komentar_join($key->postingan_id)->num_rows();
                                ?>
                                <tr class="odd gradeX">
                                    <td><?= $no ?></td>
                                    <td><?= $key->pengguna_nama?></td>
                                    <td><?= $key->postingan_kategori ?></td>
                                    <td><?= date_indo(date("Y-m-d",strtotime($key->postingan_tanggal))) ?></td>
                                    <td><?php
                                        if (strlen($key->postingan_deskripsi) < 40) {
                                            echo $key->postingan_deskripsi;
                                        } else {
                                            echo substr($key->postingan_deskripsi, 0, 40) . " <b>.....</b>";
                                        } ?></td>
                                    <td><span class="label <?php if ($key->postingan_status == 'aktif'){ echo 'label-success';}else{ echo 'label-danger';}?>"><?= $key->postingan_status ?></span></td>
                                    <td><a id="detailReport" data-id = "<?= $key->postingan_id?>" data-toggle="modal" href="#modalReport"><?= $report?></a></td>
                                    <td><a id = "detailKomentar" data-id = "<?= $key->postingan_id?>" data-toggle="modal" href="#modalKomentar"><?= $komentar?></a></td>
                                    <td><a href="<?= base_url("administrator/postingan/edit/".$key->postingan_id)?>" class="btn btn-success btn-sm"><span class="elusive icon-check"></span></a>
                                        <a onclick="return confirm('Apakah anda yakin ingin menonaktifkan postingan ini?')" href="<?= base_url("administrator/postingan/hapus/".$key->postingan_id)?>"class="btn btn-danger btn-sm"><span class="elusive icon-remove"></span></a></td>
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
<div class="modal primary fade" id="modalReport">

    <!-- Modal dialog -->
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal header -->
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Rincian Toko</h4>
            </div>
            <!-- /Modal header -->

            <!-- Modal body -->
            <div class="modal-body">

                <div class="text-center" style="width: 150px;height: auto   ;margin:0 auto;">
                    <p id="foto" align="center"></p>
                </div>
                <h3 class="text-center" id="nama"></h3>
                <table class="table table-striped table-bordered table-hover">
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Pengguna</th>
                            <th>Tanggal</th>
                            <th>Alasan</th>
                        </tr>
                        <tbody id="tabelReport">

                        </tbody>
                        </thead>
                    </table>
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
<div class="modal primary fade" id="modalKomentar">

    <!-- Modal dialog -->
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal header -->
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Rincian Toko</h4>
            </div>
            <!-- /Modal header -->

            <!-- Modal body -->
            <div class="modal-body">
                <table class="table table-striped table-bordered table-hover">
                    <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Pengguna</th>
                        <th>Tanggal</th>
                        <th>Deskripsi</th>
                    </tr>
                    <tbody id="tabelKomentar">

                    </tbody>
                    </thead>
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