function HargaAkhir(harga, jenisBarang) {
    let diskon = 0;
    jenisBarang = jenisBarang.toLowerCase().trim()

    if (jenisBarang == 'elektronik') { diskon = 0.10 }
    else if (jenisBarang == 'pakaian') { diskon = 0.20 }
    else if (jenisBarang == 'makanan') { diskon = 0.05 }
    else { diskon = 0 }

    let diskonHarga = harga * diskon;
    let hargaAkhir = harga - diskonHarga;

    console.log(`\nHarga Awal: Rp${harga}`);
    console.log(`Diskon: ${diskon * 100}%`);
    console.log(`Harga setelah diskon: Rp${hargaAkhir}`);
}

const prompt = require('prompt-sync')();

let harga = prompt('Masukkan harga barang: ');
let jenisBarang = prompt('Masukkan jenis barang (Elektronik, Pakaian, Makanan, Lainnya): ');

HargaAkhir(harga, jenisBarang);