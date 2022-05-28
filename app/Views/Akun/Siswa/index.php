<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Akun</title>

    <style>
        li {
            list-style: none;
        }

        fieldset {
            margin: 10px;
        }
    </style>
</head>

<body>
    <h1>Akun Terdaftar</h1>

    <!-- Ini memanggil controller Siswa::create -->
    <p><a href="/siswa/create">Tambah Akun</a></p>

    <?php foreach ($siswa as $data) : ?>
        <fieldset>
            <li>Nama Lengkap : <?= $data['nama']; ?>
                Username : <?= $data['username']; ?>
                Password : <?= $data['password']; ?></li>
            <br /><br />

            <p>
                <!-- Ini memanggil controller Siswa::delete -->
                <a href="/siswa/delete/<?= $data['id']; ?>"> Hapus </a> |
                <!-- Ini memanggil controller Siswa::edit -->
                <a href="/siswa/edit/<?= $data['id']; ?>"> Edit </a>
            </p>

        </fieldset>
    <?php endforeach ?>
</body>

</html>