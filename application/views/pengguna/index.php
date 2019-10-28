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

                        <ul class="data-header-actions">
                            <li><a href="<?= base_url('administrator/pengguna/tambah')?>">Tambah Pengguna</a></li>
                        </ul>
                    </header>
                    <section>
                        <table class="datatable table table-striped table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Hak Akses</th>
                                <th>Nomor</th>
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
                                    <td><?= $key->pengguna_nama?></td>
                                    <td><?= $key->pengguna_email?></td>
                                    <td><?= $key->pengguna_hak_akses?></td>
                                    <td><?= $key->pengguna_nomor?></td>
                                    <td><?php
                                        if ($key->pengguna_status == 'aktif'){
                                            ?>
                                            <span class="label label-success"><?= $key->pengguna_status?></span>
                                        <?php
                                        }
                                        else{
                                            ?>
                                            <span class="label label-danger"><?= $key->pengguna_status?></span>
                                        <?php
                                        }
                                        ?></td>
                                    <td><a class="btn btn-primary detail" data-id = "<?= $key->pengguna_id?>" data-toggle="modal" href="#modalPengguna"><span class="elusive icon-eye-open"></span></a>
                                        <a href="<?= base_url("administrator/pengguna/edit/".$key->pengguna_id)?>" class="btn btn-warning btn-sm"><span class="elusive icon-pencil"></span></a>
                                        <a onclick="return confirm('Apakah anda yakin ingin menonaktifkan akun ini?')" href="<?= base_url("administrator/pengguna/hapus/".$key->pengguna_id)?>"class="btn btn-danger btn-sm"><span class="elusive icon-remove"></span></a></td>
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



            <!-- Modal demo - modal window -->
            <div class="modal primary fade" id="modalPengguna">

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
                                    <td>Email</td>
                                    <td><p align="center">:</p></td>
                                    <td><p id="email"></p></td>
                                </tr>
                                <tr>
                                    <td>Hak Akses</td>
                                    <td><p align="center">:</p></td>
                                    <td><p id="akses"></p></td>
                                </tr>
                                <tr>
                                    <td>Jenis Kelamin</td>
                                    <td><p align="center">:</p></td>
                                    <td><p id="jk"></p></td>
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
                                    <td>Saldo</td>
                                    <td><p align="center">:</p></td>
                                    <td><p id="saldo"></p></td>
                                </tr>
                                <tr>
                                    <td>Tanggal Bergabung</td>
                                    <td><p align="center">:</p></td>
                                    <td><p id="tgl_gabung"></p></td>
                                </tr>
                                <tr>
                                    <td>Status</td>
                                    <td><p align="center">:</p></td>
                                    <td><p id="status"></p></td>
                                </tr>
                                <tr>
                                    <td>Ktp</td>
                                    <td><p align="center">:</p></td>
                                    <td><p id="ktp"></p></td>
                                </tr>
                                <tr>
                                    <td>Wajah</td>
                                    <td><p align="center">:</p></td>
                                    <td><p id="wajah"></p></td>
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
            <!-- /Modal demo - modal window -->
