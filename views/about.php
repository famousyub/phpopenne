<?php 

echo "about";
?>

<?php 

$d = file_get_contents("http://localhost:82/cgi-bin/mainhtml");

echo $d;

?>


  <form action="http://localhost:8096/upload/" enctype="multipart/form-data" method="POST"> 
    <input type="file" name="file" accept="*" />
    <button type="submit">submit </button>
  </form>s