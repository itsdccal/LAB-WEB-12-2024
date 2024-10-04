function hariSetelah(sekarang, jumlahHari) {
    sekarang = sekarang.toLowerCase();
    const hari = ['senin', 'selasa', 'rabu', 'kamis', 'jumat', 'sabtu', 'minggu'];
    let indexSekarang = hari.indexOf(sekarang);
    let indexBaru = (indexSekarang + jumlahHari) % 7;
    return hari[indexBaru];
}
console.log(hariSetelah('Jumat', 1000));