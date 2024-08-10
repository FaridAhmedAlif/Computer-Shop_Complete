<?php
session_start();
echo "Logout..";
session_destroy();

header('location:../');

?>