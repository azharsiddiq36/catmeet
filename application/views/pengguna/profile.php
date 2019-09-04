<section class="container" role="main">

    <!-- Grid row -->
    <div class="row">

        <!-- Data block -->
        <!-- Data block -->
        <article class="col-sm-12">
            <div class="data-block">
                <header>
                    <h2>Pengaturan Profil Pengguna</h2>
                </header>
                <section>
                    <div class="row">
                        <div class="col-sm-6">
                            <form class="form-horizontal" action="<?= base_url('administrator/profile')?>" enctype="multipart/form-data" role="form">
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Nama</label>
                                    <div class="col-sm-5">
                                        <p class="form-control-static"><?= $data['pengguna_nama']?></p>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Profile avatar</label>
                                        <div class="col-sm-5">
                                            <input type="file" name="pengguna_foto" data-default-file="<?= base_url().'assets/img/upload/'.$data['pengguna_foto']?>" class="dropify" data-height="100">
                                        </div>

                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Nama Lengkap</label>
                                    <div class="col-sm-5">
                                        <input class="form-control" value="<?= $data['pengguna_nama']?>" type="text" placeholder="John Pixel">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">E-mail</label>
                                    <div class="col-sm-5">
                                        <input class="form-control" type="text" placeholder="example@domain.com" value="<?= $data['pengguna_email']?>" readonly>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Nomor</label>
                                    <div class="col-sm-5">
                                        <input class="form-control" value="<?= $data['pengguna_nomor']?>" type="text" placeholder="John Pixel">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Alamat</label>

                                    <div class="col-sm-5">
                                        <textarea class="form-control" id="inputTextarea1" name="pengguna_alamat"><?= $data['pengguna_alamat']?></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-offset-3 col-sm-10">
                                        <button class="btn btn-lg btn-primary" type="submit" name = "submit">Simpan Perubahan</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="col-sm-6">
                            <h4>Ubah Kata Sandi</h4>
                            <p>Mengganti kata sandi secarra berkala akan membuat akun anda lebih aman dan mengurangi resiko <i>hacking</i></p>
                            <form class="form-horizontal" role="form" action="<?= base_url('administrator/ubahpassword')?>">
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Kata Sandi Baru</label>
                                    <div class="col-sm-5">
                                        <input class="form-control" type="password" name="password">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Ulang Kata Sandi</label>
                                    <div class="col-sm-5">
                                        <input class="form-control" type="password" name = "rePassword">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-offset-3 col-sm-10">
                                        <button class="btn btn-lg btn-primary" type="submit">Ubah Kata Sandi</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </section>
                <footer>
                    <p>Etiam sit amet dolor purus. Praesent eu lectus elit, dignissim iaculis libero. In hac habitasse platea dictumst.</p>
                </footer>
            </div>
        </article>
        <!-- /Data block -->

    </div>
    <!-- /Grid row -->

</section>