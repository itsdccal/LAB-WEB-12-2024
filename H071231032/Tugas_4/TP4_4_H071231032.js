function tebakAngka() {
    const angkaRandom = Math.floor(Math.random() * 101);
    let angkaUser;
    const prompt = require('prompt-sync')();
    let totalPercobaan = 1;

    while (true) {
        angkaUser = prompt('Masukkan salah satu dari angka 1 sampai 100: ');

        if (angkaRandom > parseInt(angkaUser)) {
            console.log('Terlalu rendah! Coba lagi.');
            totalPercobaan += 1;
        } else if (angkaRandom < parseInt(angkaUser)) {
            console.log('Terlalu tinggi! Coba lagi.');
            totalPercobaan += 1;
        } else {
            console.log(`Selamat! kamu berhasil menebak angka ${angkaRandom} dengan benar.`);
            console.log(`Sebanyak ${totalPercobaan}x percobaan.`);
            break;
        }
    }
}

tebakAngka();