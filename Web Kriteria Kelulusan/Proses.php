<?php
$nama = $_POST['nama'];
$nisn = $_POST['nisn'];
$indo = $_POST['indo'];
$inggris = $_POST['inggris'];
$mtk = $_POST['mtk'];
$ipas = $_POST['ipas'];
$dk = $_POST['dk'];

$kkm = 75;

$rata = ($indo + $inggris + $mtk + $ipas + $dk) / 5;

$alasan = "";

$jumlah_bawah = 0;

if ($indo < $kkm)
    $jumlah_bawah++;
if ($inggris < $kkm)
    $jumlah_bawah++;
if ($mtk < $kkm)
    $jumlah_bawah++;
if ($ipas < $kkm)
    $jumlah_bawah++;
if ($dk < $kkm)
    $jumlah_bawah++;

if ($jumlah_bawah > 0) {
    $status = "TIDAK LULUS";

    if ($jumlah_bawah == 1) {
        $alasan = "Siswa memiliki satu nilai di bawah KKM";
    } else {
        $alasan = "Siswa memiliki beberapa nilai di bawah KKM";
    }
} else {
    if ($rata >= $kkm) {
        $status = "LULUS";
        $alasan = "Siswa memenuhi semua kriteria kelulusan";
    } else {
        $status = "TIDAK LULUS";
        $alasan = "Rata-rata nilai di bawah KKM";
    }
}

header(
    "Location: hasil.html?nama=$nama&nisn=$nisn&indo=$indo&inggris=$inggris&mtk=$mtk&ipas=$ipas&dk=$dk&rata=$rata&status=$status&alasan=$alasan"
);
exit;
?>