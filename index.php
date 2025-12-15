<?php
require_once 'config.php';

// Ambil semua data kontak
$query = "SELECT * FROM contacts ORDER BY id DESC";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Kontak</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            padding: 20px;
        }
        
        .container {
            max-width: 1200px;
            margin: 0 auto;
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.3);
        }
        
        h1 {
            color: #333;
            margin-bottom: 30px;
            text-align: center;
        }
        
        .btn {
            display: inline-block;
            padding: 10px 20px;
            background: #667eea;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            margin-bottom: 20px;
            transition: all 0.3s;
        }
        
        .btn:hover {
            background: #764ba2;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.2);
        }
        
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        
        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        
        th {
            background: #667eea;
            color: white;
            font-weight: bold;
        }
        
        tr:hover {
            background: #f5f5f5;
        }
        
        .action-btn {
            padding: 5px 10px;
            margin: 0 5px;
            text-decoration: none;
            border-radius: 3px;
            font-size: 14px;
            transition: all 0.3s;
        }
        
        .edit-btn {
            background: #4CAF50;
            color: white;
        }
        
        .edit-btn:hover {
            background: #45a049;
        }
        
        .delete-btn {
            background: #f44336;
            color: white;
        }
        
        .delete-btn:hover {
            background: #da190b;
        }
        
        .empty-state {
            text-align: center;
            padding: 50px;
            color: #999;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>📇 Manajemen Kontak</h1>
        
        <a href="create.php" class="btn">➕ Tambah Kontak Baru</a>
        
        <?php if (mysqli_num_rows($result) > 0): ?>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Telepon</th>
                        <th>Alamat</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = mysqli_fetch_assoc($result)): ?>
                        <tr>
                            <td><?php echo $row['id']; ?></td>
                            <td><?php echo htmlspecialchars($row['name']); ?></td>
                            <td><?php echo htmlspecialchars($row['email']); ?></td>
                            <td><?php echo htmlspecialchars($row['phone']); ?></td>
                            <td><?php echo htmlspecialchars($row['address']); ?></td>
                            <td>
                                <a href="edit.php?id=<?php echo $row['id']; ?>" class="action-btn edit-btn">Edit</a>
                                <a href="delete.php?id=<?php echo $row['id']; ?>" 
                                   class="action-btn delete-btn" 
                                   onclick="return confirm('Yakin ingin menghapus kontak ini?')">Hapus</a>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        <?php else: ?>
            <div class="empty-state">
                <h2>Belum ada kontak</h2>
                <p>Klik tombol "Tambah Kontak Baru" untuk memulai</p>
            </div>
        <?php endif; ?>
    </div>
</body>
</html>
