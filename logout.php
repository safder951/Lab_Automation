<?php

include('include/header.php');
session_unset();
session_destroy();

echo '<script>window.location.href="http://localhost/lab/index.php";</script>';
exit();
?>