<?php
    define("BASE_URL", "http://localhost/weshop/");

    function direct($url){
        echo "<script> window.location = '$url'; </script>";
    }

    function rupiah ($nilai) {
        return "Rp,".number_format($nilai);
    }
    ?>