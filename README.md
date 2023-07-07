
![Logo](https://raw.githubusercontent.com/zm-ibrahim/JTIEvent/master/public/assets/img/pwlBesar.png)


# JTI -Event

Sistem yang dibuat untuk memudahkan dalam memanajemen lomba, peserta, penilai, dan nilai itu sendiri.

Dibuat sebagai pemenuhan Tugas Akhir :<br>
Pemrograman Web Lanjut

# Features

- Roles ( Admin, Judge, Participant)
- CRUD
- Scoring
- Cetak sertifikat
- List Kegiatan
- Ikuti kegiatan
- User Dashboard

### Roles 
-  Admin
Dapat melakukan CRUD Event (kegiatan), Judge(Penilai), serta menugaskan juri kepada kegiatan
- Judge
Dapat melakukan penilaian terhadap peserta pada kegiatan yang ditugaskan
- Peserta (Participant)
Dapat membuat akun, login, mengikuti kegiatan, melihat nilai, dan mencetak sertifikat

### Dashboard
Dashboard akan menampilkan informasi dan berbagai menu sesuai dengan role masing-masing

### Sertifikat
Sertifikat akan dapat dicetak setelah waktu akhir dari kegiatan sudah exceed (terlampaui)

### Event (Kegiatan/lomba)
- Untuk mengikuti kegiatan, akun harus dalam keadaan participant. 
- Kegiatan yang belum mulai atau sedang dimulai masih dapat diikuti.
- Akan ada badge yang menandakan suatu kegiatan sudah dimulai atau sudah selesai
- Kegiatan yang sudah selesai tidak dapat diikuti

### Scoring (Penilaian)
- Nilai akan diberikan oleh juri pada peserta sesuai pada kegiatan yang sudah ditugaskan
- Jika lebih dari satu juri memberikan nilai pada peserta yang sama pada kegiatan yang sama, nilai yang diterima adalah hasil rata-rata





# Instalasi

Berikut ini dibutuhkan agar aplikasi ini dapat dijalankan

- PHP
- Composer | [Dapatkan Composer disini](https://getcomposer.org/download/)
- Web Server
- Database
- Laravel | [Instalasi bisa di cek disini](https://laravel.com/docs/10.x/installation)

Dalam pembuatan, Database dan Web server yang kami gunakan adalah XAMPP dan MySQL (MariaDB)
# Jalankan di Lokal

Clone project

```bash
  git clone https://github.com/zm-ibrahim/JTIEvent.git
```

Masuk ke direktori project yang sudah di clone

```bash
  cd JTIEvent
```

Install dependencies

```bash
  composer install
```

Setting .env

- Copy isi dari ```.env.example``` kedalam file baru bernama ```.env```
- Ganti database, nama database, username, password sesuai dengan database anda
- Anda juga dapat menyesuaikan hal lainnya berdasarkan kebutuhan anda


Migrate database
```bash
  php artisan migrate:fresh --seed
```

Jalankan server

```bash
  php artisan serve
```


# Special Thanks

 - [Stisla](https://github.com/stisla/stisla) | Template
 - [Laravel](https://laravel.com/) | Framework

# Contributor
<a href="https://github.com/zm-ibrahim/JTIEvent/graphs/contributors">
  <img src="https://contrib.rocks/image?repo=zm-ibrahim/JTIEvent" />
</a>
