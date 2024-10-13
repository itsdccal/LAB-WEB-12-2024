function countEvenNumbers (star, end) {
    let hasil = [];
    for (i = star; i <= end; i++) {
        if (i % 2 == 0) {
            hasil.push(i);
        }
    }
    let count = hasil.length;
    console.log(`${count} (${hasil.join(',')})`);
    
    }
countEvenNumbers(1,10);