const readline = require('readline');

const rl = readline.createInterface({
    input: process.stdin,
    output: process.stdout
});

function tebakAngka() {
    const angkaTebakan = Math.floor(Math.random() * 101);
    let percobaan = 0;
    const tanyaTebakan = () => {
        rl.question("Masukkan salah satu dari angka 1 sampai 100 : ", (input) => {
            let tebakan = parseInt(input);
            percobaan++;
            if (tebakan > angkaTebakan) {
                console.log("Terlalu tinggi! Coba lagi");
                tanyaTebakan();
            } else if (tebakan < angkaTebakan) {
                console.log("Terlalu rendah! Coba lagi");
                tanyaTebakan();
            } else {
                console.log(`Selamat! Kamu berhasil menebak angka ${angkaTebakan} dengan benar Sebanyak ${percobaan}x percobaan.`);
                rl.close();
            }
        });
    };
    tanyaTebakan();
}
tebakAngka();