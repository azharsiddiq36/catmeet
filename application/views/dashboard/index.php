<section class="container" role="main">

    <!-- Grid row -->
    <div class="row">

        <!-- Multi-level scaffolding example -->
        <div class="col-sm-8">
            <div class="row">
                <!-- Widget block -->
                <div class="col-sm-3 col-xs-6">
                    <a class="data-block widget-block" href="<?= base_url('sendmail')?>">
                        <span class="widget-icon elusive icon-address-book-alt"></span>
                        <strong>Kirim Email</strong>
                    </a>
                </div>
            <!-- Grid row -->
            <div class="row">
                <!-- Widget block -->
                <div class="col-sm-3 col-xs-6">
                    <a class="data-block widget-block" href="<?= base_url('administrator/pengguna')?>">
                        <span class="widget-icon elusive icon-address-book-alt"></span>
                        <strong>Pengguna</strong>
                    </a>
                </div>
                <!-- /Widget block -->

                <!-- Widget block -->
                <div class="col-sm-3 col-xs-6">
                    <a class="data-block widget-block" href="<?= base_url("administrator/kategori")?>">
                        <span class="widget-icon elusive icon-file-new-alt"></span>
                        <strong>Kategori</strong>
                    </a>
                </div>
                <!-- /Widget block -->



                <!-- Widget block -->
                <div class="col-sm-3 col-xs-6">
                    <a class="data-block widget-block" href="<?= base_url("administrator/postingan")?>">
                        <span class="badge">3</span>
                        <span class="widget-icon elusive icon-globe-alt"></span>
                        <strong>Postingan</strong>
                    </a>
                </div>
                <!-- /Widget block -->

                <!-- Widget block -->
                <div class="col-sm-3 col-xs-6">
                    <a class="data-block widget-block" href="<?= base_url("administrator/kucing")?>">
                        <span class="widget-icon elusive icon-github"></span>
                        <strong>Kucing</strong>
                    </a>
                </div>
                <!-- /Widget block -->
                <!-- Widget block -->
                <div class="col-sm-3 col-xs-6">
                    <a class="data-block widget-block" href="<?= base_url("administrator/toko")?>">
                        <span class="widget-icon elusive icon-shopping-cart-sign"></span>
                        <strong>Toko (CatShop)</strong>
                    </a>
                </div>
                <!-- /Widget block -->

                <!-- Widget block -->
                <div class="col-sm-3 col-xs-6">
                    <a class="data-block widget-block" href="<?= base_url("administrator/kontes")?>">
                        <span class="widget-icon elusive icon-network"></span>
                        <strong>Kontes</strong>
                    </a>
                </div>
                <!-- /Widget block -->

                <!-- Widget block -->
                <div class="col-sm-3 col-xs-6">
                    <a class="data-block widget-block" href="<?= base_url("administrator/jadwal")?>">
                        <span class="widget-icon elusive icon-calendar"></span>
                        <strong>Jadwal</strong>
                    </a>
                </div>
                <!-- /Widget block -->
                <div class="col-sm-3 col-xs-6">
                    <a class="data-block widget-block" href="<?= base_url("administrator/profile")?>">
                        <span class="widget-icon elusive icon-wrench"></span>
                        <strong>Pengaturan</strong>
                    </a>
                </div>
            </div>
            <!-- /Grid row -->

        </div>
        <!-- /Multi-level scaffolding example -->

        <!-- Data block with TODO list widget -->
        <div class="col-sm-4">
            <div class="data-block todo-block">
                <header>
                    <h2><span class="elusive icon-folder-open"></span> My TODO list</h2>
                </header>
                <section>
                    <form>
                        <table class="table">
                            <tbody>
                            <tr class="done">
                                <td><input type="checkbox" value="done" checked></td>
                                <td>
                                    <p>doItNow(); does not work as expected</p>
                                    <span>completed <time>Apr 12</time></span>
                                </td>
                            </tr>
                            <tr>
                                <td><input type="checkbox" value="done"></td>
                                <td>
                                    <p>buy some more socks</p>
                                    <span>due <time>Apr 12</time></span>
                                </td>
                            </tr>
                            <tr>
                                <td><input type="checkbox" value="done"></td>
                                <td>
                                    <p><span class="label label-danger">Important</span> meeting at 10:30 am</p>
                                    <span>due <time>Apr 12</time></span>
                                </td>
                            </tr>
                            <tr>
                                <td><input type="checkbox" value="done"></td>
                                <td>
                                    <p>take out the trash</p>
                                    <span>due <time>Apr 17</time></span>
                                </td>
                            </tr>
                            <tr>
                                <td><input type="checkbox" value="done"></td>
                                <td>
                                    <p><span class="label label-success">Party</span> Eric birthday</p>
                                    <span>due <time>Apr 22</time></span>
                                </td>
                            </tr>
                            <tr>
                                <td><input type="checkbox" value="done"></td>
                                <td>
                                    <p>team meeting</p>
                                    <span>due <time>May 22</time></span>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </form>
                </section>
            </div>
        </div>
        <!-- /Data block with TODO list widget -->

    </div>

</section>