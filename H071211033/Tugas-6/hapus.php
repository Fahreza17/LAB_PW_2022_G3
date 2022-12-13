<?php
    require 'functions.php';

    $kode = $_GET['kode'];

    if(qDelete($kode) > 0) {
        echo '<script>'; 
        echo 'alert("Produk berhasil dihapus");'; 
        echo 'window.location.href = "index.php";';
        echo '</script>';
        
    } else {
        echo '<script>
        alert("Produk gagal dihapus");
        </script>';
    }
    
?>