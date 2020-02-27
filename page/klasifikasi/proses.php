<?php

// include('inc/config.php');

 if(isset($_POST['import'])){ // Jika user mengklik tombol Import
	$nama_file_baru = 'data.xlsx';

	// Load librari PHPExcel nya
	include('PHPExcel/PHPExcel.php');

	$excelreader = new PHPExcel_Reader_Excel2007();
	$loadexcel = $excelreader->load('import/'.$nama_file_baru); // Load file excel yang tadi diupload ke folder tmp
	$sheet = $loadexcel->getActiveSheet()->toArray(null, true, true ,true);

	$numrow = 1;
	foreach($sheet as $row){
		// Ambil data pada excel sesuai Kolom
		$no_kla = $row['A']; // Ambil data NIS
		$uraian = $row['B']; // Ambil data nama

		// Cek jika semua data tidak diisi
		if($no_kla == "" && $uraian == "")
			continue; // Lewat data pada baris ini (masuk ke looping selanjutnya / baris selanjutnya)

		// Cek $numrow apakah lebih dari 1
		// Artinya karena baris pertama adalah nama-nama kolom
		// Jadi dilewat saja, tidak usah diimport
		if($numrow > 1){
			// Buat query Insert
			$query = "INSERT INTO tb_kla VALUES('".$no_kla."','".$uraian."')";

			// Eksekusi $query
			mysqli_query($conn, $query);
		}

		$numrow++; // Tambah 1 setiap kali looping
	}
}

header('location:?page=klasifikasi'); // Redirect ke halaman awal
?>
