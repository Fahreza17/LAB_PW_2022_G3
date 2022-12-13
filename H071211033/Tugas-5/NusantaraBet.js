let kartu = 0
let jumlah = 0
let uang = 5000
let pesan = ''
let arrKartu = []
let numBet
let lenghtKartu
let jumlahhtml = document.querySelector("#jumlah")
let kartuhtml = document.querySelector("#kartu")
let pesanhtml = document.querySelector("#pesan")
let uanghtml = document.querySelector("#uang")

uanghtml.textContent = 'Uang anda: Rp'+ uang

var mulai = () => {
    let bet = document.querySelector("#bet").value
    jumlah = 0
    arrKartu = []
    jumlahhtml.textContent = "Jumlah:"
    kartuhtml.textContent = "Kartu anda:"
    

    if(bet == '') {
        alert("Masukkan jumlah taruhan dulu")
    }
    else {
        numBet = Number(bet)

        if(numBet > uang) {
            alert("Jumlah taruhan melebihi uang anda")
        } else {
            uang -= numBet
            uanghtml.textContent = 'Uang anda: Rp'+ uang
            arrKartu = []
            jumlah = 0
            kartuhtml.textContent = "Kartu anda:"

            for(let i = 0; i < 2; i++) {
                arrKartu[i] = kartuBaru()
                jumlah += arrKartu[i]
                kartuhtml.textContent += ' ' + arrKartu[i]

            }

            jumlahhtml.textContent = "Jumlah: " + jumlah
            document.getElementById("mulai").textContent="Coba lagi";

            game()
        }

    }
}

var game = () => {

    if(jumlah === 21) {
        pesan = "Selamat anda memenangkan Black Jack!!"
        uang += (numBet*5)

        uanghtml.textContent = 'Uang anda: Rp'+ uang
    
    } else if(jumlah > 21) {
        pesan = "Anda hampir menang! Silahkan coba lagi"
    } else {
        pesan = "Silahkan ambil kartu lagi"
    }

    pesanhtml.textContent = pesan
}

var reset = () => {
    uang = 5000
    main = true
    bj = false
    uanghtml.textContent = 'Uang anda: Rp'+ uang
}

var kartuBaru = () => {
    let nomorKartu = Math.floor(Math.random()*(10 - 1 + 1)) + 1
    
    if(nomorKartu === 1) {
        return 11
    } else {
        return nomorKartu
    }
}

var ambilKartu = () => {
    lenghtKartu = Number(arrKartu.length)
    arrKartu[lenghtKartu] = kartuBaru()

    jumlah += arrKartu[lenghtKartu]
    
    kartuhtml.textContent += ' ' + arrKartu[lenghtKartu]
    jumlahhtml.textContent = "Jumlah: " + jumlah

    game()
}