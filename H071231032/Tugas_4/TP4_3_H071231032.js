function HariApa(hariIni, jumlahHari) {
    const HARI = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Ahad'];
    let idxHariIni = HARI.indexOf(hariIni.charAt(0).toUpperCase() + hariIni.slice(1).toLowerCase().trim());

    if (idxHariIni === -1) { return console.log('\nHari tidak valid'); }

    jumlahHari = parseInt(jumlahHari);

    let hariMasDep = (idxHariIni + jumlahHari) % 7;

    console.log(`\n${jumlahHari} hari setelah hari ${HARI[idxHariIni]} adalah hari ${HARI[hariMasDep]}.`);
}

const prompt = require('prompt-sync')();

let hariIni = prompt('Masukkan hari: ');
let jumlahHari = prompt('Masukkan jumlah hari: ');

HariApa(hariIni, jumlahHari);