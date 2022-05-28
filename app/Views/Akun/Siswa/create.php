<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi Akun Baru</title>
</head>

<body>
    <h1>Form Registrasi Akun Siswa</h1>

    <fieldset>
        <?= \Config\Services::validation()->listErrors(); ?>

        <!-- Ini memanggil controller Siswa::save -->
        <form action="/siswa/save" method="POST">
            <?= csrf_field() ?>
            <label> Nama Lengkap : </label>
            <br />
            <input type="text" name="nama" size="50" />
            <br />
            <label> Username : </label>
            <br />
            <input type="text" name="username" size="50" />
            <br />
            <label> Password : </label>
            <br />
            <input type="text" name="password" size="50" />
            <br /><br />
            <input type="submit" value="Tambah" />
            <input type="reset" value="Batal" />
        </form>
    </fieldset>
</body>

</html>