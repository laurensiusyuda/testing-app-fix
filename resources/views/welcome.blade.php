<!DOCTYPE html>
<html>
<head>
<title>Daftar Barang</title>
</head>
<body>
<h1>Daftar Barang</h1>

<form method="POST" action="/barang">
@csrf
<input type="text" name="nama" placeholder="Nama Barang" required>
<input type="number" name="harga" placeholder="Harga" required>
<input type="number" name="kuantitas" placeholder="Kuantitas" required>
<button type="submit">Tambah</button>
</form>

<br>

<table border="1" cellpadding="10">
<tr>
<th>No</th>
<th>Nama</th>
<th>Harga</th>
<th>Kuantitas</th>
<th>Aksi</th>
</tr>
@foreach($barangs as $i => $barang)
<tr>
<td>{{ $i + 1 }}</td>
<td>{{ $barang->nama }}</td>
<td>{{ $barang->harga }}</td>
<td>{{ $barang->kuantitas }}</td>
<td>
<form method="POST" action="/barang/{{ $barang->id }}">
@csrf
@method('DELETE')
<button type="submit">Hapus</button>
</form>
</td>
</tr>
@endforeach
</table>

<br>

@if($deletedBarang)
<form method="POST" action="/barang/{{ $deletedBarang->id }}/undo">
@csrf
<button type="submit">Undo Delete: {{ $deletedBarang->nama }}</button>
</form>
@endif
</body>
</html>
