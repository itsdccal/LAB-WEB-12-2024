function guessTheNumber() {
    let randomNumber = Math.floor(Math.random() * 100) + 1; 
    let guess = 0;
    let attempts = 0;

    while (guess !== randomNumber) {
        guess = parseInt(prompt("Masukkan salah satu dari angka 1 sampai 100:"));
        attempts++;

        if (guess > randomNumber) {
            console.log("Terlalu tinggi! Coba lagi.");
        } else if (guess < randomNumber) {
            console.log("Terlalu rendah! Coba lagi.");
        }
    }

    console.log(`Selamat! kamu berhasil menebak angka ${randomNumber} dengan benar.`);
    console.log(`Sebanyak ${attempts}x percobaan.`);
}
guessTheNumber();
