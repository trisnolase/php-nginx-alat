<?php
$dblink = mysqli_connect("localhost", "root", "", "dbinvalatv2");

if (mysqli_connect_errno()) {
    echo "no connection : " . mysqli_connect_error();
}
