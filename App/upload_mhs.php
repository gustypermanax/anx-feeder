<?php
require 'Template/header.php';
require 'Template/sidenav.php';
?>


<div class="container-fluid px-4">
    <h4 class="mt-4">Upload data mahasiswa</h4>

    <div class="card">
        <form method="POST" action="aksi_upload.php" enctype="multipart/form-data">
            <div class="input-group p-3">
                <input type="file" name="excelupload" required="required" class="form-control" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" aria-label="Upload">
                <button class="btn btn-outline-primary" type="submit" name="upload" id="inputGroupFileAddon04">Upload</button>
            </div>
        </form>
    </div>


</div>






<?php
require 'Template/footer.php';
?>