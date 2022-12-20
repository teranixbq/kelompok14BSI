<?php include_once '_header.php'; ?>
<link rel="stylesheet" href="assets/style.css">
<!-- content -->
<div class="container mt-5">
    <div class="card im-box">
        <h5 class="card-header">Gallery</h5>
        <div class="card-body">
            <h5 class="card-title">Data Gallery</h5>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalAdd">
                Tambah Foto/Video
            </button>
            <table class="table table-bordered mt-3">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Gambar</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Keterangan</th>
                </thead>
                <tbody>
                    <?php
                    $i = 1;
                    $data = mysqli_query($con, "SELECT * FROM gallery inner join user on gallery.id_user=user.id_user");
                    foreach ($data as $row) :  ?>
                        <tr>
                            <th scope="row"><?= $i++ ?></th>
                            <td><img src="<?= "img_artikel/" . $row['gambar'] ?>" width="70" height="70"></td>
                            <td><?= $row['nama_user'] ?></td>
                            <td><?= substr($row['keterangan'], 0, 200) . '...' ?></td>
                            <td>

                                <a class="badge badge-success" href="gallery/gallery_edit.php?id_gallery=<?= $row['id_gallery'] ?>">Edit</a>
                                <a class="badge badge-danger" href="gallery/gallery_delete.php?id_gallery=<?= $row['id_gallery'] ?>" onclick="return confirm('Yakin ingin menghapus data ini?')">Delete</a>
                            </td>
                        </tr>
                    <?php endforeach;?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- ./content -->

<!-- Modal Add -->
<div class="modal fade" id="modalAdd" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Foto/Video</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="gallery/gallery_add.php" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="">Gambar</label>
                        <input type="file" name="gambar" class="form-control" required>
                        <label for="">Nama</label>
                        <select name="id_user" class="form-control" required>
                            <option value=0 selected>- Pilih Nama -</option>
                            <?php
                            $tampil = mysqli_query($con, "SELECT * FROM user");
                            foreach ($tampil as $row) : ?>
                                <?php echo "<option value= $row[id_user]>$row[nama_user] </option>"; ?>
                            <?php endforeach;
                            ?>
                        </select>
                        <label for="">Keterangan</label>
                        <textarea rows="15" cols="100" name="keterangan" class="form-control" required></textarea>
                        
                    </div>
                    <div class="form-group">
                        <button type="button" class="btn btn-danger " data-dismiss="modal" onclick="self.history.back()">Close</button>
                        <button type="submit" name="upload" class="btn btn-primary ">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- ./Modal add -->


<?php include 'acc/_footer.php'; ?>