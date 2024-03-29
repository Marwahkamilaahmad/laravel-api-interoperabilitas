<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
    rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
    crossorigin="anonymous"
  />
  <script
  src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
  integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
  crossorigin="anonymous"
></script>
</head>
<body>
    <div class="container">
        <h3>Edit Todos</h3>
        <form method="POST" action="/todos/edit">
            {{ with .todo }}
            <input type="hidden" name="id" value="{{ .Id}}">
            <div class="form-group">
              <label for="Judul">Judul</label>
              <input type="text" class="form-control" id="judul" value="{{ .Judul}}" name="judul" >
            </div>
            <div class="form-group">
              <label for="Hari">Hari</label>
              <input type="text" class="form-control" id="hari" value="{{.Hari}}" name="hari" >
            </div>
            <div class="form-group">
              <label for="Waktu">Waktu</label>
              <input type="text" class="form-control" id="waktu" value="{{.Waktu}}" name="waktu" >
            </div>
            <div class="form-group">
              <label for="Keterangan">Keterangan</label>
              <input type="text" class="form-control" id="keterangan" value="{{.Keterangan}}" name="keterangan" >
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
            {{end}}
        </form>
        </div>
</body>
</html>
