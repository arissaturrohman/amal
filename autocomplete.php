<?php
// Set header type konten.
header("Content-Type: application/json; charset=UTF-8");

include("inc/config.php");

// Deklarasi variable keyword buah.
$kla = $_GET["query"];

// Query ke database.
$query  = $conn->query("SELECT * FROM tb_kla WHERE uraian LIKE '%$kla%' ORDER BY uraian DESC");
$result = $query->fetch_all(MYSQLI_ASSOC);

// Format bentuk data untuk autocomplete.
foreach($result as $data) {
    $output['suggestions'][] = [
        'value' => $data['uraian'],
        'uraian'  => $data['uraian']
    ];
}

if (! empty($output)) {
    // Encode ke format JSON.
    echo json_encode($output);
}
