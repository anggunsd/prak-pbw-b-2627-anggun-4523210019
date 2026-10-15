<h2>Data Mahasiswa</h2>

<table border="1" cellpadding="5">
    <tr>
        <th>NIM</th>
        <th>Nama</th>
        <th>Email</th>
        <th>Prodi</th>
        <th>Angkatan</th>
        <th>IPK</th>
    </tr>

    <?php if (isset($dataMahasiswa) && $dataMahasiswa instanceof mysqli_result) { ?>

        <?php if (mysqli_num_rows($dataMahasiswa) > 0) { ?>

            <?php while ($mhs = mysqli_fetch_assoc($dataMahasiswa)) { ?>
                <tr>
                    <td><?= htmlspecialchars($mhs['nim']); ?></td>
                    <td><?= htmlspecialchars($mhs['nama']); ?></td>
                    <td><?= htmlspecialchars($mhs['email']); ?></td>
                    <td><?= htmlspecialchars($mhs['prodi']); ?></td>
                    <td><?= htmlspecialchars($mhs['angkatan']); ?></td>
                    <td><?= htmlspecialchars($mhs['ipk']); ?></td>
                </tr>
            <?php } ?>

        <?php } else { ?>

            <tr>
                <td colspan="6">Belum ada data mahasiswa.</td>
            </tr>

        <?php } ?>

    <?php } else { ?>

        <tr>
            <td colspan="6">Data mahasiswa belum tersedia.</td>
        </tr>

    <?php } ?>
</table>