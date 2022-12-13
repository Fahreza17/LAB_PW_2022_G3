var input = prompt("Masukkan kalimat apa saja.....")
var arr_input1 = input.split('')
var arr_input2 = []

for(let i = 0; i < arr_input1.length; i++) {
    if(arr_input1[i] == ' ') {
        arr_input1[i] = "spasi"
    }
}

for(let i = 0; i < arr_input1.length; i++) {
    if(arr_input2[arr_input1[i]] == undefined) {
        arr_input2[arr_input1[i]] = 0
    }
    arr_input2[arr_input1[i]]++
}

for (let i in arr_input2) {
    console.log(i + ' = ' + arr_input2[i]);
}