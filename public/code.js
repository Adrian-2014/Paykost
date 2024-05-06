function generateRandomString(length) {
    const characters = '1ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
    let result = '#';

    for (let i = 1; i < length; i++) {
        result += characters.charAt(Math.floor(Math.random() * characters.length));
    }

    return result;
}

const randomString = generateRandomString(10);
var target = document.getElementById('idku');
// var targets = document.getElementById('pembayaran');
target.innerHTML = randomString;
// targets.innerHTML = randomString;
console.log(randomString);