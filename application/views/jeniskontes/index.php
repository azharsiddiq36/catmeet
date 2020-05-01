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
                            <li><a href="<?= base_url('administrator/jeniskontes/tambah')?>">Tambah Jenis Kontes</a></li>
                        </ul>
                    </header>
                    <section>
                        <table class="datatable table table-striped table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Aksi</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $no = 1;
                            foreach ($data->result_array() as $key){
                                ?>

                                    <td><?= $no?></td>
                                    <td><?= $key['jenis_kontes_nama']?></td>
                                    <td>
                                        <a onclick="return confirm('Apakah anda yakin ingin memperbarui data?')" href="<?= base_url("administrator/jeniskontes/edit/".$key['jenis_kontes_id'])?>"class="btn btn-warning btn-sm"><span class="elusive icon-pencil"></span></a>
                                    <a href="<?= base_url("administrator/jeniskontes/delete/".$key['jenis_kontes_id'])?>" onclick="return confirm('Apakah anda yakin ingin menghapus?')" class="btn btn-danger btn-sm"><span class="elusive icon-remove"></span></a>
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