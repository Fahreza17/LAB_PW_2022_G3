//no 1

// var pesanan = prompt("Tuliskan Pesanan Anda?")
// if(pesanan === null){
//     console.log("Anda harus memasukkan pesanan")
// }else{
// var pengantaran = prompt("Apakah anda sudah memesan? Sudah atau Belum?")
// pengantaran = pengantaran.toUpperCase();
// if(pengantaran == "SUDAH"){
//     var sudah = prompt("Apakah pesanan anda ingin dibuat secara live depan anda? Iya atau tdk?")
//     sudah = sudah.toUpperCase();
//     if(sudah == "IYA"){
//         var live = prompt("Apakah anda bersedia membayar extra? Iya atau tdk")
//         live = live.toUpperCase();
//         if(live == "IYA" ){
//             console.log("Baik kami segera menuju anda")
//         }else if(live=="TDK"){
//             console.log("Baik kami segera memasak masakkan anda")
//         }
//     }else if(sudah == "TDK"){
//         console.log("Baik, kami akan segera memasak masakan Anda ")
//     }
// }else if(pengantaran == "BELUM"){
//     console.log("Anda Harus Menuliskan pesanan terlebih dahulu?")
// }}

// //no 2

//             var times = prompt("mau Angka berapa?");
//             if(isNaN(times)){
//                 console.log(times +" bukan angka");}
//                 else{
//             var until = prompt("Di mod smpe berapa ?");
//             var hasil;
//             var sum = 0;
            
//              for( i = 1; i<= until;i++){
//                  hasil = times % i ;
//                 sum += hasil;
//                     console.log(times +"mod"+i +"=" +hasil);
//                 }
//                 console.log("Hasil Perjumlahan Modus :"+sum)
//             }
        
            //no 3

        // var input= prompt("massukkan nilai");
        //  array = input.split('')
        // array.sort()
        //  console.log(array)
        //   var lastLetter = '';
        //  var counter = 0;

        //  for (let i = 0; i < array.length; i++)
        //  {
        //     if (lastLetter != array[i]){
        //         lastLetter = array[i]
        //         counter = 1;
        //     }
        //     else{
        //         counter ++;
        //     }

        //     if (lastLetter != array[i+1]){
        //         if(lastLetter == " "){
        //             console.log("Spasi"+"="+counter)
        //         }else{
        //         console.log(lastLetter + ' = ' + counter);
        //     }
        // }
        //  }

            

            // no 3 version 2
            var input = prompt("massukan sesuatu?");
            array = input.split('')
            array.sort();
            console.log(array)
            var counter =1;

            for(i = 0 ; i<array.length;i++){
                if(array[i]==array[i+1]){
                    counter++;
                }
                else{
                    if(array[i]==" "){
                        console.log("Spasi"+"="+counter)
                    }else{
                    console.log(array[i]+"="+counter);
                    counter = 1;
                    }
                
          }
               
                
             }


           