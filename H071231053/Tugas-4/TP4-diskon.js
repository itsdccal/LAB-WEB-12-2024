function calculateFinalPrice() {
    let price = parseFloat(prompt("Masukkan harga barang:"));
    let itemType = prompt("Masukkan jenis barang (Elektronik, Pakaian, Makanan, Lainnya):").toLowerCase();

    let discount = 0;

    switch (itemType) {
        case 'elektronik':
            discount = 10;
            break;
        case 'pakaian':
            discount = 20;
            break;
        case 'makanan':
            discount = 5;
            break;
        default:
            discount = 0;
    }
    let finalPrice = price - (price * (discount / 100));

    
    console.log(`Harga awal: Rp${price}`);
    console.log(`Diskon: ${discount}%`);
    console.log(`Harga setelah diskon: Rp${finalPrice}`);
}
calculateFinalPrice();
