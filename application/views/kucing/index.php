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