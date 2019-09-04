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
                            <li><a href="<?= base_url('administrator/penjadwalan/tambah') ?>">Tambah penjadwalan</a></li>
                        </ul>
                    </header>
                    <section>
                        <table class="datatable table table-striped table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>Deskripsi</th>
                                <th>Tanggal</th>
                                <th>Pengaju</th>
                                <th>Penerima</th>
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
                                    <td><?= $key->penjadwalan_deskripsi ?></td>
                                    <td><?= $key->penjadwalan_tanggal ?></td>
                                    <td><?= $key->penjadwalan_id_pengaju ?></td>
                                    <td><?= $key->penjadwalan_id_penerima ?></td>
                                    <td><?= $key->penjadwalan_status ?></td>
                                    <td><a href="" class="btn btn-primary btn-sm"><span
                                                    class="elusive icon-eye-open"></span></a>
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