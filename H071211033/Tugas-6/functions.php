<?php
    $conn = mysqli_connect("localhost", "root", "", "produk");
    // $kode = ($_GET['kode']);


    function query($query) {
        global $conn;
        $result = mysqli_query($conn, $query);
        $rows = [];

        while ($row = mysqli_fetch_assoc($result)){
            $rows[] = $row;
        };

        return $rows;
    };

    function qInsert($post) {
        global $conn;
        $kode = htmlspecialchars($post['kode']);
        $nama = htmlspecialchars($post['nama']);
        $jenis = htmlspecialchars($post['jenis']);
        $query = "INSERT INTO senjata VALUES ('$kode', '$nama', '$jenis')";

        mysqli_query($conn, $query);

        return mysqli_affected_rows($conn);
    };

    function qDelete($kode) {
        global $conn;

        mysqli_query($conn, "DELETE FROM senjata WHERE kode = '$kode'");

        return mysqli_affected_rows($conn);
    };

    function qUpdate($kode) {
        global $conn;
        $kode = ($_GET['kode']);
        $nama = htmlspecialchars($_POST['nama']);
        $jenis = htmlspecialchars($_POST['jenis']);
        $query = "UPDATE senjata SET nama = '$nama', jenis = '$jenis' WHERE kode = '$kode'";

        mysqli_query($conn, $query);

        return mysqli_affected_rows($conn);
    };

    function dup($post) {
        global $conn;
        $kode = htmlspecialchars($post['kode']);
        $nama = htmlspecialchars($post['nama']);
        $qKode = "SELECT kode FROM senjata WHERE kode = '$kode'";
        $qNama = "SELECT nama FROM senjata WHERE nama = '$nama'";
        $qK = mysqli_query($conn, $qKode);
        $qN = mysqli_query($conn, $qNama);

        if(mysqli_num_rows($qK) > 0 || mysqli_num_rows($qN) > 0) {
            return true;
        } else {
            return false;
        };
    }
?>