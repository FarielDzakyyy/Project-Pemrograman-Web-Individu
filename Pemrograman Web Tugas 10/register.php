<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulir Pendaftaran</title>
</head> <link rel="stylesheet" href="style.css">
<body>
    <h1>Formulir Pendaftaran</h1>
    <form action="proses.php" method="post" enctype="multipart/form-data">
        <!-- Nama Lengkap -->
        <label for="nama">Nama Lengkap:</label><br>
        <input type="text" name="nama" id="nama" required><br><br>

        <!-- Email -->
        <label for="email">Email:</label><br>
        <input type="email" name="email" id="email" required><br><br>

        <!-- Password -->
        <label for="password">Password:</label><br>
        <input type="password" name="password" id="password" required><br><br>

        <!-- Umur -->
        <label for="umur">Umur:</label><br>
        <input type="number" name="umur" id="umur" min="1" required><br><br>

        <!-- Tanggal Lahir -->
        <label for="tgl_lahir">Tanggal Lahir:</label><br>
        <input type="date" name="tgl_lahir" id="tgl_lahir" required><br><br>

        <!-- Warna Favorit -->
        <label for="warna">Warna Favorit:</label><br>
        <input type="color" name="warna" id="warna"><br><br>

        <!-- Upload Foto Profil -->
        <label for="foto">Upload Foto Profil:</label><br>
        <input type="file" name="foto" id="foto" accept="image/*"><br><br>

        <!-- Jenis Kelamin -->
        <label>Jenis Kelamin:</label><br>
        <input type="radio" name="gender" value="Laki-laki" id="lk" required> <label for="lk">Laki-laki</label>
        <input type="radio" name="gender" value="Perempuan" id="pr" required> <label for="pr">Perempuan</label><br><br>

        <!-- Hobi -->
        <label>Hobi:</label><br>
        <input type="checkbox" name="hobi[]" value="Membaca" id="hobi1"> <label for="hobi1">Membaca</label>
        <input type="checkbox" name="hobi[]" value="Traveling" id="hobi2"> <label for="hobi2">Traveling</label>
        <input type="checkbox" name="hobi[]" value="Olahraga" id="hobi3"> <label for="hobi3">Olahraga</label><br><br>

        <!-- Negara -->
        <label for="negara">Pilih Negara:</label><br>
        <select name="negara" id="negara" required>
            <option value="">-- Pilih Negara --</option>
            <option value="USA">USA</option>
            <option value="UK">UK</option>
            <option value="Indonesia">Indonesia</option>
        </select><br><br>

        <!-- Biografi -->
        <label for="bio">Biografi Singkat:</label><br>
        <textarea name="bio" id="bio" rows="4" cols="40" placeholder="Tulis biografi singkat Anda di sini..."></textarea><br><br>

        <!-- Tombol Submit -->
        <input type="submit" value="Kirim">
    </form>
</body>
</html>