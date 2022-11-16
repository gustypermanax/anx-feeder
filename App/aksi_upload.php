<?php
error_reporting(0);
require 'Func/db.php';

if (isset($_POST['upload'])) {
    require('spreadsheet-reader-master/php-excel-reader/excel_reader2.php');
    require('spreadsheet-reader-master/SpreadsheetReader.php');
    $target_dir = "upload/" . basename($_FILES['excelupload']['name']);
    move_uploaded_file($_FILES['excelupload']['tmp_name'], $target_dir);

    $reader = new SpreadsheetReader($target_dir);

    $berhasil = 0;
    foreach ($reader as $key => $row) {
        if ($key < 1) continue;
        $nama_mahasiswa     = $row[0];
        $jenis_kelamin   = $row[1];
        $tempat_lahir  = $row[2];
        $tanggal_lahir  = $row[3];
        $id_agama  = $row[4];
        $nik  = $row[5];
        $kewarganegaraan  = $row[6];
        $kelurahan  = $row[7];
        $id_wilayah  = $row[8];
        $penerima_kps  = $row[9];
        $nama_ibu  = $row[10];
        mysqli_query($conn, "INSERT into mahasiswa values('$nama_mahasiswa','$jenis_kelamin','$tempat_lahir','$tanggal_lahir','$id_agama','$nik','$kewarganegaraan','$kelurahan','$id_wilayah','$penerima_kps','$nama_ibu','','','')");
        $berhasil++;
    }
}

echo "
<script>
alert('$berhasil data berhasil diimport ke database');
window.location.href = 'upload_mhs.php';
</script>
";





// $target = basename($_FILES['excelupload']['name']);
// move_uploaded_file($_FILES['excelupload']['tmp_name'], $target);

// echo $target;

// $data = new Spreadsheet_Excel_Reader($_FILES['excelupload']['name'], false);
// $jumlah_baris = $data->rowcount($sheet_index = 0);

// $berhasil = 0;
// for ($i = 2; $i <= $jumlah_baris; $i++) {

//     // menangkap data dan memasukkan ke variabel sesuai dengan kolumnya masing-masing
//     $nama_mahasiswa     = $data->val($i, 1);
//     $jenis_kelamin   = $data->val($i, 2);
//     $tempat_lahir  = $data->val($i, 3);
//     $tanggal_lahir  = $data->val($i, 4);
//     $id_agama  = $data->val($i, 5);
//     $nik  = $data->val($i, 6);
//     $kewarganegaraan  = $data->val($i, 7);
//     $kelurahan  = $data->val($i, 8);
//     $id_wilayah  = $data->val($i, 9);
//     $penerima_kps  = $data->val($i, 10);
//     $nama_ibu  = $data->val($i, 11);

//     if ($nama_mahasiswa != "") {
//         // input data ke database (table data_pegawai)
//         mysqli_query($conn, "INSERT into mahasiswa values('$nama_mahasiswa','$jenis_kelamin','$tempat_lahir','$tanggal_lahir','$id_agama','$nik','$kewarganegaraan','$kelurahan','$id_wilayah','$penerima_kps','$nama_ibu','','','')");
//         $berhasil++;
//     }
// }

// // hapus kembali file .xls yang di upload tadi
// unlink($_FILES['filepegawai']['name']);

// // alihkan halaman ke index.php
// header("location:index.php?berhasil=$berhasil");
