<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pasien List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<form class="form" method="post" action="{{Route('datapasien')}}">
  <div class="form-group">
    <label for="nama_pasien">Nama Pasien</label>
    <input type="text" class="form-control" id="nama_pasien" placeholder="nama lengkap" name="nama_pasien">
  </div>
  <div class="form-group">
    <label for="umur">Umur Pasien</label>
    <input type="text" class="form-control" id="umur" placeholder="umur pasien" name="umur">
  </div>
  <div class="form-group">
    <label for="jenis_kelamin">Jenis Kelamin</label>
    <input type="text" class="form-control" id="jenis_kelamin" name="jenis_kelamin">
  </div>
  <div class="form-group">
    <label for="tanggal_lahir">Tanggal Lahir</label>
    <input type="text" class="form-control" id="tanggal_lahir" name="tanggal_lahir">
  </div>
  <div class="form-group">
    <label for="alamat">Alamat</label>
    <input type="text" class="form-control" id="alamat" name="alamat">
  </div>
  <div class="form-group">
    <label for="nama_wali">Nama Wali</label>
    <input type="text" class="form-control" id="nama_wali" name="nama_wali">
  </div>
  <div class="form-group">
    <label for="nomor_ruangan">Nomor Ruangan</label>
    <input type="text" class="form-control" id="nomor_ruangan" name="nomor_ruangan">
  </div>
  <div class="form-group">
    <label for="nama_dokter">Nama Dokter</label>
    <input type="text" class="form-control" id="nama_dokter" name="nama_dokter">
  </div>
  <button type="submit" class="btn btn-default">Submit</button>
</form>

</body>
</html>
