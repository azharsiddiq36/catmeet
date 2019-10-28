$(document).ready(function () {
    $('.detail').click(function (event) {
        var local = window.location.origin + '/anabul/';
        var url = local + "detail_pengguna";
        var data = $(this).data('id');
        $.ajax({
            url: url,
            type: 'ajax',
            dataType: 'json',
            method: 'POST',
            async: true,
            data: {"pengguna_id": data},
            success: function (response) {
                    if (response['status'] == 'sudah'){
                        $('#ktp').html("<a href='"+local+"assets/img/upload/"+response['data'].data_diri_foto_ktp+"' data-toggle='lightbox' data-gallery='gallery' class='col-md-4'>Lihat Ktp</a>");
                        $('#wajah').html("<a href='"+local+"assets/img/upload/"+response['data'].data_diri_foto_pengguna+"' data-toggle='lightbox' data-gallery='gallery' class='col-md-4'>Lihat Foto</a>");
                    }
                    else{
                        $('#ktp').html("<span class='label label-warning'>Belum Melengkapi Data Diri</span>");
                        $('#wajah').html("<span class='label label-warning'>Belum Melengkapi Data Diri</span>");
                    }
                    $('#nomor').html(response['data'].pengguna_nomor);
                    $('#foto').html("<img class = 'img-rounded' style='width: 100%;height: auto;' src='"+local+"/assets/img/upload/"+response['data'].pengguna_foto+"'>");
                    $('#nama').html(response['data'].pengguna_nama);
                    $('#email').html(response['data'].pengguna_email);
                    $('#akses').html(response['data'].pengguna_hak_akses);
                    //cek status
                    if (response['data'].pengguna_status == 'aktif'){
                        $('#status').html("<span class='label label-success'>Aktif</span>");
                    }
                    else{
                        $('#status').html("<span class='label label-danger'>NonAktif</span>");
                    }
                    //cek jk
                    if (response['data'].pengguna_jenis_kelamin == 'l'){
                        $('#jk').html("Laki-Laki");
                    }
                    else{
                        $('#jk').html("Perempuan");
                    }
                    $('#alamat').html(response['data'].pengguna_alamat);
                    $('#tgl_gabung').html(response['data'].pengguna_tgl_buat);
                    $('#saldo').html(response['data']  .pengguna_saldo);
            },
            error: function (data) {

            }
        });
    });
    $('#detailKontes').click(function (event) {
        var local = window.location.origin + '/anabul/';
        var url = local + "detail_kontes";
        var data = $(this).data('id');
        $.ajax({
            url: url,
            type: 'ajax',
            dataType: 'json',
            method: 'POST',
            async: true,
            data: {"kontes_id": data},
            success: function (response) {
                console.log(response);
                $('#penyelenggara').html(response['data'].pengguna_nama);
                $('#kuota').html(response['data'].kontes_kuota);
                $('#deskripsi').html(response['data'].kontes_details);
                $('#pemesanan').html(response['data'].kontes_jumlah_pemesan);
                $('#tgl_mulai').html(response['data'].kontes_tanggal_mulai);
                $('#tgl_selesai').html(response['data'].kontes_tanggal_selesai);
                $('#foto').html("<img class = 'img-rounded' style='width: 100%;height: auto;' src='"+local+"/assets/img/upload/"+response['data'].kontes_foto+"'>");
                $('#nama').html(response['data'].kontes_nama);
                //cek status
                if (response['data'].kontes_status == 'disetujui'){
                    $('#status').html("<span class='label label-primary'>Disetujui</span>");
                }
                else if (response['data'].kontes_status == 'menunggu'){
                    $('#status').html("<span class='label label-warning'>Menunggu</span>");
                }
                else if (response['data'].kontes_status == 'selesai'){
                    $('#status').html("<span class='label label-success'>Selesai</span>");
                }
                else{
                    $('#status').html("<span class='label label-danger'>Ditolak</span>");
                }

            },
            error: function (data) {

            }
        });
    });
    $('#detailToko').click(function (event) {
        var local = window.location.origin + '/anabul/';
        var url = local + "detail_toko";
        var data = $(this).data('id');
        $.ajax({
            url: url,
            type: 'ajax',
            dataType: 'json',
            method: 'POST',
            async: true,
            data: {"toko_id": data},
            success: function (response) {
                $('#nomor').html(response['data'].toko_nomor);
                $('#foto').html("<img class = 'img-rounded' style='width: 100%;height: auto;' src='"+local+"/assets/img/upload/"+response['data'].toko_foto+"'>");
                $('#nama').html(response['data'].toko_nama);
                //cek status
                if (response['data'].toko_status == 'aktif'){
                    $('#status').html("<span class='label label-success'>Aktif</span>");
                }
                else{
                    $('#status').html("<span class='label label-danger'>NonAktif</span>");
                }
                $('#pemilik').html(response['data'].pengguna_nama);
                $('#lokasi').html(response['data'].toko_lokasi);
                $('#deskripsi').html(response['data'].toko_deskripsi);
                $('#alamat').html(response['data'].toko_alamat);
                $('#tgl_pengajuan').html(response['data'].toko_tanggal_pengajuan);
            },
            error: function (data) {

            }
        });
    });
    $('#detailKomentar').click(function (event) {
        var local = window.location.origin + '/anabul/';
        var url = local + "detail_komentar";
        var data = $(this).data('id');
        $.ajax({
            url: url,
            type: 'ajax',
            dataType: 'json',
            method: 'POST',
            async: true,
            data: {"postingan_id": data},
            success: function (response) {
                var data = "";
                for (var i = 0; i < response.length; i++) {
                    data +=
                        "<tr class='odd gradeX'>" +
                        "<td>" + (i + 1) + "</td>" +
                        "<td>" + response[i]['pengguna_nama'] + "</td>" +
                        "<td>" + response[i]['komentar_tanggal'] + "</td>" +
                        "<td>" + response[i]['komentar_deskripsi'] + "</td>"+
                        "<tr>";
                }
                $('#tabelKomentar').html("" + data);
            },
            error: function (data) {

            }
        });
    });
    $('#detailReport').click(function (event) {
        var local = window.location.origin + '/anabul/';
        var url = local + "detail_report";
        var data = $(this).data('id');
        $.ajax({
            url: url,
            type: 'ajax',
            dataType: 'json',
            method: 'POST',
            async: true,
            data: {"postingan_id": data},
            success: function (response) {
                var data = "";
                for (var i = 0; i < response.length; i++) {
                    data +=
                        "<tr class='odd gradeX'>" +
                        "<td>" + (i + 1) + "</td>" +
                        "<td>" + response[i]['pengguna_nama'] + "</td>" +
                        "<td>" + response[i]['report_tanggal'] + "</td>" +
                        "<td>" + response[i]['report_alasan'] + "</td>"+
                        "<tr>";
                }
                $('#tabelReport').html("" + data);
            },
            error: function (data) {

            }
        });
    });
    $('.auto-hide').delay(3000).fadeOut("slow", function () { // first animation delayed 10 secs
    });
    $('.dropify').dropify({
        messages: {
            default: 'Drag atau drop untuk memilih gambar',
            replace: 'Ganti',
            remove: 'Hapus',
            error: 'error'
        }
    });

});
    $(document).ready(function () {
//    var local = window.location.origin+'/anabul/';

        var url = "https://api.thecatapi.com/v1/breeds";
        $.ajax({
            url: url,
            headers: {"X-Api-Key": "983e61f8-8451-441c-bc89-2892e634c290"},
            type: 'GET',
            dataType: 'json',
            success: function (response) {

                var data = "";
                var hasil = [];
                for (var i = 0; i < response.length; i++) {
                    data +=
                        "<tr class='odd gradeX'>" +
                        "<td>" + (i + 1) + "</td>" +
                        "<td>" + response[i]['id'] + "</td>" +
                        "<td>" + response[i]['name'] + "</td>" +
                        "<td>" + response[i]['temperament'] + "</td>" +
                        "<td>" + response[i]['life_span'] + "</td>" +
                        "<td>" + response[i]['description'] + "</td>" +
                        "<td><a href='" + response[i]['wikipedia_url'] + "'>" + response[i]['wikipedia_url'] + "</a></td>" +
                        "<td>" + response[i]['weight']['imperial'] + "</td>" +
                        "<td>" + response[i]['origin'] + "</td>" +
                        "<tr>";
                }

                $('#listKucing').html("" + data);
            },
            error: function () {

            }

        });
    });

