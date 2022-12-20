<?php

include '../acc/_config.php';

$gambar = isset($_POST['gambar']);
$nama = isset($_POST['id_user']);
$keterangan = isset($_POST['keterangan']);

//upload dan simpan artikel
$namafile = $_FILES['gambar']['name'];
$tmp_name = $_FILES['gambar']['tmp_name'];

$update = mysqli_query($con, "UPDATE gallery SET  gambar='$namafile', id_user='$_POST[nama]', keterangan='$_POST[keterangan]' WHERE id_gallery ='$_POST[id_gallery]'");
if ($update) { ?>
    <script>
        alert('Data berhasil diubah!')
        location.href = '../page_gallery.php'
    </script>
<?php
} else { ?>
    <script>
        alert('Data Gagal diubah!')
        location.href = '../page_gallery.php'
    </script>
<?php } ?>