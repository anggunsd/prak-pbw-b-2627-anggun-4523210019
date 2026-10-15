<?php

require_once __DIR__ . "/koneksi.php";
require_once __DIR__ . "/controllers/MahasiswaControllers.php";

$controller = new MahasiswaController($koneksi);
$controller->index();

?>