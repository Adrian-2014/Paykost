
self.addEventListener('install', function(event) {
    console.log('Service worker installed');
});

self.addEventListener('activate', function(event) {
    console.log('Service worker activated');
});

self.addEventListener('fetch', function(event) {
    // Tangani permintaan fetch jika diperlukan
});




function updateSetEverySecond() {
    setInterval(set, 1000);
}

updateSetEverySecond();