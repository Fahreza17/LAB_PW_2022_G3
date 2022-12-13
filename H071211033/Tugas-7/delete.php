<?php
    require 'functions.php';

    $kode = $_GET['kode'];
    $produk = new Query();

    if($produk->qDelete($kode) > 0) {
        echo '<script>'; 
        echo 'alert("Product deleted!");'; 
        echo 'window.location.href = "index.php";';
        echo '</script>';
        
    } else {
        echo '<script>
        alert("Product failed to be deleted :(");
        </script>';
    }
    
?>