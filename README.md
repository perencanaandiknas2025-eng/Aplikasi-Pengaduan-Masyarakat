# Aplikasi Pengaduan Masyarakat

Aplikasi web berbasis Laravel untuk mengelola pengaduan masyarakat. Memungkinkan masyarakat melaporkan masalah, admin/petugas merespons, dan tracking status pengaduan.

## Fitur Utama

### Frontend (Masyarakat)
- **Beranda**: Halaman utama dengan informasi prosedur pengaduan, tombol navigasi, dan footer dengan copyright.
- **Registrasi Masyarakat**: Form pendaftaran dengan validasi NIK, username, email, nama, telepon, alamat, dan upload foto profil (wajib).
- **Login Masyarakat**: Autentikasi dengan username/email dan password, dengan CAPTCHA untuk keamanan.
- **Buat Pengaduan Baru**: Form untuk membuat pengaduan dengan kategori, deskripsi, dan upload foto bukti (opsional).
- **Lacak Pengaduan**: Cari status pengaduan berdasarkan ID pengaduan atau NIK.
- **Riwayat Pengaduan Pribadi**: Dashboard masyarakat untuk melihat semua pengaduan mereka dengan status terkini.
- **Cari Hasil Pengaduan**: Pencarian publik berdasarkan ID pengaduan.

### Admin Panel
- **Dashboard Admin**: 
  - Statistik total pengaduan, pengaduan per kategori, pengaduan per status.
  - Chart visualisasi data pengaduan.
  - Filter berdasarkan tanggal.
- **Kelola Masyarakat**:
  - CRUD (Create, Read, Update, Delete) masyarakat.
  - Filter: Semua, Pernah Mengadu, Tidak Pernah Mengadu.
  - Statistik: Total masyarakat, aktif (pernah mengadu), tidak aktif (belum pernah mengadu).
  - Upload dan tampilkan foto profil.
- **Kelola Pengaduan**:
  - Lihat semua pengaduan dengan filter status (pending, proses, selesai, ditolak).
  - Update status pengaduan dan kirim email notifikasi otomatis.
  - Lihat detail pengaduan dengan foto bukti.
  - Export data pengaduan ke CSV.
- **Kelola User Admin**:
  - CRUD admin/petugas dengan level (Administrator, Officer).
  - Middleware untuk kontrol akses berdasarkan role.
- **Kelola Kategori Pengaduan**: Tambah, edit, hapus kategori.
- **Laporan**:
  - Generate laporan harian/bulanan dalam format PDF menggunakan DomPDF.
  - Export CSV untuk analisis lebih lanjut.
- **Tanggapan Pengaduan**: Admin dapat memberikan tanggapan pada pengaduan.

### Fitur Keamanan & Utilitas
- **Autentikasi & Otorisasi**: Login/logout untuk masyarakat dan admin, dengan middleware role-based (checkRole).
- **CAPTCHA**: Digunakan di form login dan registrasi untuk mencegah spam.
- **Upload File**: Mendukung upload foto profil masyarakat dan foto bukti pengaduan (validasi format dan ukuran).
- **Notifikasi Email**: 
  - Email otomatis saat pengaduan dibuat (ke admin).
  - Email update status ke masyarakat.
  - Template email kustom dengan logo dan informasi.
- **Tracking & Pencarian**: Sistem tracking pengaduan dengan ID unik, pencarian berdasarkan NIK atau ID.
- **Responsive Design**: Menggunakan Bootstrap 5 untuk tampilan mobile-friendly.
- **DataTables**: Tabel interaktif di admin panel dengan sorting, searching, dan pagination.
- **SweetAlert**: Konfirmasi aksi seperti delete dengan popup.
- **Session Management**: Penyimpanan data sesi untuk login dan pesan flash.

### Fungsi Penting Lain
- **Middleware CheckRole**: Membatasi akses halaman berdasarkan level user (1: Admin, 2: Officer).
- **Seeder**: Data awal untuk kategori, level, dan user demo.
- **Migration**: Struktur database lengkap dengan foreign key.
- **Error Handling**: Penanganan error dengan halaman 404 dan validasi form.
- **Localization**: Support bahasa Indonesia di seluruh aplikasi.
- **Sosial Media Integration**: Link ke Facebook dan Instagram di footer.

## Instalasi
1. Clone repository: `git clone <url>`
2. Install dependencies: `composer install`
3. Copy `.env.example` ke `.env` dan konfigurasi database/mail.
4. Generate key: `php artisan key:generate`
5. Jalankan migration: `php artisan migrate --seed`
6. Jalankan server: `php artisan serve`

## Akses
- **Frontend**: http://127.0.0.1:8000
- **Admin**: http://127.0.0.1:8000/admin/login
  - Username: Administrator, Password: 123456
  - Username: Officer, Password: 123456
- **User**: http://127.0.0.1:8000/user/login
  - Username: user, Password: user1234

## Struktur Database
- `users`: Admin/petugas
- `society`: Masyarakat
- `complaint`: Pengaduan
- `response`: Tanggapan
- `categories`: Kategori pengaduan
- `level`: Level user

## Teknologi
- Laravel 11
- MySQL
- Bootstrap 5
- DataTables
- DomPDF

## Testing
Jalankan: `php artisan test`

## Deployment
Gunakan Railway atau server dengan PHP 8.2+ dan MySQL.