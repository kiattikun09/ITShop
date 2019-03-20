<?php
session_start();
session_destroy();
header("Location: ../ItShopOn/index.php");
exit;
?>