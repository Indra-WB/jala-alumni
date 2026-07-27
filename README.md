# JALA ALUMNI - UPT BLK PASURUAN

[![Version](https://img.shields.io/badge/version-1.0-blue.svg)](https://github.com/Indra-WB/jala-alumni)
[![CodeIgniter](https://img.shields.io/badge/framework-CodeIgniter%204.7-orange.svg)](https://codeigniter.com)
[![PHP](https://img.shields.io/badge/PHP-8.2%2B-777BB4.svg)](https://php.net)
[![TailwindCSS](https://img.shields.io/badge/style-Tailwind%20CSS-06B6D4.svg)](https://tailwindcss.com)
[![License](https://img.shields.io/badge/license-MIT-green.svg)](LICENSE)

**JALA ALUMNI UPT BLK Pasuruan** adalah portal resmi jejaring alumni dan sistem *tracer study* terintegrasi untuk UPT BLK Pasuruan. Aplikasi ini menghubungkan lulusan pelatihan dengan peluang kerja, usaha mandiri, dan jaringan mitra industri secara *realtime*.

---

## 📌 1. Eksekutif Summary & Tujuan Produk

Aplikasi ini dibangun untuk mendukung pendataan dan penelusuran lulusan pelatihan (*tracer study*) UPT BLK Pasuruan. Sistem mengintegrasikan data pelatihan dan penempatan kerja dari database operasional lama (**SINAKER**) dengan database baru (**JALA Alumni**) menggunakan arsitektur **Dual Database Connection** pada CodeIgniter 4.

### **Tujuan utama:**
- **Mendukung Tracer Study**: Memudahkan alumni memperbarui status kebekerjaan (Bekerja / Wirausaha / Belum Bekerja).
- **Membangun Jejaring Alumni**: Menghubungkan sesama alumni antar angkatan dan kejuruan.
- **Dashboard Statistik Realtime**: Menyajikan potret penempatan lulusan secara komprehensif dalam bentuk grafik dan peta interaktif.
- **Direktori Alumni & Mitra**: Menampilkan katalog alumni terampil dan mitra industri penyerap tenaga kerja.

---

## 🚀 2. Fitur Utama

### **Public / Pengunjung**
- **Landing Page Interaktif**:
  - **Hero Banner**: Slogan, badge resmi, dan ilustrasi visual modern.
  - **4 Metrik Utama**: Counter realtime *Alumni Terlatih*, *Sudah Bekerja*, *Berwirausaha*, dan *Mitra Industri*.
  - **Potret Penempatan Alumni**:
    - **Donut Chart** status penempatan (ApexCharts).
    - **Horizontal Bar Chart** penempatan per kejuruan (ApexCharts).
    - **Interactive Map** sebaran lokasi penempatan alumni di Jawa Timur (LeafletJS + OpenStreetMap).
  - **Jalur Kebekerjaan**: Navigasi cepat *Bekerja di Industri* vs *Membangun Usaha*.
  - **Direktori Alumni Preview**: Kartu profil alumni dilengkapi lencana status, perusahaan, dan kejuruan.
  - **Mitra Industri Grid**: Logo dan profil perusahaan mitra pendukung.
  - **Cerita Alumni**: Testimonial kisah sukses lulusan pelatihan.
  - **CTA Banner & Footer**: Ajakan perbarui data & informasi kontak resmi UPT BLK Pasuruan.
- **Direktori Alumni (`/direktori`)**: Pencarian alumni dengan filter status kebekerjaan & kata kunci.
- **Data Penempatan (`/statistik`)**: Halaman khusus grafik tracer study & analisis serapan tenaga kerja.
- **Mitra Industri (`/mitra`)**: Katalog lengkap industri mitra BLK Pasuruan.
- **Cerita Alumni (`/cerita`)**: Kisah inspiratif lulusan pelatihan.

### **Alumni (`/alumni/...`)**
- **Registrasi Berbasis NIK (`/register`)**: Verifikasi NIK KTP ke database SINAKER sebelum pembuatan akun.
- **Login (`/login`)**: Autentikasi NIK / Email + Password.
- **Dashboard Alumni**: Summary profil, status pekerjaan saat ini, dan riwayat pelatihan.
- **Update Status Kebekerjaan**: Form pembaruan data penempatan (Perusahaan, Jabatan, Alamat, Tgl Mulai) yang secara otomatis memperbarui database SINAKER & mencatat *Audit Log*.
- **Kelola Profil & Password**: Edit biodata pribadi, unggah foto profil, dan ubah kata sandi.

### **Admin Panel (`/admin/...`)**
- **Dashboard Admin**: Ringkasan data statistik tracer study & log aktivitas terkini.
- **Kelola Data Alumni**: Pencarian, filter, dan detail lengkap biodata serta status penempatan alumni.
- **Kelola Mitra Industri**: CRUD data perusahaan mitra.
- **Kelola Cerita Alumni**: CRUD testimoni alumni.
- **Kelola Banner Hero**: Pengaturan slider banner landing page.
- **Audit Log System**: Pemantauan log aktivitas pengguna, alamat IP, URL, dan riwayat aksi.

### **Super Admin Panel (`/superadmin/...`)**
- **Manajemen User**: Pembuatan akun pengelola (Admin BLK / Super Admin) dan kontrol *Role Based Access Control (RBAC)*.

---

## 🏗️ 3. Arsitektur Sistem & Dual Database

Aplikasi dikembangkan menggunakan arsitektur **MVC + Service Layer** dengan dua koneksi database terpisah:

```text
               Browser Client
                     │
            CodeIgniter 4 App
           ┌─────────┴─────────┐
           ▼                   ▼
    Database Lama       Database Baru
      (SINAKER)         (JALA Alumni)
```

### **A. Database Lama (`sinaker`)**
*Digunakan untuk membaca data historis pelatihan & memperbarui data penempatan operasional alumni:*
- `pendaftar`: Data biodata peserta pelatihan (53.000+ data).
- `penempatan`: Data penempatan alumni (bekerja/wirausaha/mencari kerja).
- `pelatihan`: Data program pelatihan yang diselenggarakan.
- `program`: Master kejuruan pelatihan (misal: *Menjahit*, *Roti & Kue*, *Listrik*, *Otomotif*).
- `gelombang`: Master angkatan/gelombang dan tahun pelatihan.

### **B. Database Baru (`jala-alumni`)**
*Digunakan untuk autentikasi, manajemen sistem, dan konten portal:*
- `users`: Data akun pengguna (NIK, Email, Password Hash, Role, Status).
- `user_profile`: Data profil pelengkap alumni/admin.
- `audit_logs`: Catatan aktivitas audit sistem (User, IP, Action, Timestamp).
- `mitra`: Data perusahaan mitra industri.
- `cerita_alumni`: Data konten cerita inspiratif alumni.
- `banners`: Data banner hero landing page.
- `settings`: Pengaturan konfigurasi aplikasi.

---

## 💻 4. Technology Stack & Standard

- **Backend Framework**: CodeIgniter 4 (v4.7.4) - PHP 8.2+
- **Frontend Framework**: Tailwind CSS (UI/UX Custom Design System)
- **Typography**: Google Fonts (*Plus Jakarta Sans*)
- **Icons**: Lucide Icons & Heroicons
- **Charts Library**: ApexCharts (Donut & Horizontal Bar Chart)
- **Maps Library**: LeafletJS (OpenStreetMap Tiles)
- **Database Engine**: MySQL 8.0+ (InnoDB Engine with BTREE Indexing)
- **Coding Standard**: PSR-12, MVC Pattern, Service Layer Pattern, DRY, SOLID.

---

## ⚙️ 5. Panduan Instalasi & Penggunaan

### **Prasyarat Sistem:**
- PHP >= 8.2 (Extension: `mysqli`, `json`, `mbstring`, `intl`)
- Composer >= 2.0
- MySQL Server / MariaDB
- XAMPP / Laragon Web Server

### **Langkah-langkah Instalasi:**

1. **Kloning Repositori**:
   ```bash
   git clone https://github.com/Indra-WB/jala-alumni.git
   cd jala-alumni
   ```

2. **Instalasi Dependency**:
   ```bash
   composer install
   ```

3. **Konfigurasi File `.env`**:
   Salin `.env.example` menjadi `.env`:
   ```bash
   cp .env.example .env
   ```
   Atur konfigurasi koneksi database pada `.env`:
   ```ini
   CI_ENVIRONMENT = development

   app.baseURL = 'http://localhost/jala-alumni/public/'
   app.indexPage = ''

   # Database Utama JALA Alumni
   database.default.hostname = 127.0.0.1
   database.default.database = jala-alumni
   database.default.username = root
   database.default.password = 
   database.default.DBDriver = MySQLi

   # Database Lama SINAKER
   database.training.hostname = 127.0.0.1
   database.training.database = sinaker
   database.training.username = root
   database.training.password = 
   database.training.DBDriver = MySQLi
   ```

4. **Inisialisasi Database**:
   - Pastikan database `sinaker` (database lama) telah diimpor ke MySQL.
   - Database `jala-alumni` akan dibuat dan diinisialisasi otomatis saat pertama kali setup, atau jalankan file helper setup jika diperlukan.

5. **Menjalankan Aplikasi**:
   - **Melalui XAMPP Apache** (Rekomendasi):
     Akses via browser: `http://localhost/jala-alumni/public/`
   - **Melalui PHP Spark Development Server**:
     ```bash
     php spark serve --port 8080
     ```
     Akses via browser: `http://127.0.0.1:8080`

---

## 🔑 6. Akun Kredensial Default Pengelola

Untuk keperluan pengujian & administrasi sistem:

| Role | Username / NIK | Password | Akses |
|:---:|:---:|:---:|:---|
| **Super Admin** | `1234567890123456` | `admin123` | Manajemen User, Role, & Full System Access |
| **Admin BLK** | `6543210987654321` | `admin123` | Kelola Alumni, Mitra, Cerita, Banner, & Audit Log |

---

## 📄 7. Dokumen Referensi Pengembangan

- [`1. PRD_JALA_Alumni_BLK_Pasuruan_v1.md`](1.%20PRD_JALA_Alumni_BLK_Pasuruan_v1.md) - *Product Requirement Document*
- [`2. SDS_JALA_Alumni_BLK_Pasuruan_v1.md`](2.%20SDS_JALA_Alumni_BLK_Pasuruan_v1.md) - *Software Design Specification*
- [`3. UIUX_Specification_JALA_Alumni_BLK_Pasuruan_v1.md`](3.%20UIUX_Specification_JALA_Alumni_BLK_Pasuruan_v1.md) - *UI/UX Design Guidelines*
- [`4. Development_Guide_JALA_Alumni_BLK_Pasuruan_v1.md`](4.%20Development_Guide_JALA_Alumni_BLK_Pasuruan_v1.md) - *Technical Development Guide*

---

## 📜 8. Lisensi & Hak Cipta

Dikelola dan Dikembangkan oleh **UPT BLK Pasuruan**, Dinas Tenaga Kerja dan Transmigrasi Provinsi Jawa Timur.  
© 2026 UPT BLK Pasuruan. All rights reserved.
