<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data Pegawai</title>
</head>
<body>
    @if(session()->has('success'))
        <div style="width: 100%; background-color: green" role="alert">
            {{ session('success') }}
        </div>
    @elseif(session()->has('error'))
        <div style="width: 100%; background-color: red" role="alert">
            {{ session('error') }}
        </div>
    @endif

    <a href="/datapegawai/create">Tambah Data</a>
    <table border="1" cellspacing="0" cellpadding="10">
        <tr>
            <th>Nama Pegawai</th>
            <th>Umur Pegawai</th>
            <th>Alamat Pegawai</th>
            <th>Foto</th>
            <th>Action</th>
        </tr>
        @if(count($pegawai) > 0)
            @foreach($pegawai as $row)
                <tr>
                    <td>{{$row->pegawai_nama}}</td>
                    <td>{{$row->pegawai_umur}}</td>
                    <td>{{$row->pegawai_alamat}}</td>
                    <td>
                        <img src="{{ asset('storage/'.$row->foto) }}" style="width: 200px; height: 200px;" alt="image-pegawai">
                    </td>
                    <td>
                        <a href="/datapegawai/{{$row->pegawai_id}}/edit">Edit</a>
                        <form action="/datapegawai/{{$row->pegawai_id}}" method="post">
                            @method('DELETE')
                            @csrf
                            <button onclick="return confirm('apakah anda yakin menghapus data ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="5" style="text-align: center">Tidak Ada Data</td>
            </tr>
        @endif
    </table>
</body>
</html>
