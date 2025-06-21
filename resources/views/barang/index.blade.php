<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Barang</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #f5f1eb;
            display: flex;
            min-height: 100vh;
        }

        .sidebar {
            width: 200px;
            background: linear-gradient(to bottom, #b4746f, #8b5a57);
            padding: 20px 0;
            position: fixed;
            height: 100vh;
        }

        .sidebar-menu {
            list-style: none;
            margin-top: 50px;
        }

        .sidebar-menu li {
            margin-bottom: 10px;
        }

        .sidebar-menu a {
            display: block;
            padding: 15px 25px;
            color: white;
            text-decoration: none;
            font-weight: bold;
            font-size: 14px;
            transition: all 0.3s;
        }

        .sidebar-menu a:hover,
        .sidebar-menu a.active {
            background-color: #d4a574;
            color: #333;
        }

        .main-content {
            margin-left: 200px;
            flex: 1;
            padding: 20px;
        }

        .header {
            text-align: center;
            margin-bottom: 30px;
        }

        .header h1 {
            font-size: 2.5rem;
            color: #333;
            font-weight: bold;
            letter-spacing: 2px;
            margin-bottom: 30px;
        }

        .success-message {
            background: #d1edff;
            border: 1px solid #bee5eb;
            color: #0c5460;
            padding: 15px;
            border-radius: 6px;
            margin-bottom: 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .undo-btn {
            background: #007bff;
            color: white;
            padding: 5px 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 12px;
            text-decoration: none;
        }

        .undo-btn:hover {
            background: #0056b3;
        }

        .table-container {
            background: white;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
            margin-bottom: 30px;
        }

        .data-table {
            width: 100%;
            border-collapse: collapse;
        }

        .data-table th {
            background: #e8e2dd;
            padding: 15px 12px;
            text-align: center;
            font-weight: bold;
            color: #333;
            border: 1px solid #d0c7bf;
            font-size: 14px;
            text-transform: uppercase;
        }

        .data-table td {
            padding: 15px 12px;
            text-align: center;
            border: 1px solid #d0c7bf;
            color: #333;
            font-size: 14px;
        }

        .data-table tbody tr:nth-child(even) {
            background-color: #f9f7f4;
        }

        .data-table tbody tr:hover {
            background-color: #f0ebe6;
        }

        /* Updated Action Buttons Styles */
        .action-buttons {
            display: flex;
            gap: 8px;
            justify-content: center;
            align-items: center;
        }

        .btn-edit, .btn-hapus {
            padding: 8px 16px;
            border: none;
            border-radius: 12px;
            cursor: pointer;
            font-size: 12px;
            font-weight: bold;
            text-transform: uppercase;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 6px;
            text-decoration: none;
        }

        .btn-edit {
            background-color: #6fa8dc;
            color: white;
        }

        .btn-edit:hover {
            background-color: #5a8bb8;
            transform: translateY(-1px);
            box-shadow: 0 2px 4px rgba(111, 168, 220, 0.3);
        }

        .btn-hapus {
            background-color: #e06666;
            color: white;
        }

        .btn-hapus:hover {
            background-color: #cc5555;
            transform: translateY(-1px);
            box-shadow: 0 2px 4px rgba(224, 102, 102, 0.3);
        }

        /* Icons using CSS */
        .btn-edit::before {
            content: "✏️";
            font-size: 14px;
        }

        .btn-hapus::before {
            content: "🗑️";
            font-size: 14px;
        }

        .section-title {
            font-size: 1.8rem;
            color: #333;
            font-weight: bold;
            margin: 40px 0 20px 0;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .form-section {
            background: white;
            padding: 0;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        }

        .form-table {
            width: 100%;
            border-collapse: collapse;
        }

        .form-table th {
            background: #e8e2dd;
            padding: 15px 12px;
            text-align: center;
            font-weight: bold;
            color: #333;
            border: 1px solid #d0c7bf;
            font-size: 14px;
            text-transform: uppercase;
        }

        .form-table td {
            padding: 0;
            border: 1px solid #d0c7bf;
        }

        .form-input {
            width: 100%;
            padding: 15px 12px;
            border: none;
            background: transparent;
            font-size: 14px;
            text-align: center;
            outline: none;
        }

        .form-input:focus {
            background-color: #f0ebe6;
        }

        .btn-tambah {
            background: linear-gradient(135deg, #28a745, #20c997);
            color: white;
            padding: 15px 25px;
            border: none;
            font-weight: bold;
            font-size: 14px;
            text-transform: uppercase;
            cursor: pointer;
            width: 100%;
            transition: all 0.3s;
        }

        .btn-tambah:hover {
            background: linear-gradient(135deg, #218838, #1ea085);
        }

        .no-data {
            padding: 30px;
            text-align: center;
            color: #666;
            font-style: italic;
        }

        .back-btn {
            position: fixed;
            bottom: 20px;
            right: 20px;
            width: 50px;
            height: 50px;
            background: linear-gradient(135deg, #dc3545, #c82333);
            color: white;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-size: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s;
            box-shadow: 0 4px 8px rgba(0,0,0,0.2);
            text-decoration: none;
        }

        .back-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 12px rgba(0,0,0,0.3);
        }

        @media (max-width: 768px) {
            .sidebar {
                width: 150px;
            }
            
            .main-content {
                margin-left: 150px;
                padding: 15px;
            }
            
            .header h1 {
                font-size: 2rem;
            }

            .data-table th,
            .data-table td,
            .form-table th {
                padding: 10px 8px;
                font-size: 12px;
            }

            .form-input {
                padding: 10px 8px;
                font-size: 12px;
            }

            .action-buttons {
                flex-direction: column;
                gap: 4px;
            }

            .btn-edit, .btn-hapus {
                padding: 6px 12px;
                font-size: 10px;
            }
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <ul class="sidebar-menu">
            <li><a href="{{ route('dashboard') }}">dashboard</a></li>
            <li><a href="{{ route('penjualan.index') }}">penjualan</a></li>
        </ul>
    </div>

    <div class="main-content">
        <div class="header">
            <h1>KELOLA BARANG</h1>
        </div>

        @if(session('success'))
        <div class="success-message">
            <span>{{ session('success') }}</span>
            @if($deletedBarang ?? false)
                <form method="POST" action="{{ route('barang.undo') }}" style="display: inline;">
                    @csrf
                    <button class="undo-btn" type="submit">Undo</button>
                </form>
            @endif
        </div>
        @endif

        <div class="table-container">
            <table class="data-table">
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>NAMA BARANG</th>
                        <th>KUANTITAS</th>
                        <th>HARGA</th>
                        <th>AKSI</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($barangs as $i => $barang)
                    <tr>
                        <td>{{ sprintf('%02d', $i + 1) }}</td>
                        <td>{{ $barang->nama }}</td>
                        <td>{{ $barang->kuantitas }}</td>
                        <td>Rp {{ number_format($barang->harga, 0, ',', '.') }}</td>
                        <td>
                            <div class="action-buttons">
                                <a href="/barang/{{ $barang->id }}/edit" class="btn-edit">Edit</a>
                                <form method="POST" action="/barang/{{ $barang->id }}" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn-hapus" type="submit" onclick="return confirm('Yakin ingin menghapus barang ini?')">Hapus</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="no-data">Belum ada data barang.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <h2 class="section-title">TAMBAH BARANG</h2>

        <div class="form-section">
            <form method="POST" action="/barang">
                @csrf
                <table class="form-table">
                    <thead>
                        <tr>
                            <th>NAMA BARANG</th>
                            <th>HARGA</th>
                            <th>KUANTITAS</th>
                            <th>TAMBAH</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><input type="text" name="nama" class="form-input" placeholder="Masukkan nama barang" required></td>
                            <td><input type="number" name="harga" class="form-input" placeholder="0" required min="0"></td>
                            <td><input type="number" name="kuantitas" class="form-input" placeholder="0" required min="1"></td>
                            <td><button type="submit" class="btn-tambah">TAMBAH</button></td>
                        </tr>
                    </tbody>
                </table>
            </form>
        </div>
    </div>

    <a href="{{ route('dashboard') }}" class="back-btn">
        ←
    </a>
</body>
</html>