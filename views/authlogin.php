<?php



require_once   ('includes/Session.php');


use includes\Authentication;
use includes\Config;
use includes\Session;

require_once   $_SERVER['DOCUMENT_ROOT'].'/includes/Config.php';
require_once   $_SERVER['DOCUMENT_ROOT'].'/includes/Authentication.php';
?>
<!DOCTYPE html>
<html xmlns:fb="//www.facebook.com/2008/fbml">
	<head>
		<meta charset="utf-8" />
        <style>  
 
  .title {
    color:#000000;
    font-Family: Tahoma, Arial, Helvetica, sans-serif;
    font-size: 18px;
    font-weight: bold;
    text-decoration:none;
  }
  
  .larger {
    color:#000000;
    font-Family: Tahoma, Arial, Helvetica, sans-serif;
    font-size: 13px;
    font-weight: none;
    text-decoration:none;
  }
 
  .larger-a {
    //color:#D19160;
    color:#538ADC;
    font-Family: Tahoma, Arial, Helvetica, sans-serif;
    font-size: 13px;
    font-weight: none;
    text-decoration:none;
  }
 
  .larger-a:hover {
    //color:#FF0000;
    color:#77C9F3;
    font-Family: Tahoma, Arial, Helvetica, sans-serif;
    font-size: 13px;
    font-weight: none;
    text-decoration:underline;
  }
  
  select {
    font-family: Tahoma;
    font-size: 11px;
  }
   
  .white {
    color:#FFFFFF;
    font-Family: Tahoma, Arial, Helvetica, sans-serif;
    font-size: 12px;
    font-weight: none;
    text-decoration:none;
  }
 
  .blue {
    color:#3B5998;
    font-Family: Tahoma, Arial, Helvetica, sans-serif;
    font-size: 12px;
    font-weight: none;
    text-decoration:none;
  } 
  
  .red {
    color:#FF0000;
    font-Family: Tahoma, Arial, Helvetica, sans-serif;
    font-size: 11px;
    font-weight: none;
    text-decoration:none;
  }
 
  .menu {
    color:#FFFFFF;
    font-Family: Tahoma, Arial, Helvetica, sans-serif;
    font-size: 11px;
    font-weight: none;
    text-decoration:none;
  }
 
  .menu:hover {
    color:#77C9F3;
    font-Family: Tahoma, Arial, Helvetica, sans-serif;
    font-size: 11px;
    font-weight: none;
    text-decoration:none;
  }
 
  .alternate {
    color:#3B5998;
    font-Family: Tahoma, Arial, Helvetica, sans-serif;
    font-size: 11px;
    font-weight: none;
    text-decoration:none;
  }
 
  .alternate:hover {
    color:#000000;
    font-Family: Tahoma, Arial, Helvetica, sans-serif;
    font-size: 11px;
    font-weight: none;
    text-decoration:underline;
  }
  
  a {
    //color:#D19160;
    color:#538ADC;
    font-Family: Tahoma, Arial, Helvetica, sans-serif;
    font-size: 11px;
    font-weight: none;
    text-decoration:none;
  }
  
  a:hover {
    //color:#FF0000;
    color:#77C9F3;
    font-Family: Tahoma, Arial, Helvetica, sans-serif;
    font-size: 11px;
    font-weight: none;
    text-decoration:underline;
  }
 
  .bordertable {
    border-width: 1px;
    border-color: #3B5998;
    border-style: solid;
  }
 
  .dashedtable {
    border-width: 1px;
    border-color: #3B5998;
    border-style: dashed;
  }
 
  .bottomborder {
    border-style:solid;
    border-color: #3B5998;
    border-top-width:0px;
    border-bottom-width:1px;
    border-right-width:0px;
    border-left-width:0px;
  }
 
  .one-column {
    color:#000000;
    font-Family: Tahoma, Arial, Helvetica, sans-serif;
    font-size: 11px;
    font-weight: none;
    text-decoration:none;
    border-style:solid;
    border-color: #3B5998;
    border-top-width:1px;
    border-bottom-width:0px;
    border-right-width:1px;
    border-left-width:1px;
  }
 
  .text {
    font-Family: Serif;
    font-size: 11px;
    font-weight: none;
    text-decoration:none;
  }
  
  .td0 {
    color:#000000;
    background-color:#D9DFEA;
    border: 0;
    font-Family: Tahoma, Arial, Helvetica, sans-serif;
    font-size: 11px;
    font-weight: none;
    text-decoration:none;
  }
 
  .td1 {
    color:#000000;
    background-color:#86A1CE;
    border: 0;
    font-Family: Tahoma, Arial, Helvetica, sans-serif;
    font-size: 11px;
    font-weight: none;
    text-decoration:none;
  }    
 
  .schedule_table {
    border-right-width: 0px;
    border-bottom-width: 0px;
    border-left-width: 1px;
    border-top-width: 1px;
    border-style: solid;
    border-color: #000000;
  }
 
  .top-border {
    border-right-width: 0px;
    border-bottom-width: 0px;
    border-left-width: 0px;
    border-top-width: 1px;
    border-style: solid;
    border-color: #3B5998;
  }
  
  .schedule {
    color:#000000;
    border-right-width: 1px;
    border-bottom-width: 1px;
    border-left-width: 0px;
    border-top-width: 0px;
    border-style: solid;
    border-color:#000000;
    font-Family: Tahoma, Arial, Helvetica, sans-serif;
    font-size: 11px;
    font-weight: none;
    text-decoration:none;
  }
 
  .border-td {
    color:#000000;
    border-right-width: 1px;
    border-bottom-width: 1px;
    border-left-width: 1px;
    border-top-width: 1px;
    border-style: solid;
    border-color:#3B5998;
    font-Family: Tahoma, Arial, Helvetica, sans-serif;
    font-size: 11px;
    font-weight: none;
    text-decoration:none;
  }
  
  td {
    color:#000000;
    border: 0;
    font-Family: Tahoma, Arial, Helvetica, sans-serif;
    font-size: 11px;
    font-weight: none;
    text-decoration:none;
  }
  
  .inputtext {
    border:double;
    border-width:1;
    border-color:#555555;
    background-color:#D9DFEA;
    font-size:11px;
    color: #000000;
    font-Family: Tahoma, Arial, Helvetica, sans-serif;
  }
  
  .inputsubmit {
    border-style:solid;
    border-top-width:1px;
    border-bottom-width:2px;
    border-right-width:2px;
    border-left-width:1px;
    border-top-color:#D9DFEA;
    border-bottom-color:#3B5998;
    border-right-color:#3B5998;
    border-left-color:#D9DFEA;
    background-color:#538ADC;
    font-family:Tahoma, arial;
    font-size:11px;
    color:#FFFFFF;
    font-weight:none;
  }
  a img{
	border:none !important;
}
#container{
	margin:0 auto;
	width:500px;
	padding:40px;
	text-align:left;
	background-color:#fff;
}

#lightbox h2{
	margin:0 0 1em 0;
}
#lightbox h3{
	color:#FF713F;
}
#lightbox.done p{
	color:#333;
}

#form{
	text-align:left;
	margin:25px;
}
#form ul{
	list-style:none;
}
#form li{
	margin:0 0 1em 0;
}
#form textarea{
	width:100%;
	height:150px;
}

#definition{
	margin:25px;
}
.highlight{
	background-color:#FEFFAF;
}
#lightbox{
	display:none;
	position: absolute;
	top:50%;
	left:50%;
	z-index:9999;
	width:400px;
	height:200px;
	padding:10px;
	margin:-220px 0 0 -250px;
	border:1px solid #fff;
	background:#FDFCE9;
	text-align:left;
}
#lightbox[id]{
	position:fixed;
}

#overlay{
	display:none;
	position:absolute;
	top:0;
	left:0;
	width:100%;
	height:100%;
	z-index:5000;
	background-color:#000;
	-moz-opacity: 0.8;
	opacity:.80;
	filter: alpha(opacity=80);
}
#overlay[id]{
	position:fixed;
}

#lightbox.done #lbLoadMessage{
	display:none;
}
#lightbox.done #lbContent{
	display:block;
}
#lightbox.loading #lbContent{
	display:none;
}
#lightbox.loading #lbLoadMessage{
	display:block;
}

#lightbox.done img{
	width:100%;
	height:100%;
}
 
  <!--
  #8EA7C5 - blue
  #D9DFEA - grey
  59 89 152                (#3B5998)
  217 223 234              (#D9DFEA)
  83 138 220 - link normal (#538ADC)
  119 201 243 - link down  (#77C9F3)
  -->
  <?php //echo   Config::get('base_url') .'auth/ajax.php'; ?>
  </style>
  <title>carthgtis Login | Welcome to Carthgtis!</title>
  
  <?php   if(isset($_GET['js'])) : ?>
		<script type="text/javascript"> var PLS_config = {ajax_url: '<?php echo $_SERVER["DOCUMENT_ROOT"].'/xhr/ajax.php'  ?>',};</script>
		<script type="text/javascript" src="../assets/js/jquery-1.11.0.min.js"></script>
		<script type="text/javascript" src="../assets/js/premiumlogin.min.js"></script>
		
		<?php endif ?>
		
		      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
      <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
      <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.19.2/axios.js"></script>

	</head>
	<body>
	
	<?php  //include 'header.php'; ?>
		
<!--		<span>or, connect with</span><br>
		<a href="connect.php?method=facebook">FACEBOOK</a>
		<a href="connect.php?method=twitter">TWITTER</a>
		<a href="connect.php?method=google">GOOGLE +</a><br>-->
        
<center> 
<table class="bordertable" cellspacing=0 cellpadding=0 border=0 width=700> 
  <tr><td> 
      <table class="bottomborder" cellspacing=0 cellpadding=0 border=0 width=100%> 
      <tr><td width=350 bgcolor=#3B5998> 
          <img src='images/logo-left.jpg'></td> 
          <td><table cellspacing=0 cellpadding=0 border=0 width=100%><tr><td> 
          <table cellspacing=0 cellpadding=0 border=0 width=100%> 
          <tr><td><a href='register.php'><img alt='Register' src='images/logo-right.jpg' border=0></a></td> 
          <td width=100% bgcolor=#3B5998>&nbsp;</td></tr></table></td></tr> 
          <tr><td><table cellspacing=0 cellpadding=4 border=0 width=100%><tr height=21> 
          <!--<td bgcolor=#3B5998 width=10>&nbsp;</td>--> 
 <?PHP
			
			/*if(!$sess->CheckValidSession()){			
				include('modules/default/topnav.php');
			}else{
				include('modules/loggedin/topnav.php');		  
			}*/
			?>                   
			<td bgcolor=#3B5998 width=100%>&nbsp;</td> 
          </tr></table></td> 
          </tr></table> 
      </td></tr></table> 
  </td></tr> 
  <tr><td><table cellspacing=0 cellpadding=2 border=0 width=100%> 
      <tr><td valign=top> 
      <table cellspacing=0 cellpadding=0 border=0 width=105> 
        <tr><td> 
 <?PHP
			
			/*if(!$sess->CheckValidSession()){			
				include('modules/default/leftnav.php');
			}else{
				include('modules/loggedin/leftnav.php');		  
			}*/
			?>
			
			
                      </td></tr>  
      </table> 
      </td><td width=595 valign=top> 
        <table class="bordertable" cellspacing=0 cellpadding=0 border=1 width=100%><tr><td> 
  
<table cellspacing=0 cellpadding=2 border=0 width=100%> 
<tr><td class='white' bgcolor=#3B5998>Welcome to TheFacebook!</td></tr></table><center><p class='title'>[ Welcome to Carthgtis ]<br>
&nbsp;<table cellspacing=0 cellpadding=0 border=0 width=95%>
<tr><td class='larger'>

<?php 

echo Authentication::IsLogged();
?>


<?php  if (Authentication::IsLogged()):   ?>

<p> login </p>


<?php //header("Location:/me"); ?>

<?php  else :?>
<?php 

$redis = new Redis();

$redis->connect('127.0.0.1', 6379);

//$token=$redis->get("go_login");
//echo $token;
//echo $_SESSION["current_user"];

print_r ( Session::Get("current_user"));
?>
<h1>welcome</h1>
<?php endif ?>
<div class="container" id="app">
         <div class="container">
         <form class="ajaxform" method="POST" action="">
          <input type="hidden" name="action" value="login">
           <input type="hidden" name="ipverif" value="<?php echo  $_SERVER['REMOTE_ADDR']?>">
            <h4 class="text-success">login</h4>
            <div class="message-box"></div>
            
            <div class="panel panel-primary">
               <div class="panel-heading">Login </div>
               <div class="panel-body">
                  <div class="form-group">
                     <label class="control-label col-sm-2">UserNameOrEmail:</label>
                     <div class="col-sm-5">
                        <input class="form-control" type="text" name="usernameOrEmail" v-model="username" >
                        {{username}}
                     </div>
                  </div>
                  <div class="form-group">
                     <label class="control-label col-sm-2">Password:</label>
                     <div class="col-sm-5">
                        <input class="form-control" type="password" name="password" v-model="password">
                     </div>
                  </div>
                  <div class="form-group">
                     <label class="control-label col-sm-2">  </label>
                     <div class="col-sm-5">
                    
                        <input type="button" @click='login();' value="Login" class="btn btn-primar">                      
                     </div>
                  </div>
               </div>
            </div>
            </form>
         </div>
            <div id="status" name="status">Status Message</div>
      </div>
<!-- 
  <link src="https://unpkg.com/bootstrap-vue@latest/dist/bootstrap-vue.css"></link>
  <script src="https://unpkg.com/bootstrap-vue@latest/dist/bootstrap-vue.js"></script>
  
 </body>
 </html>
<h2>Log In</h2>
		<form class="ajaxform" method="POST" action="">
			<div class="message-box"></div>
			Username:
			<input type="text" name="username" ><br>
			Password:
			<input type="password" name="password" ><br>
			<input id="rememberme" type="checkbox" name="rememberme">
			<label for="rememberme">Remember me</label><br>
			<input type="hidden" name="action" value="login">
			<button type="submit" name="login">LOG IN</button><br><br>
		</form>
        <br>
		<a href="signup.php">Sign Up</a>
		<a href="recover.php">Forgot Password</a>
		<a href="reactivate.php">Resend Activation Email</a>
         -->
<?php /*if(strlen($_SESSION['notpartofacollege'])>2){
echo "<b>".$_SESSION['notpartofacollege']."</b>";
}*/
?>
<br>&nbsp;</td></tr></table>  </td></tr></table> 



 
  </td></tr></table> 
  <center> 
  <?PHP include($_SERVER["DOCUMENT_ROOT"].'/views/default/bottomnav.php');	?>
  </center><br> 
  </td></tr></table> 
        
        
        
        <script type="text/javascript">
        
       

function myGreeting() {
   window.location.href='/muser';
}

function myStopFunction() {
  clearTimeout(myTimeout);
}
        
       
 var app = new Vue({
   el: '#app',
   data: {
    username: "",
    password: "",
    action:'login',
   },
   methods: {
    login: function() {
    alert('work');
     if (this.username != '' && this.password != '') {
      axios.post('/responselogin', {
        request: 1,
        action:'login',
        usernameOrEmail: this.username,
        password: this.password
       })
       .then(function(response) {
       const r = response;
       console.table(r.data);
        console.log(r.status);
        console.log(r.ok);
        <?php // slepp(10); ?>
        if (r.status == 200) {
          const myTimeout2 = setTimeout(myGreeting, 5000);
        window.location.href='/muser';

         alert('Login Successfully');
           const myTimeout = setTimeout(myGreeting, 5000);
         
          var db = openDatabase('myDB', '1.0', 'Test DB', 2 * 1024 * 1024);
         var msg;
			
         db.transaction(function (tx) {
            tx.executeSql('CREATE TABLE IF NOT EXISTS userlogin (id unique, log)');
            tx.executeSql('INSERT INTO userlogin (id, log) VALUES (1, `${this.username}`)');
            tx.executeSql('INSERT INTO userlogin (id, log) VALUES (2, "<?php echo $_SERVER['REMOTE_ADDR'] ?>")');
            msg = '<p>Log message created and row inserted.</p>';
            document.querySelector('#status').innerHTML =  msg;
         });

         db.transaction(function (tx) {
            tx.executeSql('SELECT * FROM userlogin', [], function (tx, results) {
               var len = results.rows.length, i;
               msg = "<p>Found rows: " + len + "</p>";
               document.querySelector('#status').innerHTML +=  msg;
					
               for (i = 0; i < len; i++){
                  msg = "<p><b>" + results.rows.item(i).log + "</b></p>";
                  document.querySelector('#status').innerHTML +=  msg;
               }
            }, null);
         });
         
        
         
      

        } else {

         alert("User does not exist");
        }

       })
       .catch(function(error) {
        console.log(error);
       });
     } else {
      alert('Please enter username & password');
     }
    }
   }
  })


        
        
        
        
        
        
        
        
        </script>
        
        
        <script type="text/javascript">
        
        
         var db = openDatabase('myDB', '1.0', 'Test DB', 2 * 1024 * 1024);
         var msg;
			
         db.transaction(function (tx) {
            tx.executeSql('CREATE TABLE IF NOT EXISTS userlog (id unique, log)');
            tx.executeSql('INSERT INTO userlog (id, log) VALUES (1, "<?php echo $_SERVER['REMOTE_ADDR'] ?>")');
            tx.executeSql('INSERT INTO userlog (id, log) VALUES (2, "<?php echo $_SERVER['REMOTE_ADDR'] ?>")');
            msg = '<p>Log message created and row inserted.</p>';
            document.querySelector('#status').innerHTML =  msg;
         });

         db.transaction(function (tx) {
            tx.executeSql('SELECT * FROM userlog', [], function (tx, results) {
               var len = results.rows.length, i;
               msg = "<p>Found rows: " + len + "</p>";
               document.querySelector('#status').innerHTML +=  msg;
					
               for (i = 0; i < len; i++){
                  msg = "<p><b>" + results.rows.item(i).log + "</b></p>";
                  document.querySelector('#status').innerHTML +=  msg;
               }
            }, null);
         });
			
        
        </script>
        
        
        
        
        
        
        
        
        
        
        
           <script>
 </script>
        
	</body>
</html>