function ubahFormatTanggal(tanggal) {
    // Array untuk nama bulan
    var namaBulan = [
        "Januari", "Februari", "Maret", "April", "Mei", "Juni",
        "Juli", "Agustus", "September", "Oktober", "November", "Desember"
    ];

    // Pisahkan tanggal, bulan, dan tahun
    var tanggalSplit = tanggal.split('-');
    // Pastikan terdapat tiga elemen setelah split
    if (tanggalSplit.length !== 3) {
        return "Format tanggal tidak valid";
    }
    var tahun = tanggalSplit[0];
    var bulan = parseInt(tanggalSplit[1], 10);
    var tanggal = parseInt(tanggalSplit[2], 10);

    // Periksa apakah tanggal, bulan, dan tahun valid
    if (isNaN(tahun) || isNaN(bulan) || isNaN(tanggal)) {
        return "Format tanggal tidak valid";
    }

    // Buat string dengan format yang diinginkan
    var tanggalBaru = tanggal + " " + namaBulan[bulan - 1] + " " + tahun;

    return tanggalBaru;
}
var input = document.querySelector('#tm');
if (input) {
    var tanggalAwal = input.value;
    var tanggalBaru = ubahFormatTanggal(tanggalAwal);
    var targetTanggal = document.querySelector('#tgl-masuk');
    targetTanggal.innerHTML = tanggalBaru;
    console.log(tanggalBaru);
} else {
    console.error("Elemen input dengan id '#tm' tidak ditemukan.");
}

// Ambil nilai dari elemen HTML
var tanggalDiberikan = document.getElementById('tm').value;

// Buat objek tanggal dari nilai yang diambil
var tanggalDiberikanObj = new Date(tanggalDiberikan);

// Tanggal hari ini
var tanggalHariIni = new Date();

// Hitung selisih dalam milidetik
var selisihWaktu = tanggalHariIni - tanggalDiberikanObj;

// Konversi selisih waktu ke hari
var selisihHari = Math.floor(selisihWaktu / (1000 * 60 * 60 * 24));

// Hitung selisih bulan dan hari
var selisihBulan = tanggalHariIni.getMonth() - tanggalDiberikanObj.getMonth() + (12 * (tanggalHariIni.getFullYear() - tanggalDiberikanObj.getFullYear()));
var selisihHariSisa = tanggalHariIni.getDate() - tanggalDiberikanObj.getDate();

// Jika selisih hari negatif, kurangi satu bulan
if (selisihHariSisa < 0) {
    selisihBulan--;
    selisihHariSisa += new Date(tanggalHariIni.getFullYear(), tanggalHariIni.getMonth(), 0).getDate();
}
// Tampilkan hasil
console.log(selisihBulan + " bulan " + selisihHariSisa + " hari.");
var durasi = document.getElementById('durasi');
durasi.innerHTML = selisihBulan + " bulan " + selisihHariSisa + " hari.";