<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Akun Siswa</title>
</head>

<body>
    <h1>Form Edit Akun Siswa</h1>

    <fieldset>
        <?= \Config\Services::validation()->listErrors(); ?>

        <!-- Ini pergi ke Controller Siswa::update -->
        <form action="/siswa/update/<?= $siswa['id']; ?>" method="POST">
            <?= csrf_field() ?>
            <label> Nama Lengkap : </label>
            <br />
            <input type="text" name="nama" size="50" value="<?= $siswa['nama']; ?>" />
            <br />
            <label> Username : </label>
            <br />
            <input type="text" name="username" value="<?= $siswa['username']; ?>" />
            <br />
            <label> Password : </label>
            <br />
            <input type="text" name="password" value="<?= $siswa['password']; ?>" />
            <br /><br />
            <input type="submit" value="Ubah" />
            <input type="reset" value="Batal" />
        </form>
    </fieldset>
</body>

</html>