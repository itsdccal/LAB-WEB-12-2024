const prompt = require("prompt-sync")();

function hitungHargaAkhir(harga, jenisBarang) {
    let diskon = 0;

    if (jenisBarang.toLowerCase() === "elektronik") {
        diskon = 0.10;
    } else if (jenisBarang.toLowerCase() === "pakaian") {
        diskon = 0.20; 
    } else if (jenisBarang.toLowerCase() === "makanan") {
        diskon = 0.05;
    } else {
        diskon = 0;
    }
    let hargaAkhir = harga - (harga * diskon);
    
    console.log(`Harga awal : Rp${harga}`);
    console.log(`Diskon : ${diskon * 100}%`);
    console.log(`Harga setelah diskon : Rp.${hargaAkhir}`);
}
let hargaBarang = parseFloat(prompt("Masukkan harga barang : "));
let jenisBarang = prompt("Masukkan jenis barang (Elektronik, Pakaian, Makanan, Lainnya) : ");

hitungHargaAkhir(hargaBarang, jenisBarang);