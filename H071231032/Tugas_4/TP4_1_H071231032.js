function CountEvenNumbers(start, end) {
    let evenNumbers = [];
    for (let i = start; i <= end; i++) {
        if (i % 2 === 0) {
            evenNumbers.push(i);
        }
    }
    return evenNumbers.length + "(" + evenNumbers.join(", ") + ")";
}

console.log(CountEvenNumbers(1, 10))