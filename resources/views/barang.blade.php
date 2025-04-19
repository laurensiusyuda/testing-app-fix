<!DOCTYPE html>
<html>
<head>
<title>Daftar Barang</title>
<style>
body {
    font-family: sans-serif;
    margin: 30px;
}
table {
    border-collapse: collapse;
    width: 80%;
    margin-top: 20px;
}
table, th, td {
    border: 1px solid #999;
    padding: 10px;
}
form {
    margin-top: 20px;
}
input, button {
    padding: 8px;
    margin-right: 10px;
}
.undo-btn {
    background: orange;
    color: white;
    border: none;
    padding: 8px 15px;
    cursor: pointer;
}
.delete-btn {
    background: crimson;
    color: white;
    border: none;
    padding: 6px 10px;
    cursor: pointer;
}
</style>
</head>
<body>

<h1>📦 Daftar Barang</h1>

<form method="POST" action="/barang">
@csrf
<input type="text" name="nama" placeholder="Nama Barang" required>
<input type="number" name="harga" placeholder="Harga" required>
<input type="number" name="kuantitas" placeholder="Kuantitas" required>
<button type="submit">Tambah Barang</button>
</form>

<table>
<thead>
<tr>
<th>No</th>
<th>Nama</th>
<th>Harga</th>
<th>Kuantitas</th>
<th>Aksi</th>
</tr>
</thead>
<tbody>
@forelse($barangs as $i => $barang)
<tr>
<td>{{ $i + 1 }}</td>
<td>{{ $barang->nama }}</td>
<td>{{ $barang->harga }}</td>
<td>{{ $barang->kuantitas }}</td>
<td>
<form method="POST" action="/barang/{{ $barang->id }}">
@csrf
@method('DELETE')
<button class="delete-btn" type="submit">Hapus</button>
</form>
</td>
</tr>
@empty
<tr>
<td colspan="5">Belum ada barang.</td>
</tr>
@endforelse
</tbody>
</table>

@if($deletedBarang)
<form method="POST" action="/barang/{{ $deletedBarang->id }}/undo">
@csrf
<button class="undo-btn" type="submit">
⬅️ Undo Delete: {{ $deletedBarang->nama }}
</button>
</form>
@endif

</body>
</html>
