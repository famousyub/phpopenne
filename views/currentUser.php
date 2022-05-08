<?php

use includes\Authentication;

require_once 'includes/Session.php';
require_once 'includes/Authentication.php';
$url = "http://localhost:8096/api/admin/user";

$redis = new Redis();

$redis->connect('127.0.0.1', 6379);

$token=$redis->get("go_login");

$curl = curl_init($url);
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

$headers = array(
   "Accept: application/json",
   "Authorization: Bearer {$token}",
);
curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
//for debug only!
curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

$resp = curl_exec($curl);
curl_close($curl);
//var_dump($resp);

$me = json_decode($resp,true);

if(!empty($me)){
    //echo $me["data"]["username"];
    //$id = $me['data']['id'];
    echo "<br/>";
    echo Authentication::IsLogged() == true ? '1' :'0' ;
}
else {
    echo "something wrong";
}


//print_r($resp);

echo "<br/>";
//echo $token;

?>









<html xmlns:me="<?php echo $_SERVER['REQUEST_URI'] ?>">
<head>
<title>Carthgtis | <?PHP $me["data"]["username"]; ?></title> 
<link rel="stylesheet" href="style.css"> 
<link rel="shortcut icon" href="favicon.ico"> 

<style type="text/css">

@import url('https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,700');
@import url(https://fonts.googleapis.com/icon?family=Material+Icons);

.card {
  align-items: center;
  background: #fff;
  border-radius: .3em;
  border: .0625em solid mix(#fff, #abbaab, 20%);
  box-shadow: 0 0 1.7em 0 rgba(#abbaab, .55);
  display: flex;
  flex-direction: column;
  max-width: 18em;
  position: relative;
  width: 100%;
}

.card-info {
  padding: 1.2em 1em;
  position: relative;
  text-align: center;
  width: 100%;
}

.card-image {
  margin: auto;
  max-width: ((128px/16px) * 1em);
}

.card--is-edit .card-image {
  margin-bottom: 1em;
}

.card-avatar {
  display: block;
  height: auto;
  width: 100%;
}

.card-avatar--circle {
  border-radius: 50%;
}

.card-name {
  font-size: 1.8em;
  margin-bottom: .2em;
}

.card-email {
  font-size: 1.2em;
  font-weight: 400;
  margin-top: 0;
}

.card-button {
  align-items: center;
  border: 0;
  cursor: pointer;
  display: flex;
  user-select: none;  
  
  > .material-icons {
    font-size: inherit;
  }
}

.card-button[disabled] {
  cursor: stop;
  opacity: .6;
  pointer-events: none;
}

.card-expander {
  background: white;
  border-radius: 50%;
  box-shadow: 0 0 .75em 0 rgba(#abbaab, .55);
  bottom: 0;
  color: coral;
  font-size: 1.5em;
  left: 50%;
  padding: .5em;
  position: absolute;
  transform: translate3d(-50%, 50%, 0);
  transition: all .175s ease-in-out;
  
  &:hover,
  &:focus {
    box-shadow: 0 .3em 2em 0 rgba(#abbaab, .75);
  }
}

.card-expander--is-open {
  background: coral;
  color: white;
  transform: translate3d(-50%, 50%, 0) rotate(-225deg);
  
  &:hover,
  &:focus {
    box-shadow: .15em -.3em 2em 0 rgba(#abbaab, .75);
  }  
}

.card-edit {
  background: transparent;
  border-radius: .2em;
  color: #bbb;
  padding: .25em;
  position: absolute;
  right: .5em;
  top: .5em;
  
  &:hover,
  &:focus {
    background: #eee;
    color: coral;
  }
}

.card-shelf {
  max-height: 0;
  overflow: auto;
  transition: all .175s ease-in-out;
  width: 100%;
}

.card-shelf--is-open {
  margin-top: 1em;
  max-height: inherit;
}

.card--is-edit .card-shelf--is-open {
  margin-top: 0;
}

.card-content {
  padding: 1em;
}

.card-bio {
  margin-top: 0;
  width: 100%;
  
  &:last-child {
    margin-bottom: 0;
  }
}

.card-fields {
  display: flex;
  justify-content: center;
}

.card-input {
  background: mix(#fff, #abbaab, 90%);
  border: .0625em solid mix(#fff, #abbaab, 30%);;
  border-radius: .3em;
  margin: .25em;
  padding: .5em 1em;
  width: 100%;
}

.card-input--inline {
  display: inline-block;
  width: 50%;
}

html { box-sizing: border-box; }
*, *::before, *::after { box-sizing: inherit; }
body { font-family: 'Source Sans Pro', sans-serif; }
.wrapper {
  align-items: center;
  display: flex;
  justify-content: center;
  height: 100vh;
  background: radial-gradient(circle, #ffffff, #abbaab);
}

</style>

<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<script type="text/javascript" src="https://unpkg.com/vue@2.2.6/dist/vue.min.js"></script>
</head>
 <body>
 <div class="wrapper">
  <div id="card" v-bind:class="cardStates" class="card">
    <div class="card-info">
      <div class="card-image">
        <img v-bind:src="avatar" class="card-avatar card-avatar--circle">
      </div>
      <div class="card-fields">
        <h1 v-show="!isEditing" class="card-name">{{fullName}}</h1>
        <input v-show="isEditing" v-model="firstName" type="text" class="card-input card-input--inline" placeholder="Enter first name...">
        <input v-show="isEditing" v-model="lastName" type="text" class="card-input card-input--inline" placeholder="Enter last name...">
      </div>
      <div class="card-fields">
        <h2 v-show="!isEditing" class="card-email">{{email}}</h2>
        <input v-show="isEditing" v-model="email" type="email" class="card-input" placeholder="Enter new email...">      
      </div>      
      <button v-on:click="shelfToggle" v-bind:disabled="isEditing" v-bind:class="toggleOpen" class="card-button card-expander" aria-label="expand-shelf">
        <i class="material-icons" aria-hidden="true">add</i>
      </button>
    </div>
    <div class="card-shelf" v-bind:class="shelfIsOpen">
      <div class="card-content">
        <div class="card-fields">
          <p v-show="!isEditing" class="card-bio">{{bio}}</p>
          <textarea v-show="isEditing" v-model="bio" class="card-input" placeholder="Enter new occupation..."></textarea>      
        </div>
      </div>
    </div>
    <button v-on:click="editContent" class="card-button card-edit">
      <i v-show="!isEditing" class="material-icons" aria-hidden="true">create</i>
      <i v-show="isEditing" class="material-icons" aria-hidden="true">save</i>
    </button>
  </div>
  
      <center>

<table class="bordertable" cellspacing=0 cellpadding=0 border=0 width=700>

  <tr><td>

      <table class="bottomborder" cellspacing=0 cellpadding=0 border=0 width=100%>

      <tr><td width=350 bgcolor=#3B5998>

          <img src='images/logo-left.jpg'></td>

          <td><table cellspacing=0 cellpadding=0 border=0 width=100%><tr><td>

          <table cellspacing=0 cellpadding=0 border=0 width=100%>

          <tr><td><a href='index.php'><img src='images/logo-right.jpg' border=0></a></td>

          <td width=100% bgcolor=#3B5998>&nbsp;</td></tr></table></td></tr>

          <tr><td><table cellspacing=0 cellpadding=4 border=0 width=100%><tr height=21>

          <!--<td bgcolor=#3B5998 width=10>&nbsp;</td>-->

           <?PHP
		  // include('modules/loggedin/topnav.php');
		   ?>

                    <td bgcolor=#3B5998 width=100%>&nbsp;</td>

          </tr></table></td>

          </tr></table>

      </td></tr></table>

  </td></tr>

  <tr><td><table cellspacing=0 cellpadding=2 border=0 width="100%">

      <tr><td valign=top width="136px" style="width:136px">

      <table cellspacing=0 cellpadding=0 border=0 width=100%>

        <tr><td>

           <?PHP
		  // include('modules/loggedin/leftnav.php');
		   ?>

        </td></tr>



      </td></tr>

      </table>

      </td><td width=595 style="width:595px" valign=top>

        <table class="bordertable" cellspacing=0 cellpadding=0 border=1 width=100%><tr><td>



	  <table cellspacing=0 cellpadding=2 border=0 width=100%><tr><td class='white' bgcolor=#3B5998>
	  <?PHP echo $me["data"]["username"] ?>'s Profile <?=$me["data"]["ID"]?>
	  </td></tr></table>


<br>
<table cellspacing=0 cellpadding=6 border=0 width=97% align=center valign=top>
	<tr>
		<td width="40%" valign=top>
			
			
			<table class='bordertable' cellspacing=0 cellpadding=0 width=100% valign=top>
				<tr>
					<td>
						<table cellspacing=0 cellpadding=2 border=0 width=100%> 
							<tr>
								<td class='white' bgcolor=#3B5998 colspan=2>
									Picture
								</td>
								<?PHP if($me["data"]["ID"]==$id){?>
								<td align=right class='white' bgcolor=#3B5998>
									[ <a href="editpicture.php" class=menu>edit</a> ]
								</td>
								<?PHP } ?>
							</tr>
						</table>
						&nbsp;<br><center>
				
						<table cellspacing=0 cellpadding=2 border=0 width=95%>
							<tr>
								<td align=center>
									<?PHP 
									//$pic=$profile->retrieve('defaultpicture');
									//$pic = "photos/default_profile.jpg";		
									//echo "<img src='$pic'>"; 
									?>
								</td>
							</tr>
						</table>
					</td>
				</tr>
			</table>
			
			<br>
		
			

			
			<br>
			<table class='bordertable' cellspacing=0 cellpadding=0 width=100% valign=top>
				<tr>
					<td>
						<table cellspacing=0 cellpadding=2 border=0 width=100%> 
							<tr>
								<td class='white' bgcolor=#3B5998>
									Connection
								</td>
							</tr>
						</table>				
						<table cellspacing=0 cellpadding=2 border=0 width=95% align=center>
							<tr>
								<td align=center>
									<?PHP //print_r($me); 
									?>
								</td>
							</tr>
						</table>
					</td>
				</tr>
			</table>
			
			<br>
			
			
		
	
	</table>
	<br>&nbsp;<center>
	<table class='bordertable' cellspacing=0 cellpadding=0 width=96%><tr><td><table cellspacing=0 cellpadding=2 border=0 width=100%> 

  </td></tr></table>
<div class="w3-container">
  <h2>me</h2>
  <p> Carthgtis user </p>

  <table class="w3-table">
    <tr>
      <th>First Name</th>
      <th>Email</th>
      <th>Phone</th>
    </tr>
    <tr>
      <td>
      <?php echo $me["data"]["username"];?>
      </td>
      <td>
      <?php echo $me["data"]["email"]; ?>
      </td>
      <td>
      <?php   echo $me["data"]["phone"]; ?>
      </td>
    </tr>
    
  </table>
   <div id="status" name="status">Status Message</div>
</div>

<input type="hidden" id="id" />First name:
<input type="text" id="firstName" />
<br/>Last name:
<input type="text" id="lastName" />
<br/>Phone:
<input type="text" id="phone" />
<br/>
<button class="reset">Reset Form</button>
<button class="update">Update</button>
<button class="insert">Insert</button>
<button class="drop">Drop Table</button>
<div id="results"></div>
  </td></table><br></table>
  <?PHP
  
  $time = microtime();
  
   $start = $time[0];
$time = explode(' ', $time);
$time = $time[1] + $time[0];
$finish = $time;

$total_time = round(($finish - $start), 4);
echo '<!--Page loaded in: '.$total_time.' seconds.'."\n-->";
?>
 
 
 
 
 
 


  <?PHP //include($_SERVER["DOCUMENT_ROOT"].'/views/default/bottomnav.php');	?>




  <center>
   <?PHP include($_SERVER["DOCUMENT_ROOT"].'/views/default/bottomnav.php');	?>


 
 
   </center><br>
</div>
 
 
 
 

    <script type="text/javascript">
        
        
         var db2 = openDatabase('myDB', '1.0', 'Test DB', 2 * 1024 * 1024);
         var msg;
			
         db2.transaction(function (tx) {
            tx.executeSql('CREATE TABLE IF NOT EXISTS userlog (id unique, log)');
            tx.executeSql('INSERT INTO userlog (id, log) VALUES (5, "<?php echo  $me["data"]["username"]?>")');
            tx.executeSql('INSERT INTO userlog (id, log) VALUES (6, "<?php echo  $me["data"]["email"] ?>")');
            msg = '<p>Log message created and row inserted.</p>';
            document.querySelector('#status').innerHTML =  msg;
         });

         db2.transaction(function (tx) {
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







<script type="text/javascript">

/*
 * AJAX request for random profiles
 */
let request = new XMLHttpRequest();
request.open('GET', 'https://randomuser.me/api/', true);
request.onload = function() {
  if (request.status >= 200 && request.status < 400) {
    let data = JSON.parse(request.responseText);
    let firstName = data.results[0].name.first;
    let lastName = data.results[0].name.last;
    
    // Update placeholder content with name, email, avatar from API
    card.firstName = firstName.charAt(0).toUpperCase() + firstName.slice(1);
    card.lastName = lastName.charAt(0).toUpperCase() + lastName.slice(1);
    card.avatar = data.results[0].picture.large;
    card.email = data.results[0].email;
  } else {
    console.log('Couldn\'t get data, server error ' + request.status);
  }
};
//request.send();

/*
 * Vue instance for card component
 */
const card = new Vue({
  el: '#card',
  data: {
    firstName: '<?php  echo $me["data"]["username"]?>',
    lastName: '<?php echo  $me["data"]["phone"]?>',
    email: '<?php echo  $me["data"]["email"]?>',
    avatar: 'http://www.placecage.com/c/128/128',
    bio: '<?php  echo $me["data"]["gender"]?>',
    isShelfOpen: false,
    isEditing: false,
  },
  computed: {
    fullName() {
      return this.firstName + ' ' + this.lastName;
    },
    cardStates() {
      return {
        'card--is-open': this.isShelfOpen,  
        'card--is-edit': this.isEditing   
      }
    },
    toggleOpen() {
      if (!this.isEditing) {
        return {
          'card-expander--is-open': this.isShelfOpen        
        }
      }
    },
    shelfIsOpen() {
      return {
        'card-shelf--is-open': this.isShelfOpen        
      }
    }
  },
  methods: {
    shelfToggle() {
      this.isShelfOpen = !this.isShelfOpen;
    },
    editContent() {
      if (!this.isEditing) {
        this.isEditing = !this.isEditing;
        this.isShelfOpen = true;
      } else {
        this.isEditing = !this.isEditing;
        this.isShelfOpen = false;        
      }
    }    
  }
});


</script>


<script type="text/javascript">

// 创建一个DB
const db1 = window.openDatabase(
  'myTest', // 数据库名称
  '1.0', // 数据库版本
  'Web SQL test', // 数据库描述
  '2*1024*1024' // 数据库可用空间大小
);

// 创建表
db1.transaction(function(tx) {
  tx.executeSql(
    'create table if not exists my_data(id primary key, format_city, lat, lng, price, create_time)', // 要执行的SQL语句
    [], // 选项
    null, // 成功回调函数
    function(tx, err) {
      throw(`execute sql failed: ${err.code} ${err.message}`); // 失败回调函数
    }
  );
  // 插入数据
  const data = {
    id: 100314,
    format_city: 'Tunisia, NY, USA',
    lat: 40.7127837,
    lng: -74.0059413,
    price: 150,
    createTime: '2017-03-21'
  };

  // 执行插入
  tx.executeSql(`
    insert into my_data values(${data.id}, '${data.format_city}', ${data.lat}, ${data.lng}, ${data.price}, '${data.createTime}')
  `);
});



</script>
<script type="text/javascript">



var results = $('#results')[0];
var id = $('#id')[0];
var firstName = $('#firstName')[0];
var lastName = $('#lastName')[0];
var phone = $('#phone')[0];
//-------------

$(document).ready(function(){
  var createStatement = "CREATE TABLE IF NOT EXISTS Contacts (id INTEGER PRIMARY KEY AUTOINCREMENT, firstName TEXT, lastName TEXT, phone TEXT)";
  var selectAllStatement = "SELECT * FROM Contacts";
  var insertStatement = "INSERT INTO Contacts (firstName, lastName, phone) VALUES (?, ?, ?)";
  var updateStatement = "UPDATE Contacts SET firstName = ?, lastName = ?, phone = ? WHERE id = ?";
  var deleteStatement = "DELETE FROM Contacts WHERE id=?";
  var dropStatement = "DROP TABLE Contacts";
  
  //([db-Name],[db-Version],[db-description],[db-Size])
  var db = openDatabase("AddressBook", "1.0", "Address Book", 200000);
  var dataset;
  createTable();

  function onError(tx, error) {
      alert(error.message);
  }

  function showRecords() {
      results.innerHTML = '';
      db.transaction(function(tx) {
          tx.executeSql(selectAllStatement, [], function(tx, result) {
              dataset = result.rows;
              for (var i = 0, item = null; i < dataset.length; i++) {
                  item = dataset.item(i);
                  results.innerHTML += '<li>' + item['lastName'] + ' , ' + item['firstName'] + ' <a href="#" onclick="loadRecord(' + i + ')">edit</a>  ' + '<a href="#" onclick="deleteRecord(' + item['id'] + ')">delete</a></li>';
              }
          });
      });
  }

  function createTable() {
      db.transaction(function(tx) {
          tx.executeSql(createStatement, [], showRecords, onError);
      });
  }

  function insertRecord() {
      db.transaction(function(tx) {
          tx.executeSql(insertStatement, [firstName.value, lastName.value, phone.value], loadAndReset, onError);
      });
  }

  function loadRecord(i) {
      var item = dataset.item(i);
      firstName.value = item['firstName'];
      lastName.value = item['lastName'];
      phone.value = item['phone'];
      id.value = item['id'];
  }

  function updateRecord() {
      db.transaction(function(tx) {
          tx.executeSql(updateStatement, [firstName.value, lastName.value, phone.value, id.value], loadAndReset, onError);
      });
  }

  function deleteRecord(id) {
      db.transaction(function(tx) {
          tx.executeSql(deleteStatement, [id], showRecords, onError);
      });
      resetForm();
  }

  function dropTable() {
      db.transaction(function(tx) {
          tx.executeSql(dropStatement, [], showRecords, onError);
      });
      resetForm();
  }

  function loadAndReset() {
      resetForm();
      showRecords();
  }

  function resetForm() {
      firstName.value = '';
      lastName.value = '';
      phone.value = '';
      id.value = '';
  }

  $('.reset').on('click', resetForm);
  $('.update').on('click', updateRecord);
  $('.insert').on('click', insertRecord);
  $('.drop').on('click', dropTable);
});











 

</script>

<?php  


/*
 * 
 * 
 * import https://cdnjs.cloudflare.com/ajax/libs/sql.js/1.3.0/dist/sql-asm.js
const initSqlJs = window.initSqlJs;

const initDb = async () => {
  const SQL = await initSqlJs({
    locateFile: file => `https://cdnjs.cloudflare.com/ajax/libs/sql.js/1.3.0/dist/${file}`
  });

  const db = new SQL.Database();
  
  db.create_function("UDF", (a, b) => `${a} ${b}!! from sql.js 🎉`);
  
  db.run("CREATE TABLE TEST(a text, b text);");
  db.run("INSERT INTO TEST VALUES ('hello', 'world');");
  
  const result = db.exec("SELECT UDF(a, b) FROM TEST;");
  
  document.getElementById("world").textContent = result[0].values[0]
  
}

initDb();
 */
?>














