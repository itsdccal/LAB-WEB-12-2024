function dayAfterNDays(startDay, daysLater) {
    const daysOfWeek = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu'];

    
    let startIndex = daysOfWeek.indexOf(startDay);
    let newDayIndex = (startIndex + daysLater) % 7;

    
    console.log(`${daysLater} hari setelah ${startDay} adalah ${daysOfWeek[newDayIndex]}`);
}

dayAfterNDays('Jumat', 1000);
