function countEvenNumbers(start, end) {
    let count = 0;
    let evenNumbers = [];

    for (let i = start; i <= end; i++) {
        if (i % 2 === 0) {
            evenNumbers.push(i); // Menambahkan bilangan genap ke array
            count++;
        }
    }

    // Menampilkan hasil
    console.log(`Jumlah bilangan genap: ${count}`);
    console.log(`Bilangan genap: ${evenNumbers.join(', ')}`);

    return count;
}

// Contoh penggunaan
countEvenNumbers(1, 10);
