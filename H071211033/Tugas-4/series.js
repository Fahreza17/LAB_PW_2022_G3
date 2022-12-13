var series = document.getElementById("series")

// function nama(nama) {
    var nama = prompt("Siapa nama panggilan anda?")

    if (nama == '') {
        console.log('Silahkan masukkan nama lebih dulu');
    } else {
        console.log('Selamat datang,',nama);

        umur = prompt("Apakah umur anda 18 tahun atau lebih? input: y / n", nama)

        if (umur == 'n') {
            alert("Anda tidak dapat mengakses situs ini")
        } else if (umur == 'y') {

            console.log("Silahkan memilih genre yang anda suka");

                
                    genre = prompt("Genre apa yang anda suka? input: 1 / 2 / 3\n\n1 - Thriller\n2 - Drama\n3 - Fiksi Ilmiah")

                    if (genre == '1') {

                        console.log("Silahkan memilih series yang anda ingin lihat");

                     
                            series = prompt("Series apa yang ingin anda lihat? input: 1 / 2\n\n1 - Breaking Bad\n2 - Money Heist")

                            if (series == '1') {
                                console.log("Breaking Bad: https://www.netflix.com/watch/70196252");
                            } else if (series == '2') {
                                console.log("Money Heist: https://www.netflix.com/watch/80205342");
                            } else {
                                console.log("Tolong masukkan input yang benar,",nama)
                            }
                       
                    } else if (genre == '2'){

                        console.log("Silahkan memilih series yang anda ingin lihat");
                        
                        // function series(series) {
                            series = prompt("Series apa yang ingin anda lihat? input: 1 / 2\n\n1 - Better Call Saul\n2 - Squid Game")

                            if (series == '1') {
                                console.log("Better Call Saul: https://www.netflix.com/watch/81341715");
                            } else if (series == '2') {
                                console.log("Squid Game: https://www.netflix.com/watch/81262746");
                            } else {
                                console.log("Tolong masukkan input yang benar,",nama)
                            }
                        
                    } else if (genre == '3') {

                        console.log("Silahkan memilih series yang anda ingin lihat");
                        
                     
                            series = prompt("Series apa yang ingin anda lihat? input: 1 / 2\n\n1 - Black Mirror\n2 - Stranger Things")

                            if (series == '1') {
                                console.log("Black Mirror: https://www.netflix.com/watch/80186674?trackId=255824129");
                            } else if (series == '2') {
                                console.log("Stranger Things: https://www.netflix.com/watch/80077368?trackId=255824129");
                            } else {
                                console.log("Tolong masukkan input yang benar,",nama)
                            }
                      
                    } else {
                        console.log("Tolong masukkan input yang benar,",nama)
                    }
                
            } else {
                console.log("Tolong masukkan input yang benar,",nama)
            }
    }


       
