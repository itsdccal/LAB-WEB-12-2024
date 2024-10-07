// // // nomor 1
// console.log("nomor 1");

// function countEvenNumbers(start, end) {
//     const genap = [];
//     for (let i = start; i <= end; i++) {
//         if (i % 2 === 0) {
//             genap.push(i);
//         }
//     }
//     const count = genap.length; 
//     const hasil_genap = `(${genap.join(", ")})`;
//     console.log(count, hasil_genap);
// }
// countEvenNumbers(1,100)





// // // nomor 2
// console.log("nomor 2");
// const harga = prompt("Masukkan harga barang: ");
// const jenis = prompt("Masukkan jenis barang (Elektronik, Pakaian, Makanan, Lainnya) : ")

// jenis_barang = jenis.toLowerCase();

// let diskon;
// let harga_diskon;
// switch (jenis_barang) {
//     case 'elektronik':
//         diskon = 0.15;
//         harga_diskon = harga - (harga * diskon);
//         break;
//     case 'pakaian':
//         diskon = 0.2;
//         harga_diskon = harga - (harga * diskon);
//         break;
//     case 'makanan':
//         diskon = 0.05;
//         harga_diskon = harga - (harga * diskon);
//         break;
//     default :
//         diskon = 0
//         harga_diskon = harga;
// }

// console.log("harga awal: ", harga);
// console.log("diskon: ", (diskon * 100) + " %");
// console.log("harga setelah diskon: ", harga_diskon);




// // Nomor 3
// console.log("Nomor 3");
// function cari(nama, hari) {
//     const nama_hari = ['senin', 'selasa', 'rabu', 'kamis', 'jumat', 'sabtu', 'minggu'];
//     let indeks = nama_hari.indexOf(nama);
//     let tambahan = hari % 7
//     let hasil = indeks + tambahan
//     let h = hasil % 7
//     console.log(nama_hari[h]);
// }
// const nama = prompt("masukkan hari awal: ");
// const hari = prompt("anda ingin mengecek berapa hari kedepan: ")
// cari(nama, hari);





// Nomor 4
console.log("Nomor 4");
let angkaRandom = 1 + Math.floor(Math.random() * 10); 

let percobaan = 0;

let kata = ''
function temukan(tebakan, angka) {
    percobaan++; 
    if (tebakan < angka) {
        document.write("angka terlau rendah <br>" )
        kata = "angka terlau rendah <br>" 
        return false; 
    } else if (tebakan > angka) {
        document.write("angka terlau tingga")
        kata = "angka terlau renda <br>" 
        return false; 
    } else {
        document.write(`Tebakan Anda benar! Anda telah mencoba ${percobaan} kali.`)
        return true;
    }
}

while (!temukan(angkaTebakan, angkaRandom)) {
    angkaTebakan = parseInt(prompt("Masukkan salah satu angka dari 1 sampai 10: "));
}
