let money = 5000;
var taruhan;
document.getElementById('money').innerHTML = 'Rp ' + money;
var jumlah;
var kartu;
var bisaAmbilKartu;

function startGame(){
taruhan = parseInt(document.getElementById('taruhan').value);

if (money >= taruhan){
    money = money - taruhan;
    bisaAmbilKartu = true; 
    kartu = [Math.ceil(Math.random()*10),Math.ceil(Math.random()*10)];
    document.getElementById('kartu').innerHTML = kartu[0] + ' ' + kartu[1];
    document.getElementById('jumlah').innerHTML = kartu[0] + kartu[1];
    document.getElementById('taruhan').value = '';
    document.getElementById('tombol').innerHTML ="Want To Play Again?"
    document.getElementById('Over').innerHTML =""
}
else if (document.getElementById('taruhan').value == ''){
    alert('taruhan belum diisi')
}
else{
    alert("duit lu kurang")
}
document.getElementById('money').innerHTML = 'Rp ' + money;
}

var j=0,text;
text="You Lose"
function typing(){
    if(j<text.length){
        document.getElementById("Over").innerHTML += text.charAt(j);
        j++;

        setTimeout(typing,50);
    }
}

var k=0,text1;
text1="BlackJack"
function typing1(){
    if(k<text1.length){
        document.getElementById("Over").innerHTML += text1.charAt(k);
        k++;

        setTimeout(typing1,50);
    }
}

function getCard(){
    var sum = 0;
    if (bisaAmbilKartu){
        kartu.push(Math.ceil(Math.random()*10));  
    }
    for (i=0;i<kartu.length;i++){
        sum += kartu[i];
    }

    
    if( sum >21){

        document.getElementById('Over').innerHTML =""
        j=0;
        typing();
        bisaAmbilKartu = false;
    }
    if(sum == 21){
        document.getElementById('Over').innerHTML =""
        k=0;
        typing1();
        document.getElementById('money').innerHTML = 'Rp ' + money *6;
        bisaAmbilKartu = false;
    } 
    

    document.getElementById('jumlah').innerHTML = sum;
    document.getElementById('kartu').innerHTML = kartu.join(' ');
}

function Reset(){
    money = 5000;
    document.getElementById('money').innerHTML = 'Rp ' +money ;
}

