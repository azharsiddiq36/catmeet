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
                        <h2><?= $title?> (Original)</h2>
                        <ul class="data-header-actions">
                            <li><a href="<?= base_url('administrator/informasi/tambah')?>">Tambah Informasi</a></li>
                        </ul>
                    </header>
                    <section>
                        <table class='datatable table table-striped table-bordered table-hover'>
                            <thead>
                            <th>No</th>
                            <th>Id</th>
                            <th>Nama</th>
                            <th>Temperamen</th>
                            <th>Rentang Hidup</th>
                            <th>Deskripsi</th>
                            <th>Wikipedia URL</th>
                            <th>Berat</th>
                            <th>Asal</th>
                            <th>Aksi</th>
                            </thead>
                            <tbody>
                            <?php
                            $no = 1;
                                foreach ($data as $key){
                                    ?>
                                    <td><?= $no++?></td>
                                    <td><?= $key->informasi_id?></td>
                                    <td><?= $key->informasi_nama?></td>
                                    <td><?= $key->informasi_temperamen?></td>
                                    <td><?= $key->informasi_rentang_hidup?></td>
                                    <td><?= $key->informasi_deskripsi?></td>
                                    <td><?= $key->informasi_wikipedia_url?></td>
                                    <td><?= $key->informasi_berat?></td>
                                    <td><?= $key->informasi_asal?></td>
                                    <td>
                                        <a href="<?= base_url("administrator/informasi/edit/".$key->informasi_id)?>" class="btn btn-warning btn-sm"><span class="elusive icon-pencil"></span></a>
                                        <a onclick="return confirm('Apakah anda yakin ingin menonaktifkan akun ini?')" href="<?= base_url("administrator/informasi/hapus/".$key->informasi_id)?>"class="btn btn-danger btn-sm"><span class="elusive icon-remove"></span></a></td>
                            <?php
                                }
                            ?>
                            </tbody>
                        </table>
                    </section>
                </div>
            </article>
            <article class="col-sm-12">
                <div class="dark data-block">
                    <header>
                        <h2><?= $title?> (The Cat Api)</h2>

                    </header>
                    <section>
                        <table class='datatable table table-striped table-bordered table-hover'>
                            <thead>
                            <th>No</th>
                            <th>Id</th>
                            <th>Nama</th>
                            <th>Temperamen</th>
                            <th>Rentang Hidup</th>
                            <th>Deskripsi</th>
                            <th>Wikipedia URL</th>
                            <th>Berat</th>
                            <th>Asal</th>
                            </thead>
                            <tbody id="listKucing">
                            </tbody>
                            </thead>
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