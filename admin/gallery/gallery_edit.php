<?php include '../_header.php';?>
<link rel="stylesheet" href="../assets/style.css">
<!-- content -->
<div class="container mt-5">
    <div class="card im-box">
        <h5 class="card-header">Udah Data Gallery</h5>
        <div class="card-body">
            <h5 class="card-title">Form Edit Gallery</h5>

            <?php
            $id_gallery = $_GET['id_gallery'];
            $gambar = isset($_GET['gambar']);
            $nama = isset($_GET['id_user']);
            $keterangan = isset($_GET['keterangan']);

            $data = mysqli_query($con, "SELECT * FROM gallery WHERE id_gallery = '$id_gallery'");

            $row = mysqli_fetch_array($data); ?>
            <form action="gallery_proses_edit.php" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <input type="hidden" name="id_gallery" class="form-control" value="<?= $row['id_gallery'] ?>">
                    <div class="form-group">
                        <label for="">Gambar</label><br>
                        <img src="<?= "../img_artikel/" . $row['gambar'] ?>" width="70" height="70">
                        <input name="gambar" type="file" id="gambar" class="form-control" />
                    </div>
                    <div class="form-group">
                        <label for="">Nama</label>
                        <select name="nama" class="form-control">
                            <?php
                            $tampil = mysqli_query($con, "SELECT * FROM user ORDER BY nama_user");
                            if ($row['nama_user'] == 0) {
                                echo "<option value=0 selected>- Pilih Nama -</option>";
                          
                            }

                            while ($edit = mysqli_fetch_array($tampil)) {
                                if ($row['id_user'] == $edit['id_user']) {
                                    echo "<option value=$edit[id_user] selected>$edit[nama_user]</option>";
                                } else {
                                    echo "<option value=$edit[id_user]>$edit[nama_user]</option>";
                                }
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                    <label for="">Keterangan</label>
                        <textarea rows="10" cols="100" name="keterangan" class="form-control" required></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <button type="submit" name="update" class="btn btn-primary ">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- ./content -->
<?php include '../acc/_footer.php'; ?>