# 🌐 Sistem Informasi Manajemen Tagihan Internet Berbasis Web

![Laravel](https://img.shields.io/badge/Laravel-11-red)
![PHP](https://img.shields.io/badge/PHP-8.2-blue)
![MySQL](https://img.shields.io/badge/MySQL-8.0-orange)
![License](https://img.shields.io/badge/License-MIT-green)

## 👨‍💻 Identitas Developer

| Field | Detail |
|-------|--------|
| **Nama** | Mohammad Imam |
| **GitHub** | [@hdmax25](https://github.com/hdmax25) |
| **Mata Kuliah** | Pemrograman Web Fullstack |
| **Event** | WebExpo WPUNIPMA #5 |

---

## 📌 Deskripsi Proyek

Sistem backend berbasis **RESTful API** untuk mengelola layanan internet skala kecil (RT/RW Net / ISP Lokal). Sistem ini menyelesaikan masalah pengelolaan data operasional layanan internet yang selama ini dilakukan secara manual.

### 🔍 Studi Kasus
Pengelolaan data operasional layanan internet seperti:
- Mencatat identitas pelanggan (Romi, Wahyu, Eko, Vendy, Dani)
- Mengatur pilihan paket internet / bandwidth
- Melacak status pembayaran tagihan bulanan

---

## 🛠️ Teknologi yang Digunakan

| Teknologi | Versi | Fungsi |
|-----------|-------|--------|
| Laravel | 11 | Backend Framework (PHP) |
| PHP | 8.2 | Bahasa Pemrograman |
| MySQL | 8.0 | Database |
| Eloquent ORM | - | Interaksi Database |
| RESTful API | - | Komunikasi Data (JSON) |

---

## ✨ Fitur Utama

- ✅ **CRUD Pelanggan** — Tambah, lihat, update, hapus data pelanggan
- ✅ **CRUD Paket Internet** — Kelola paket bandwidth dan harga
- ✅ **CRUD Tagihan** — Catat dan lacak tagihan bulanan pelanggan
- ✅ **Status Pembayaran** — Lacak status `paid` / `unpaid`
- ✅ **Relasi Data** — Data tagihan otomatis menyertakan info pelanggan & paket
- ✅ **Validasi Input** — Validasi otomatis pada setiap request
- ✅ **Response JSON** — Semua response dalam format JSON terstruktur
- ✅ **Database Seeder** — Data dummy siap pakai

---

## 📁 Struktur Folder

```
tagihan-internet/
├── app/
│   ├── Http/
│   │   └── Controllers/
│   │       ├── CustomerController.php  ← CRUD Pelanggan
│   │       ├── PackageController.php   ← CRUD Paket
│   │       └── BillController.php      ← CRUD Tagihan
│   └── Models/
│       ├── Customer.php    ← Model Pelanggan
│       ├── Package.php     ← Model Paket
│       └── Bill.php        ← Model Tagihan
├── database/
│   ├── migrations/
│   │   ├── create_customers_table.php  ← Struktur tabel pelanggan
│   │   ├── create_packages_table.php   ← Struktur tabel paket
│   │   └── create_bills_table.php      ← Struktur tabel tagihan
│   └── seeders/
│       ├── CustomerSeeder.php  ← Data dummy pelanggan
│       ├── PackageSeeder.php   ← Data dummy paket
│       ├── BillSeeder.php      ← Data dummy tagihan
│       └── DatabaseSeeder.php  ← Main seeder
└── routes/
    └── api.php  ← Definisi semua endpoint API
```

---

## 🗄️ Struktur Database

### Tabel `customers`
| Kolom | Tipe | Keterangan |
|-------|------|------------|
| id | bigint | Primary Key |
| name | varchar | Nama pelanggan |
| address | text | Alamat |
| phone | varchar | No. telepon |
| email | varchar | Email (unique) |
| created_at | timestamp | - |
| updated_at | timestamp | - |

### Tabel `packages`
| Kolom | Tipe | Keterangan |
|-------|------|------------|
| id | bigint | Primary Key |
| name | varchar | Nama paket |
| bandwidth | integer | Kecepatan (Mbps) |
| price | decimal | Harga per bulan |
| description | text | Keterangan paket |
| created_at | timestamp | - |
| updated_at | timestamp | - |

### Tabel `bills`
| Kolom | Tipe | Keterangan |
|-------|------|------------|
| id | bigint | Primary Key |
| customer_id | bigint | FK → customers |
| package_id | bigint | FK → packages |
| month | integer | Bulan tagihan |
| year | integer | Tahun tagihan |
| amount | decimal | Jumlah tagihan |
| status | enum | paid / unpaid |
| due_date | date | Tanggal jatuh tempo |
| paid_date | date | Tanggal bayar (nullable) |
| created_at | timestamp | - |
| updated_at | timestamp | - |

---

## 🔗 Daftar Endpoint API

Base URL: `http://127.0.0.1:8000`

### 👥 Pelanggan (Customers)
| Method | Endpoint | Fungsi |
|--------|----------|--------|
| GET | `/api/customers` | Lihat semua pelanggan |
| POST | `/api/customers` | Tambah pelanggan baru |
| GET | `/api/customers/{id}` | Lihat detail pelanggan |
| PUT | `/api/customers/{id}` | Update data pelanggan |
| DELETE | `/api/customers/{id}` | Hapus pelanggan |

### 📦 Paket Internet (Packages)
| Method | Endpoint | Fungsi |
|--------|----------|--------|
| GET | `/api/packages` | Lihat semua paket |
| POST | `/api/packages` | Tambah paket baru |
| GET | `/api/packages/{id}` | Lihat detail paket |
| PUT | `/api/packages/{id}` | Update paket |
| DELETE | `/api/packages/{id}` | Hapus paket |

### 🧾 Tagihan (Bills)
| Method | Endpoint | Fungsi |
|--------|----------|--------|
| GET | `/api/bills` | Lihat semua tagihan |
| POST | `/api/bills` | Tambah tagihan baru |
| GET | `/api/bills/{id}` | Lihat detail tagihan |
| PUT | `/api/bills/{id}` | Update tagihan |
| DELETE | `/api/bills/{id}` | Hapus tagihan |

---

## 📊 Contoh Response API

### GET /api/customers
```json
{
    "success": true,
    "data": [
        {
            "id": 1,
            "name": "Romi",
            "address": "Jl. Mawar No. 1, Jombang",
            "phone": "081234567891",
            "email": "romi@gmail.com"
        }
    ]
}
```

### GET /api/bills
```json
{
    "success": true,
    "data": [
        {
            "id": 1,
            "month": 6,
            "year": 2026,
            "amount": "100000.00",
            "status": "paid",
            "due_date": "2026-06-10",
            "customer": {
                "id": 1,
                "name": "Romi"
            },
            "package": {
                "id": 1,
                "name": "Paket Basic",
                "bandwidth": 10
            }
        }
    ]
}
```

---

## 🚀 Cara Instalasi & Menjalankan

```bash
# 1. Clone repository
git clone https://github.com/hdmax25/tagihan-internet.git

# 2. Masuk folder project
cd tagihan-internet

# 3. Install dependencies
composer install

# 4. Copy file environment
cp .env.example .env

# 5. Generate application key
php artisan key:generate

# 6. Konfigurasi database di file .env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=tagihan_internet
DB_USERNAME=root
DB_PASSWORD=

# 7. Jalankan migration
php artisan migrate

# 8. Jalankan seeder (data dummy)
php artisan db:seed

# 9. Jalankan server
php artisan serve
```

Akses API di: `http://127.0.0.1:8000/api/`

---

## 📝 Arsitektur MVC

```
Request → Route (api.php)
        → Controller (logika bisnis)
        → Model (interaksi database)
        → Response JSON
```

---

## 📄 Lisensi

Proyek ini dibuat untuk keperluan UTS Mata Kuliah Pemrograman Web Fullstack.