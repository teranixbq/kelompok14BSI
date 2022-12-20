<?php
include '../acc/_config.php';
$id_kategori = $_GET['id_artikel'];
$delete = mysqli_query($con, "DELETE FROM artikel WHERE id_artikel= $id_kategori");

if ($delete) { ?>
    <script>
        alert('Data berhasil dihapus!')
        location.href = '../page_artikel.php'
    </script>
<?php
} else { ?>
    <script>
        alert('Data Gagal dihapus!')
        location.href = '../page_artikel.php'
    </script>
<?php } ?>