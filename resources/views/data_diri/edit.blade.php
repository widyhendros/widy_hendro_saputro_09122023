<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Form Data Pegawai</title>
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

<form action="/datapegawai/{{$pegawai[0]->pegawai_id}}" method="post" enctype="multipart/form-data">
    @method('PUT')
    @csrf
    <table>
        <tr>
            <td>Nama Pegawai</td>
            <td>
                <input type="text" id="pegawai_nama" name="pegawai_nama" value="{{$pegawai[0]->pegawai_nama}}">
                @error('pegawai_nama')
                <div style="color: red;">
                    {{ $message }}
                </div>
                @enderror
            </td>
        </tr>
        <tr>
            <td>Umur Pegawai</td>
            <td>
                <input type="text" id="pegawai_umur" name="pegawai_umur" value="{{$pegawai[0]->pegawai_umur}}">
                @error('pegawai_umur')
                <div style="color: red;">
                    {{ $message }}
                </div>
                @enderror
            </td>
        </tr>
        <tr>
            <td>Alamat Pegawai</td>
            <td>
                <textarea id="pegawai_alamat" name="pegawai_alamat" cols="30" rows="10">{{$pegawai[0]->pegawai_alamat}}</textarea>
                @error('pegawai_alamat')
                <div style="color: red;">
                    {{ $message }}
                </div>
                @enderror
            </td>
        </tr>
        <tr>
            <td>Foto</td>
            <td>
                <input type="file" id="foto" name="foto">
                <img src="{{ asset('storage/'.$pegawai[0]->foto) }}" style="width: 200px; height: 200px;" alt="image-pegawai">
                @error('foto')
                <div style="color: red;">
                    {{ $message }}
                </div>
                @enderror
            </td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td>
                <button type="submit" name="btn-submit">Edit</button>
            </td>
        </tr>
    </table>
</form>
</body>
</html>
