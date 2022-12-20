<?php
include '../acc/_config.php';
$id_gallery = $_GET['id_gallery'];
$delete = mysqli_query($con, "DELETE FROM gallery WHERE id_gallery= $id_gallery");

if ($delete) { ?>
    <script>
        alert('Data berhasil dihapus!')
        location.href = '../page_gallery.php'
    </script>
<?php
} else { ?>
    <script>
        alert('Data Gagal dihapus!')
        location.href = '../page_gallery.php'
    </script>
<?php } ?>