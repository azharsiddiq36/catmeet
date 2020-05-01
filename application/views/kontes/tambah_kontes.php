<section class="container" role="main">

    <!-- Grid row -->
    <div class="row">
        <article class="col-sm-9">
            <div class="dark data-block">
                <header>
                    <h2><span class="elusive icon-check"></span> <?= $title ?></h2>
                </header>
                <section>
                    <?php if ($this->session->flashdata('msg')) {
                        ?>
                        <div class="alert alert-warning" role="alert">
                            <strong>Maaf !</strong> <?= $this->session->flashdata('msg') ?>
                        </div>
                        <?php
                    } ?>
                    <!-- Form validation demo -->
                    <form role="form" action="<?= base_url('administrator/kontes/tambah') ?>" enctype="multipart/form-data" method="post">
                        <div class="form-group row">
                            <label class="col-lg-12">Nama</label>
                            <div class="col-lg-8">
                                <input required type="text" name="kontes_nama" class="form-control"
                                       id="exampleInputEmail1" placeholder="Nama">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputTextarea1">Deskripsi</label>
                            <textarea id="inputTextarea1" class="form-control" rows="3" required name="description"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="inputTextarea1">Syarat & Ketentuan</label>
                            <textarea id="inputTextarea1" class="form-control" rows="3" required name="details"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="select2">Jenis</label>
                            <select name="kontes_jenis" id="select2" class="form-control">
                                <option value="0">-Pilih Salah Satu-</option>
                                <?php
                                foreach ($jenis->result_array() as $j) {
                                    ?>
                                    <option value="<?= $j['jenis_kontes_id'] ?>"><?= $j['jenis_kontes_nama'] ?></option>

                                    <?php
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Provinsi</label>
                            <select name="provinsi" id="provinsi" class="form-control">
                                <option value="0">-Pilih Salah Satu-</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="select2">Kabupaten</label>
                            <select name="kabupaten" id="kabupaten" class="form-control">
                                <option value="0">-Pilih Salah Satu-</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="select2">Kecamatan</label>
                            <select name="kecamatan" id="kecamatan" class="form-control">
                                <option value="0">-Pilih Salah Satu-</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="select2">Desa</label>
                            <select name="desa" id="desa" class="form-control">
                                <option value="0">-Pilih Salah Satu-</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="inputTextarea1">Alamat</label>
                            <textarea id="inputTextarea1" class="form-control" rows="3" required name="lokasi"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Foto</label>
                            <input type="file" name="foto" class="dropify" data-height="200">

                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Kuota</label>
                            <input type="number" required class="form-control" id="exampleInputPassword1" name="kuota"
                                   placeholder="Kuota">
                        </div>
                        <div class="form-group">
                            <label for="select2">Tanggal Mulai</label>
                            <input type="date" required class="form-control" id="exampleInputPassword1" name="tanggal"
                                   placeholder="Password">
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-12">Durasi(Hari)</label>
                            <div class="col-lg-8">
                                <input required type="number" class="form-control" name="durasi" id="exampleInputEmail1"
                                       placeholder="Durasi">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputTextarea1">Biaya Tiket</label>
                            <input required type="number" class="form-control" name="biaya" id="exampleInputEmail1"
                                   placeholder="Biaya">
                        </div>
                        <div class="form-group">
                            <label for="inputTextarea1">Nomor Penyelenggara</label>
                            <input required type="text" class="form-control" name="nomor" id="exampleInputEmail1"
                                   placeholder="nomor">
                        </div>
                        <div id="valprov">

                        </div>
                        <div id="valkab">

                        </div>
                        <div id="valkec">

                        </div>
                        <div id="valdes">

                        </div>
                        <button type="submit" name='submit' class="btn btn-lg btn-default">Submit</button>
                    </form>
                    <!-- /Form validation demo -->

                </section>
            </div>
        </article>

        <!-- Data block -->
    </div>
</section>