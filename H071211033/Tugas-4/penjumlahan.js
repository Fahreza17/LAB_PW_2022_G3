const brp = prompt("Penjumlahan berapa?")
const bnyk = prompt("Ingin dijumlahkan sampai berapa?")
var tot = 0
var hasil = 0
const num_brp = Number(brp)
const num_bnyk = Number(bnyk)

// if(brp==blank) {
//     console.log("gg")
// }

for(let i = 1; i <= num_bnyk; i++){
    hasil = i+num_brp

    console.log(i, "+", num_brp, "=", hasil);
    tot+=hasil
}

console.log("Hasil seluruh penjumlahan =",tot);