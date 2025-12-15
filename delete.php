<?php
require_once 'config.php';

// Cek ID
if (!isset($_GET['id'])) {
    header("Location: index.php");
    exit;
}

$id = intval($_GET['id']);

// Hapus dari database
$query = "DELETE FROM contacts WHERE id = $id";

if (mysqli_query($conn, $query)) {
    // Redirect ke halaman utama
    header("Location: index.php");
} else {
    echo "Error: " . mysqli_error($conn);
}
?>
```

**Save:** `Ctrl + O`, `Enter`, `Ctrl + X`

---

## 🔷 TAHAP 8: TEST APLIKASI

### 8.1 Buka Browser

Akses aplikasi Anda:
```
http://localhost/crud-app/
```

### 8.2 Test Semua Fitur

1. ✅ **Tambah kontak baru** - Klik tombol "Tambah Kontak Baru"
2. ✅ **Lihat daftar** - Semua kontak muncul di tabel
3. ✅ **Edit kontak** - Klik tombol "Edit"
4. ✅ **Hapus kontak** - Klik tombol "Hapus"

---

## 📋 STRUKTUR FILE AKHIR
```
/var/www/html/crud-app/
├── config.php      (Koneksi database)
├── index.php       (Halaman utama - READ)
├── create.php      (Tambah data - CREATE)
├── edit.php        (Edit data - UPDATE)
└── delete.php      (Hapus data - DELETE)
