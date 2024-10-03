function countEvenNumbers(start,end) {
    let genap = []
    for (let i = start; i <= end;i++ ){
        if (i % 2 === 0) {
            genap.push(i)
        }
    }return `${genap.length} (${genap.join(", ")})`;
}

console.log('Output: ' + countEvenNumbers(1,10));
