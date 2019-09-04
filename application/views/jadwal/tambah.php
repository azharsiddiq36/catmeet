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
                    <form role="form" action="<?= base_url('administrator/pengguna/tambah')?>" method="post">
                        <div class="form-group row">
                            <label class="col-lg-12">Nama</label>
                            <div class="col-lg-8">
                                <input required type="text" name="pengguna_nama" class="form-control" id="exampleInputEmail1" placeholder="Nama">
                                <p class="help-block">Example block-level help text here.</p>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-12" for="exampleInputEmail1">Email address</label>
                            <div class="col-lg-8">
                                <input required type="email" class="form-control" name = "pengguna_email" id="exampleInputEmail1" placeholder="Enter email">
                                <p class="help-block">Example block-level help text here.</p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Password</label>
                            <input type="password" required class="form-control" id="exampleInputPassword1" name = "pengguna_password" placeholder="Password">
                        </div>
                        <div class="form-group">
                            <label for="select2">Hak Akses</label>
                            <select name = "pengguna_hak_akses" id="select2" class="form-control">
                                <option value="0">-Pilih Salah Satu-</option>
                                <option value="administrator">Administrator</option>
                                <option value="pengguna">Pengguna</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="inputPassword3">Jenis Kelamin</label>
                            <div class="radio">
                                <label>
                                    <input type="radio" name="pengguna_jk" id="optionsRadios3" value="l" checked>
                                    Laki-Laki
                                </label>
                            </div>
                            <div class="radio">
                                <label>
                                    <input type="radio" name="pengguna_jk" id="optionsRadios4" value="p">
                                    Perempuan
                                </label>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-12">Nomor</label>
                            <div class="col-lg-8">
                                <input required type="number" class="form-control" name = "pengguna_nomor" id="exampleInputEmail1" placeholder="Nomor Handphone">
                                <p class="help-block">Example block-level help text here.</p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputTextarea1">Alamat</label>
                            <textarea id="inputTextarea1" class="form-control" rows="3" required name="pengguna_alamat"></textarea>
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