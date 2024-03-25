<?php
require './admin/function.php';
$_SESSION = [];
session_unset();
session_destroy();
echo "<script>alert('Anda berhasil logout!'); window.location.href = 'index.php'</script>";
