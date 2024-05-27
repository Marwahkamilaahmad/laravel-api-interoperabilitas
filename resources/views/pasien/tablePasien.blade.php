<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pasien List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2>List Pasien Dari Windows</h2>
        <hr>
        <a href="/datapasien/create" class="btn btn-primary">Tambah Pasien</a>
        <table class="table">
            <thead>
                <tr>
                    <th>Nama Pasien</th>
                    <th>Umur</th>
                    <th>Jenis Kelamin</th>
                    <th>Tanggal Lahir</th>
                    <th>Alamat</th>
                    <th>Nama Wali</th>
                    <th>Nomor Ruangan</th>
                    <th>Nama Dokter</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($dataLokal as $item)
                <tr>
                    <td>{{ $item['nama_pasien'] }}</td>
                    <td>{{ $item['umur'] }}</td>
                    <td>{{ $item['jenis_kelamin'] }}</td>
                    <td>{{ $item['tanggal_lahir'] }}</td>
                    <td>{{ $item['alamat'] }}</td>
                    <td>{{ $item['nama_wali'] }}</td>
                    <td>{{ $item['nomor_ruangan'] }}</td>
                    <td>{{ $item['nama_dokter'] }}</td>
                    <td>
                        <a href="/datapasien/{{ $item['id'] }}/edit" class="btn btn-warning">Edit</a>
                        <form action="/api/datapasien/{{ $item['id'] }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus?')">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="container mt-5">
        <h2>List Pasien Dari Ubuntu</h2>
        <hr>
        <a href="/datapasien/create" class="btn btn-primary">Tambah Pasien</a>
        <table class="table">
            <thead>
                <tr>
                    <th>Nama Pasien</th>
                    <th>Umur</th>
                    <th>Jenis Kelamin</th>
                    <th>Tanggal Lahir</th>
                    <th>Alamat</th>
                    <th>Nama Wali</th>
                    <th>Nomor Ruangan</th>
                    <th>Nama Dokter</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($data as $item)
                <tr>
                    <td>{{ $item['nama_pasien'] }}</td>
                    <td>{{ $item['umur'] }}</td>
                    <td>{{ $item['jenis_kelamin'] }}</td>
                    <td>{{ $item['tanggal_lahir'] }}</td>
                    <td>{{ $item['alamat'] }}</td>
                    <td>{{ $item['nama_wali'] }}</td>
                    <td>{{ $item['nomor_ruangan'] }}</td>
                    <td>{{ $item['nama_dokter'] }}</td>
                    <td>
                        <a href="/datapasien/{{ $item['id'] }}/edit" class="btn btn-warning">Edit</a>
                        <form action="/api/datapasien/{{ $item['id'] }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus?')">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
