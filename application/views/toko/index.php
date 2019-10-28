<div id="wrapper">

    <!-- Main page header -->
    <section class="container" role="main">
        <div class="row">
            <!-- Data block -->
            <?php if ($this->session->flashdata('msg')){
                ?>
                <div class="auto-hide alert alert-success" role="alert">
                    <strong>Selamat !</strong> <?= $this->session->flashdata('msg')?>
                </div>
                <?php
            }?>
            <article class="col-sm-12">
                <div class="dark data-block">
                    <header>
                        <h2><?= $title?></h2>
                    </header>
                    <section>
                        <table class="datatable table table-striped table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Nomor</th>
                                <th>Pemilik</th>
                                <th>Alamat</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $no = 1;
                            foreach ($data as $key){
                                ?>
                                <tr class="odd gradeX">
                                    <td><?= $no?></td>
                                    <td><?= $key->toko_nama?></td>
                                    <td><?= $key->toko_nomor?></td>
                                    <td><?= $key->toko_nama?></td>
                                    <td><?= $key->toko_alamat?></td>
                                    <td><span class="label label-<?php
                                        if ($key->toko_status == 'menunggu'){
                                            echo 'warning';
                                        }else if($key->toko_status == 'aktif'){
                                            echo 'success';
                                        }
                                        else{
                                            echo 'danger';
                                        }
                                        ?>"><?= $key->toko_status?></span></td>
                                    <td><a id="detailToko" class="btn btn-primary" data-id = "<?= $key->toko_id?>" data-toggle="modal" href="#modalToko"><span class="elusive icon-eye-open"></span></a>
                                        <a onclick="return confirm('Apakah anda yakin mengaktifkan toko ini?')" href="<?= base_url("administrator/toko/aktif/".$key->toko_id)?>"class="btn btn-success btn-sm"><span class="elusive icon-ok"></span></a>
                                        <a onclick="return confirm('Apakah anda yakin ingin menutup toko ini?')" href="<?= base_url("administrator/toko/nonaktif/".$key->toko_id)?>"class="btn btn-danger btn-sm"><span class="elusive icon-remove"></span></a></td>
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
<div class="modal primary fade" id="modalToko">

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
                    <tr>
                        <td>Pemilik</td>
                        <td><p align="center">:</p></td>
                        <td><p id="pemilik"></p></td>
                    </tr>
                    <tr>
                        <td>Alamat</td>
                        <td><p align="center">:</p></td>
                        <td><p id="alamat"></p></td>
                    </tr>
                    <tr>
                        <td>Nomor</td>
                        <td><p align="center">:</p></td>
                        <td><p id="nomor"></p></td>
                    </tr>
                    <tr>
                        <td>Tanggal Pengajuan</td>
                        <td><p align="center">:</p></td>
                        <td><p id="tgl_pengajuan"></p></td>
                    </tr>
                    <tr>
                        <td>Deskripsi</td>
                        <td><p align="center">:</p></td>
                        <td><p id="deskripsi"></p></td>
                    </tr>
                    <tr>
                        <td>Lokasi</td>
                        <td><p align="center">:</p></td>
                        <td><p id="lokasi"></p></td>
                    </tr>
                    <tr>
                        <td>Status</td>
                        <td><p align="center">:</p></td>
                        <td><p id="status"></p></td>
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