<?php
$con = mysqli_connect('localhost', 'root', '',
'bangkitindonesia');
if (!$con) {
echo 'Gagal terhubung ke database';
die;
}
