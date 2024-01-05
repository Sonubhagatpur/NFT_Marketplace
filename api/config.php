<?php

$link = mysqli_connect("localhost", "root", "", "NYBC_coin");


if ($link) {

} else {

    die("Connection failexccxd: " . $link->connect_error);

}

?>