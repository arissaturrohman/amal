<!-- Content -->
		<div style="padding: 0 15px;">
			<!-- Buat sebuah tombol Cancel untuk kemabli ke halaman awal / view data -->

      <div class="row">
        <div class="col-sm">
          <h3 class="float-left">Form Import Data</h3>
          <a href="?page=klasifikasi" class="btn btn-danger float-sm-right">
            <span class="fa fa-times"></span> Cancel
          </a>
        </div>
      </div>
			<hr>

			<!-- Buat sebuah tag form dan arahkan action nya ke file ini lagi -->
			<form method="POST" action="" enctype="multipart/form-data">
				<a href="import/Format.xlsx" class="btn btn-default">
					<span class="fa fa-cloud-download-alt"></span>
					Download Format
				</a><br><br>

				<input type="file" name="file" accept=".xls,.xlsx" class="pull-left">

				<button type="submit" name="import" class="btn btn-success btn-sm">
					<span class="fa fa-cloud-upload-alt"></span> Import
				</button>
			</form>

			<hr>



<!-- proses import -->

<?php
// $conn = mysqli_connect("localhost","root","test","phpsamples");
// require_once('vendor/php-excel-reader/excel_reader2.php');
// require_once('vendor/SpreadsheetReader.php');

if (isset($_POST["import"]))
{

  $allowedFileType = ['application/vnd.ms-excel','text/xls','text/xlsx','application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'];

  if(in_array($_FILES["file"]["type"],$allowedFileType)){

        $targetPath = 'import/'.$_FILES['file']['name'];
        move_uploaded_file($_FILES['file']['tmp_name'], $targetPath);

        $Reader = new SpreadsheetReader($targetPath);

        $sheetCount = count($Reader->sheets());

        for($i=0;$i<$sheetCount;$i++)
        {
            $Reader->ChangeSheet($i);

            foreach ($Reader as $Row)
            {

                $name = "";
                if(isset($Row[0])) {
                    $name = mysqli_real_escape_string($conn,$Row[0]);
                }

                $description = "";
                if(isset($Row[1])) {
                    $description = mysqli_real_escape_string($conn,$Row[1]);
                }

                if (!empty($name) || !empty($description)) {
                    $query = "INSERT INTO tb_kla(no_kla,uraian) values('".$name."','".$description."')";
                    $result = mysqli_query($conn, $query);

                    if (! empty($result)) {
                        $type = "success";
                        $message = "Excel Data Imported into the Database";
                        if ($sql) {
                          ?>
                          <script type="text/javascript">
                            alert("Data berhasil ditambahkan..!");
                            window.location.href="?page=klasifikasi";
                          </script>
                          <?php

                    } else {
                        $type = "error";
                        $message = "Problem in Importing Excel Data";
                    }
                  }
                }
             }

         }
  }
  else
  {
        $type = "error";
        $message = "Invalid File Type. Upload Excel File.";
  }
}
?>
