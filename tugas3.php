<?php
// TUGAS
// buatlah daftar mahasiswa dan nilai
// 1. Keterangan => ternary minimal nilai 65 dinyatakan lulus
// 2. Grade if multi kondisi => A,B,C,D
// 3. Predikat switch case dari grade => Memuaskan, Bagus, Cukup, Kurang, Buruk
// 4. Buatlah agregat nilai dan gunakan agregat function di array serta tampilkan hasilnya pada
// hasil => tfoot terdiri dari nilai tertinggi, terendah, rata-rata, jumlah mahasiswa, jumlah keseluruhan nilai jika digabungkan
$mhs1 = ['Nama' => 'Alif Wijaya', 'NIM' => '20240001', 'Nilai' => 95];
$mhs2 = ['Nama' => 'Bunga Citra', 'NIM' => '20240002', 'Nilai' => 80];
$mhs3 = ['Nama' => 'Christian Dior', 'NIM' => '20240003', 'Nilai' => 78];
$mhs4 = ['Nama' => 'Dewi Ratnasari', 'NIM' => '20240004', 'Nilai' => 76];
$mhs5 = ['Nama' => 'Eko Putra', 'NIM' => '20240005', 'Nilai' => 86];
$mhs6 = ['Nama' => 'Faris Hanafi', 'NIM' => '20240006', 'Nilai' => 50];
$mhs7 = ['Nama' => 'Guntur Siregar', 'NIM' => '20240007', 'Nilai' => 20];
$mhs8 = ['Nama' => 'Hadi Gunawan', 'NIM' => '20240008', 'Nilai' => 30];
$mhs9 = ['Nama' => 'Indah Permatasari', 'NIM' => '20240009', 'Nilai' => 70];
$mhs10 = ['Nama' => 'Jelita Putri', 'NIM' => '20240010', 'Nilai' => 65];

$ar_mhs = [$mhs1, $mhs2, $mhs3, $mhs4, $mhs5, $mhs6, $mhs7, $mhs8, $mhs9, $mhs10];

$ar_judul = ['No', 'Nama Mahasiswa', 'NIM', 'Nilai', 'Keterangan', 'Grade', 'Predikat'];


// agregat nilai function di array
$jumlah_nilai = array_column($ar_mhs, 'Nilai');
$total_nilai = array_sum($jumlah_nilai);
$jumlah_mhs = count($ar_mhs);
$nilai_tertinggi = max($jumlah_nilai,);
$nilai_terendah = min($jumlah_nilai);
$nilai_ratarata = $total_nilai / $jumlah_mhs;

$agregat = [

    'Nilai Tertinggi' => $nilai_tertinggi,
    'Nilai Terendah' => $nilai_terendah,
    'Nilai Rata Rata' => $nilai_ratarata,
    'Jumlah Mahasiswa' => $jumlah_mhs,
    'Jumlah Nilai' => $total_nilai,
];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabel Mahasiswa</title>
</head>

<body>
    <h2 align='center'>Daftar Nilai Mahasiswa</h2>
    <table border=1 cellspacing='1' cellpadding='5' width="75%" align="center">
        <thead style="background-color: #a2d2df">
            <tr>
                <?php
                foreach ($ar_judul as $judul) {
                ?>
                    <th><?= $judul ?></th>
                <?php
                }
                ?>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            foreach ($ar_mhs as $mhs) {
                // ternary minimal nilai 65 dinyatakan lulus
                $keterangan = ($mhs['Nilai'] >= 65) ? 'Lulus' : 'Gagal';

                // if multi kondisi
                if ($mhs['Nilai'] >= 85 && $mhs['Nilai'] <= 100) $grade = 'A';
                else if ($mhs['Nilai'] >= 75 && $mhs['Nilai'] <= 85) $grade = 'B';
                else if ($mhs['Nilai'] >= 60 && $mhs['Nilai'] <= 75) $grade = 'C';
                else if ($mhs['Nilai'] >= 30 && $mhs['Nilai'] <= 60) $grade = 'D';
                else if ($mhs['Nilai'] >= 0 && $mhs['Nilai'] <= 30) $grade = 'E';
                else $grade = '';

                // switch case predikat
                switch ($grade) {
                    case 'A':
                        $predikat = 'Memuaskan';
                        break;
                    case 'B':
                        $predikat = 'Bagus';
                        break;
                    case 'C':
                        $predikat = 'Cukup';
                        break;
                    case 'D':
                        $predikat = 'Kurang';
                        break;
                    case 'E':
                        $predikat = 'Buruk';
                        break;
                    default:
                        $predikat = '';
                }
            ?>
                <!-- panggil output atau isi data -->
                <tr align="center">
                    <td style="background-color: #fbfcd5; font-weight: bold;"><?= $no++; ?></td>
                    <td><?= $mhs['Nama']; ?></td>
                    <td><?= $mhs['NIM']; ?></td>
                    <td><?= $mhs['Nilai']; ?></td>
                    <td><?= $keterangan; ?></td>
                    <td><?= $grade; ?></td>
                    <td><?= $predikat; ?></td>
                </tr>
            <?php
            }
            ?>
        </tbody>
        <tfoot>
            <?php
            foreach ($agregat as $agg => $hasil) {
            ?>
                <tr style="font-weight:bold">
                    <td bgcolor="#ffbf00" colspan="3" align="right"><?= $agg; ?></td>
                    <td bgcolor="#ffbf00" colspan="5" align="center"><?= $hasil; ?></td>
                </tr>
            <?php
            }
            ?>
        </tfoot>

    </table>

</body>

</html>