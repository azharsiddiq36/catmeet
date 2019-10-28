<section class="container" role="main">

    <!-- Grid row -->
    <div class="row">
        <article class="col-sm-9">
            <div class="dark data-block">
                <header>
                    <h2><span class="elusive icon-check"></span> <?= $title?></h2>
                </header>
                <section>
                    <?php if ($this->session->flashdata('msg')){
                        ?>
                        <div class="alert alert-warning" role="alert">
                            <strong>Maaf !</strong> <?= $this->session->flashdata('msg')?>
                        </div>
                        <?php
                    }?>
                    <!-- Form validation demo -->
                    <form role="form" action="<?= base_url('administrator/informasi/tambah')?>" method="post">
                        <div class="form-group row">
                            <label class="col-lg-12">Nama</label>
                            <div class="col-lg-8">
                                <input required type="text" name="informasi_nama" class="form-control" id="exampleInputEmail1" placeholder="Nama">
                                 
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-12">Jenis Kucing</label>
                            <div class="col-lg-8">
                                <input required type="text" name="informasi_jenis" class="form-control" id="exampleInputEmail1" placeholder="Jenis">
                                 
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-12">Temperamen</label>
                            <div class="col-lg-8">
                                <input required type="text" name="informasi_temperamen" class="form-control" id="exampleInputEmail1" placeholder="Temperamen">
                                 
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-12">Rentang Hidup</label>
                            <div class="col-lg-8">
                                <input required type="text" name="informasi_rentang" class="form-control" id="exampleInputEmail1" placeholder="Rentang">
                                 
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-12">Url</label>
                            <div class="col-lg-8">
                                <input required type="text" name="informasi_url" class="form-control" id="exampleInputEmail1" placeholder="Url">
                                 
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-12">Berat</label>
                            <div class="col-lg-8">
                                <input required type="text" name="informasi_berat" class="form-control" id="exampleInputEmail1" placeholder="Berat">
                                 
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-12">Asal</label>
                            <div class="col-lg-8">
                                <input required type="text" name="informasi_asal" class="form-control" id="exampleInputEmail1" placeholder="Asal">
                                 
                            </div>
                        </div>
                        <div class="form-group row">
                            <legend>Deskripsi</legend>
                            <div class="form-group">
                                <textarea id="textarea-WYSIWYG" class="wysiwyg form-control" name="informasi_deskripsi" rows="8"></textarea>
                            </div>
                        </div>
                        <button type="submit" name = 'submit' class="btn btn-lg btn-default">Submit</button>
                    </form>
                    <!-- /Form validation demo -->

                </section>
            </div>
        </article>

        <!-- Data block -->
    </div>
</section>