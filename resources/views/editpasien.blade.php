<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pasien List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            padding: 20px;
        }
        .form {
            max-width: 500px;
            margin: 0 auto;
        }
    </style>
</head>
<body>

<div class="container">
    <h2 class="text-center mt-5 mb-4">EDIT Data Pasien</h2>

    <div class="container">
    <!-- Form -->

    @if ($errors->any())
    <div class="alert alert-danger mt-4">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <!-- Form -->
</div>


    <form class="form-group" method="PUT"  action="/api/datapasien">
        <div class="mb-3">
            <label for="nama_pasien" class="form-label">Nama Pasien</label>
            <input type="text" class="form-control" id="nama_pasien" placeholder="Nama Lengkap" name="nama_pasien" required>
        </div>
        <div class="mb-3">
            <label for="umur" class="form-label">Umur Pasien</label>
            <input type="text" class="form-control" id="umur" placeholder="Usia" name="umur" required>
        </div>
        <div class="mb-3">
            <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
            <input type="text" class="form-control" id="jenis_kelamin" placeholder="Laki-Laki / Perempuan" name="jenis_kelamin" required>
        </div>
        <div class="mb-3">
            <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
            <input type="text" class="form-control" id="tanggal_lahir" placeholder="Tanggal Lahir" name="tanggal_lahir" required>
        </div>
        <div class="mb-3">
            <label for="alamat" class="form-label">Alamat</label>
            <input type="text" class="form-control" id="alamat" placeholder="Domisili"  name="alamat" required>
        </div>
        <div class="mb-3">
            <label for="nama_wali" class="form-label">Nama Wali</label>
            <input type="text" class="form-control" id="nama_wali" placeholder="Nama Lengkap Wali" name="nama_wali" required>
        </div>
        <div class="mb-3">
            <label for="nomor_ruangan" class="form-label">Nomor Ruangan</label>
            <input type="text" class="form-control" id="nomor_ruangan" placeholder="Nomor Ruangan"  name="nomor_ruangan" required>
        </div>
        <div class="mb-3">
            <label for="nama_dokter" class="form-label">Nama Dokter</label>
            <input type="text" class="form-control" id="nama_dokter" placeholder="Nama Dokter" name="nama_dokter" required>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

</body>
</html>
