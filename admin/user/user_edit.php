<?php include '../_header.php'; ?>
<link rel="stylesheet" href="../assets/style.css">
<!-- content -->
<div class="container mt-5">
    <div class="card im-box">
        <h5 class="card-header">Ubah User</h5>
        <div class="card-body">
            <h5 class="card-title">Form Edit User</h5>
            <?php
            $id_user = $_GET['id_user'];
            $nama = isset($_GET['nama_user']);
            $username = isset($_GET['username']);
            $password = isset($_GET['password']);
            
            $data = mysqli_query($con, "SELECT * FROM user WHERE id_user = '$id_user'");
            $row = mysqli_fetch_array($data); ?>
            <form action="proses_user_edit.php" method="POST">
                <input type="hidden" name="id_user" class="form-control" value="<?= $row['id_user'] ?>">
                <div class="form-group">
                    <label for="">Nama</label>
                    <input type="text" name="nama_user" class="form-control" id="nama_user" value="<?= $row['nama_user']?>">
                    <label for="">User</label>
                    <input type="text" name="username" class="form-control" id="username" value="<?= $row['username']?>">
                    <label for="">Password</label>
                    <input type="text" name="password" class="form-control" id="password" value="<?= $row['password']?>">
                    
                </div>
                <div class="form-group">
                    <button type="submit" name="submit" class="btn btn-primary ">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- ./content -->
<?php include '../acc/_footer.php';
