
self.addEventListener('install', function(event) {
    console.log('Service worker installed');
});

self.addEventListener('activate', function(event) {
    console.log('Service worker activated');
});

self.addEventListener('fetch', function(event) {
    // Tangani permintaan fetch jika diperlukan
});


function set() {
    var targetElements = document.querySelectorAll('.tgl-done');

    function getWIBDateTime() {
        var now = new Date();
        var utcOffset = 7; // UTC offset untuk WIB adalah +7
        var localOffset = now.getTimezoneOffset() / 60; // Menghitung offset zona waktu lokal
        var wibOffset = utcOffset + localOffset; // Menghitung offset WIB
        var wibTime = new Date(now.getTime() + (wibOffset * 60 * 60 * 1000)); // Menambahkan offset untuk mendapatkan waktu WIB
        return wibTime;
    }

    targetElements.forEach(function(targetElement) {
        // Mendapatkan innerHTML dari elemen tersebut
        var tglDone = targetElement.innerHTML;
        var addForm = targetElement.querySelector('.status-form');

        var parts = tglDone.split(/[\/, :]/);

        // Membuat objek tanggal JavaScript
        var tglDones = new Date(parts[2], parts[1] - 1, parts[0], parts[3], parts[4], parts[5]);

        console.log("Tanggal yang diambil dari elemen HTML:");
        console.log(tglDone); // Menampilkan tanggal dari elemen HTML

        console.log("Tanggal dan waktu saat ini di Waktu Indonesia Barat (WIB):");
        console.log(getWIBDateTime());

        function executeIfPastWIBDate(htmlDate, wibDate, callback) {
            if (htmlDate <= wibDate) {
                callback();
            }
        }

        // Mendapatkan tanggal dan waktu saat ini di Waktu Indonesia Barat (WIB)
        var wibDate = getWIBDateTime();

        // Fungsi yang ingin dijalankan jika tanggal dari elemen HTML melewati atau sama dengan WIB
        function myFunction() {
            if (addForm) {
                addForm.submit();
            } else {
                console.error("Form element not found!");
            }

        }

        // Memanggil fungsi untuk mengecek apakah tanggal dari elemen HTML telah melewati atau sama dengan WIB, dan menjalankan fungsi `myFunction` jika ya.
        executeIfPastWIBDate(tglDones, wibDate, myFunction);
    });
}

function updateSetEverySecond() {
    setInterval(set, 1000);
}

updateSetEverySecond();