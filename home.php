<?php 
use includes\Authentication;



require $_SERVER['DOCUMENT_ROOT'].'/includes/Authentication.php';
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <title>famoume</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <script src="https://cdn.jsdelivr.net/npm/vue@2.6.10/dist/vue.min.js"></script>
<!--  BOOTSTRAP VUE  -->
<!--   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"> -->
 <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.5.13/vue.min.js"></script>
<?php 

include 'meta.php';
?>
 <?php 
 if(isset($_GET["btn"])){
     
     echo ' <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>';
 }
 ?>
<script type="text/javascript">
new Vue({
  el: "#allTheNav",
  data: {
    opened: false
  }
})
</script>


<style type="text/css">
body{
  font-family: "Arial", Serif;
  background-color: #f5f5f5;
  overflow-x: hidden;
}

.navbar{
  background-color: #3b5998;
  overflow: hidden;
  height: 63px;
}

.navbaropen{
  background-color: #3b5998;
  overflow: hidden;
  height: 63px;
  margin-left: 250px;
}

.navbar a{
  float: left;
  display: block;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
}

.navbar ul{
  margin: 8px 0 0 0;
  list-style: none;
}

.navbar a:hover{
  background-color: #ddd;
  color: #000;
}

.side-nav{
  height: 100%;
  width: 0;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  background-color: #111;
  opacity: 0.9;
  overflow-x: hidden;
  padding-top: 60px;
  transition: 0.3s;
}

.sidenavopen{
  height: 100%;
  width: 250px;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  background-color: #111;
  opacity: 0.9;
  overflow-x: hidden;
  padding-top: 60px;
  transition: 0.3s;
}

.side-nav a{
  padding: 10px 10px 10px 30px;
  text-decoration: none;
  font-size 22px;
  color: #ccc;
  display: block;
  transition: 0.3s;
}

.side-nav a:hover{
  color: #fff;
}

.side-nav .btn-close{
  position: absolute;
  top: 0;
  right: 22px;
  font-size: 36px;
  margin-left: 50px;
}

#main{
  transition: margin-left 0.3s;
  padding: 20px;
  overflow: hidden;
  width: 100%;
}

.mainopen{
  transition: margin-left 0.3s;
  padding: 20px;
  overflow: hidden;
  width: 100%;
  margin-left: 250px;
}

nav{
  transition: margin-left 0.3s;
}

.bar{
  display: block;
  height: 5px;
  width: 35px;
  background: #000;
  margin: 5px auto;
}

.midopen{
  width: 0;
}
.bar{
  transition: all .3s ease;
}
.topopen{
  transform: translateY(10px) rotateZ(45deg);
}
.botopen{
  transform: translateY(-10px) rotateZ(-45deg);
}
</style>
</head>
<body>


<div id="allTheNav">



<!-- <nav class="navbar navbar-default"> -->
<!--   <div class="container-fluid"> -->
<!--     <div class="navbar-header"> -->
<!--       <a class="navbar-brand" href="#">famousme</a> -->
<!--     </div> -->
<!--     <ul class="nav navbar-nav"> -->
   
   <?php if(Authentication::IsLogged() ) :?>
<!--       <li class="active"><a href="#">Home</a></li> -->
      
        <li><a href="muser"> <?php  
//                      $redis = new \Redis();
                     
//                      $redis->connect('127.0.0.1', 6379);
                     
                     
                     
//                    $mename=  $redis->get("usergo");
//                      echo $mename;
                     ?> </a></li>
      
      
<!--        <li><a href="/me">me</a></li> -->
<!--       <li><a href="/">home</a></li> -->
<!--       <li><a href="/about">about </a></li> -->
<!--       <li><a href="/home">page</a></li> -->
<!--        <li><a href="/data">data</a></li> -->
<!--         <li><a href="profile">profile</a></li> -->
<!--           <li><a href="/translate">translator</a></li> -->
<!--                 <li><a href="loginuser">cureent user</a></li> -->
<!--                     <li><a href="myposts">myposts</a></li> -->
                    
                   
                    
<!--                      <li><a href="logout">logout</a></li> -->
                     <?php else :?>
                     
<!--                      <li><a href="authlogin">login</a></li> -->
                     
                     <?php endif?>
                
          
<!--     </ul> -->
<!--   </div> -->
<!-- </nav> -->

    <nav id="navigator" class="navbar" :class="{navbaropen: opened}">
      <span class="open-slide">
        <a href="#" @click="opened = !opened">
          <div>
            <div class="bar" :class="{topopen: opened}"></div>
            <div class="bar" :class="{midopen: opened}"></div>
            <div class="bar" :class="{botopen: opened}"></div>
          </div>
        </a>
      </span>
      <ul class="navbar-nav">
        <?php if(Authentication::IsLogged() ) :?>
      <li class="active"><a href="#">Home</a></li>
      
        <li><a href="muser"> <?php  
                     $redis = new \Redis();
                     
                     $redis->connect('127.0.0.1', 6379);
                     
                     
                     
                   $mename=  $redis->get("usergo");
                     echo $mename;
                     ?> </a></li>
      
      
       <li><a href="/me">me</a></li>
      <li><a href="/">home</a></li>
      <li><a href="/about">about </a></li>
      <li><a href="/home">page</a></li>
       <li><a href="/data">data</a></li>
        <li><a href="profile">profile</a></li>
          <li><a href="/translate">translator</a></li>
                <li><a href="loginuser">cureent user</a></li>
                    <li><a href="myposts">myposts</a></li>
                    
                   
                    
                     <li><a href="logout">logout</a></li>
                     <?php else :?>
                     
                     <li><a href="authlogin">login</a></li>
                     
                     <?php endif?>
      </ul>
    </nav>
  <div id="side-menu" class="side-nav" :class="{sidenavopen: opened}">
    <a href="#">Home</a>
    <a href="#">About</a>
    <a href="#">Services</a>
    <a href="#">Contact</a>
  </div>
  <div id="main" :class="{mainopen: opened}">
    <h1>
    <?php  
    if (isset($_SESSION["user_id"])) {
        echo "hello".$_SESSION["user_id"];
        
    }
    
    else echo "hello guest";
    ?>
    

     </h1>
  </div>

</div>

<div class="container">
 
</div>

</body>
</html>


<?php   
   /* echo Authentication::IsLogged();
if(Authentication::IsLogged()) :*/
?> 
                     <?php  //else :?>
                     
                         

<?php 

echo "login";
//header("Location:authlogin");
echo Authentication::IsLogged();
?>

<?php// endif?>  

<?php 

/*
foreach ($_COOKIE as $key=>$val)
{
    echo $key.' is '.$val."<br>\n";
}
*/