<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Daftar Barang</title>
</head>
<body>
    <h1>Daftar Barang</h1>

    <table border="1" cellpadding="10">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Barang</th>
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
                            <button type="submit" onclick="return confirm('Yakin mau hapus?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" align="center">Belum ada barang.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <br>

    <h2>Tambah Barang Baru</h2>
    <form method="POST" action="/barang">
        @csrf
        <input type="text" name="nama" placeholder="Nama Barang" required>
        <input type="number" name="harga" placeholder="Harga" required>
        <input type="number" name="kuantitas" placeholder="Kuantitas" required>
        <button type="submit">Tambah</button>
    </form>

    <br>
    @if (session('success'))
        <p style="color:green;">{{ session('success') }}</p>
    @endif

</body>
</html>
