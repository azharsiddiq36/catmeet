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
                    <form role="form" action="<?= base_url('administrator/kategori/edit/'.$row['kategori_id'])?>" method="post">
                        <div class="form-group row">
                            <label class="col-lg-12">Nama</label>
                            <div class="col-lg-8">
                                <input required type="text" value="<?= $row['kategori_nama']?>" name="kategori_nama" class="form-control" id="exampleInputEmail1" placeholder="Nama">
                                <p class="help-block">Example block-level help text here.</p>
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