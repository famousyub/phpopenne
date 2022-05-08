<?php 

session_start();
//unset($_SESSION["id"]);
unset($_SESSION["current_user"]);
//session_destroy();
$redis = new Redis();

$redis->connect('127.0.0.1', 6379);

$redis->delete("go_login");
$redis->delete("usergo");
header("Location:authlogin");


?>


<script>

window.location.reload();

window.location.href='/authlogin';
</script>