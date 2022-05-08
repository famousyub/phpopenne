<?php 
require 'vendor/smarty/smarty/libs/Smarty.class.php';
$smarty = new Smarty();



?>
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
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/vue-router/3.0.1/vue-router.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/vue@2.6.10/dist/vue.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/lodash.js/4.17.5/lodash.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-rc.1/js/materialize.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.5.3/vue.min.js"></script>

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


<script type="text/javascript">
/*********
 * components
 *********/
// main app menu component
Vue.component("app-menu", {
  template: `
  <nav class="green lighten-1">
    <div class="nav-wrapper container">
      <div class="col s12">
      <router-link to="/" class="brand-logo">LOGO</router-link>
      <ul id="nav-mobile" class="right hide-on-med-and-down">
        <li><router-link to="/">Home</router-link></li>
        <li><router-link to="/about">About</router-link></li>
        <li><router-link to="/contacts">Contacts</router-link></li>
        <li><router-link to="/404">404</router-link></li>
      </ul>
      </div>
    </div>
  </nav>
`
});
// card component for contact page
// with props
Vue.component("app-cards", {
  props: ["contactlist"],
  methods: {
    ucfirst: function(string) {
      return string.charAt(0).toUpperCase() + string.slice(1);
    }
  },
  template: `
    <div class="row">
    <div class="col s6" v-for="cc in contactlist.results">
        <div class="card horizontal">
            <div class="card-stacked">
                <div class="card-content">
                <div class="img-profile-pic">
                  <img :src="cc.picture.medium" alt="" class="circle responsive-img"> 
                </div>
                <h5>{{ ucfirst(cc.name.title) }} {{ ucfirst(cc.name.first) }} {{ ucfirst(cc.name.last) }}<br><small>#{{ cc.id.name }}{{ cc.id.value }}</small></h5>
                <p><i class="material-icons tiny">person</i> {{ ucfirst(cc.gender) }}</p>
                <p><i class="material-icons tiny">email</i> {{ cc.email }}</p>
                <p><i class="material-icons tiny">location_on</i> {{ ucfirst(cc.location.street) }} {{ ucfirst(cc.location.city) }} {{ ucfirst(cc.location.state) }} {{ cc.location.postcode }}</p>
                <p><i class="material-icons tiny">local_phone</i> {{ cc.phone }}</p>
                <p><i class="material-icons tiny">contact_phone</i> {{ cc.cell }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
  `
});
// main app preloader component
// show preloader when fetching api
Vue.component("app-preloader", {
  template: `
  <div class="center-align">
      <div class="preloader-wrapper big active">
      <div class="spinner-layer spinner-blue-only">
        <div class="circle-clipper left">
          <div class="circle"></div>
        </div>
        <div class="gap-patch">
          <div class="circle"></div>
        </div>
        <div class="circle-clipper right">
          <div class="circle"></div>
        </div>
      </div>
    </div>
  </div>
`
});
// main app footer component
Vue.component("app-footer", {
  template: `
  <footer class="page-footer green lighten-1">
          <div class="container">
            <div class="row">
              <div class="col l6 s12">
                <h5 class="white-text">Footer Content</h5>
                <p class="grey-text text-lighten-4">You can use rows and columns here to organize your footer content.</p>
              </div>
              <div class="col l4 offset-l2 s12">
                <h5 class="white-text">Links</h5>
                <ul>
                  <li><router-link class="grey-text text-lighten-3" to="/random-link">Random Link</router-link></li>
                  <li><router-link class="grey-text text-lighten-3" to="/">Home</router-link></li>
                  <li><router-link class="grey-text text-lighten-3" to="/about">About</router-link></li>
                  <li><router-link class="grey-text text-lighten-3" to="/contacts">Contacts</router-link></li>
                </ul>
              </div>
            </div>
          </div>
          <div class="footer-copyright">
            <div class="container">
            © 2014 Copyright Text
            <a class="grey-text text-lighten-4 right" href="#!">More Links</a>
            </div>
          </div>
        </footer>
  `
});
// home page component
const HomeComponent = {
  template: `
  <div class="page-template page-template-home">
    <div class="hero teal lighten-5">
        <div class="hero-content container center-align">
            <h1>Vue JS: Single Page Application</h1>
            <h5><router-link to="https://www.linkedin.com/in/carllomerabia">https://www.linkedin.com/in/carllomerabia</router-link></h5>
        </div>
    </div>
    <div class="container">
        <br>
        <ul class="collection">
            <li class="collection-item avatar">
                <i class="material-icons circle teal">add_a_photo</i>
                <span class="title">Vue JS Routing</span>
                <p>vue-resource<br>
                Second Line
                </p>
                <a href="#!" class="secondary-content"><i class="material-icons">grade</i></a>
            </li>
            <li class="collection-item avatar">
                <i class="material-icons circle blue">folder</i>
                <span class="title">Dynamic Data From API</span>
                <p>Credits to:<br>
                randomuser.me api
                </p>
                <a href="#!" class="secondary-content"><i class="material-icons">grade</i></a>
            </li>
            <li class="collection-item avatar">
                <i class="material-icons circle green">insert_chart</i>
                <span class="title">Powered By</span>
                <p>Materialize CSS<br>
                materializecss.com
                </p>
                <a href="#!" class="secondary-content"><i class="material-icons">grade</i></a>
            </li>
            <li class="collection-item avatar">
                <i class="material-icons circle red">play_arrow</i>
                <span class="title">Carlito here :D</span>
                <p>Sample SPA with Vue JS<br>
                Second Line
                </p>
                <a href="#!" class="secondary-content"><i class="material-icons">grade</i></a>
            </li>
        </ul>
        
  <div class="row">
    <div class="col s12 m6">
      <div class="card teal">
        <div class="card-content white-text">
          <span class="card-title">Card Title</span>
          <p>I am a very simple card. I am good at containing small bits of information.
          I am convenient because I require little markup to use effectively.</p>
        </div>
        <div class="card-action">
          <a href="#">This is a link</a>
          <a href="#">This is a link</a>
        </div>
      </div>
    </div>
<div class="col s12 m6">
      <div class="card blue-grey">
        <div class="card-content white-text">
          <span class="card-title">Card Title</span>
          <p>I am a very simple card. I am good at containing small bits of information.
          I am convenient because I require little markup to use effectively.</p>
        </div>
        <div class="card-action">
          <a href="#">This is a link</a>
          <a href="#">This is a link</a>
        </div>
      </div>
    </div>
  </div>
            
    </div>
            
</div>
  `
};
// about page component
const AboutComponent = {
  template: `
  <div class="page-template page-template-about">
    <div class="page-title">
        <div class="container">
            <h1>About Us</h1>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col s8">
                <div class="section">
                    <h2>Section</h2>
                    <p><router-link to="https://www.linkedin.com/in/carllomerabia">https://www.linkedin.com/in/carllomerabia</router-link></p>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dignissimos iste quos adipisci ipsa officia molestias! Quibusdam, temporibus odio, quos aliquam quia aliquid consequuntur officia nesciunt vel obcaecati voluptatem assumenda. Reprehenderit.</p>
                </div>
                <div class="divider"></div>
                <div class="section">
                    <h2>Section</h2>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dignissimos iste quos adipisci ipsa officia molestias! Quibusdam, temporibus equuntur officia nesciunt vel obcaecati voluptatem assumenda. Reprehenderit.</p>
                </div>
                <div class="divider"></div>
                <div class="section">
                    <h2>Section</h2>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dignissimos iste quos adipisci ipsa officia molestias! Quibusdam, temporibus odio, quos aliquam quia aliquid consequuntur officia nesciunt vel obcaecati voluptatem assumenda. Reprehenderit.</p>
                </div>
                <div class="divider"></div>
                <div class="section">
                    <h2>Section</h2>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dignissimos iste quos adipisci ipsa officia molestias! Quibusdam, temporibus odio, quos aliquam quia aliquid consequuntur officia nesciunt vel obcaecati voluptatem assumenda. Reprehenderit.</p>
                </div>
            </div>
            <div class="col s4">
                <h3>Sidebar</h3>
                <div class="collection">
                    <a href="#!" class="collection-item">Section Link</a>
                    <a href="#!" class="collection-item active">Section Link</a>
                    <a href="#!" class="collection-item">Section Link</a>
                    <a href="#!" class="collection-item">Section Link</a>
                </div>  
            </div>
        </div>
    </div>
</div>
  `
};
// contacts page component
const ContactsComponent = {
  data() {
    return {
      isLoading: false,
      api: {
        url: "https://randomuser.me/api/",
        results: 100,
        nat: "us,dk,fr,gb"
      },
      contacts: [],
      errors: []
    };
  },
  methods: {
    fetchContacts: function() {
      this.isLoading = true;
      axios
        .get(this.api.url, {
          params: {
            results: this.api.results,
            nat: this.api.nat
          }
        })
        .then(response => {
          this.contacts = response.data;
          this.isLoading = false;
        })
        .catch(error => {
          this.errors = error;
          this.isLoading = false;
        });
    }
  },
  mounted: function() {
    this.fetchContacts();
  },
  template: `
  <div class="page-template page-template-contact container">
    <h1>Contacts</h1>
    <app-preloader v-if="isLoading" />
    <div v-if="_.isEmpty(contacts) === false">
      <app-cards :contactlist="contacts" />
    </div>
  </div>
  `
};
// 404 page component
const PageNotFound = {
  template: `
  <div class="page-template page-template-not-found">
    <div class="page-title">
      <div class="container">
        <h1>Error 404</h1>
      </div>
    </div>
    <div class="container">
      <h2>Page Not Found :(</h2>
    </div>
  </div>
  `
};

/*********
 * routing
 *********/
const routes = [
  { path: "/", component: HomeComponent },
  { path: "/about", component: AboutComponent },
  { path: "/contacts", component: ContactsComponent },
  { path: "*", component: PageNotFound }
];
const router = new VueRouter({
  routes
});
/*********
 * main application
 *********/
const app2 = new Vue({
  el: "#app2",
  router
});

</script>

<div id="app2" class="main-app">
  <!--   main menu   -->
  <app-menu></app-menu>
  <div class="main-content">
    <!--   main content for every pages   -->
       <div id="status" name="status">Status Message</div>
    <router-view></router-view>
  </div>
  <!--   main footer   -->
  <app-footer></app-footer>
</div>

</body>
</html>

<?php 


$request = $_SERVER['REQUEST_URI'];

switch ($request) {
    case '/' :
        require __DIR__ . '/index.php';
        break;
        
    case '/hello' :
        $smarty->assign("name","ayoub");
        $smarty->display("templates/Template1.tpl");
        break;
        
    case '/register' :
        require __DIR__ . '/views/register.php';
        break;
        
    case '/logout' :
        require __DIR__ . '/views/logout.php';
        break;
        
    case '/responselogin' :
        require __DIR__ . '/xhr/response.php';
        break;
        
    case '/authlogin' :
        require __DIR__ . '/views/authlogin.php';
        break;
        
    case '/muser' :
        require __DIR__ . '/views/currentUser.php';
        break;
    case '/login' :
        require __DIR__ . '/views/login.php';
        break;
        
    case '/share' :
        require __DIR__ . '/views/home.php';
        break;
    case '/translate' :
        require __DIR__ . '/views/translate.php';
        break;
    case '' :
        require __DIR__ . '/views/index.php';
        break;
        
        
    case '/test' :
        require __DIR__ . '/views/test.php';
        break;
    case '' :
        require __DIR__ . '/views/index.php';
        break;
        
        
    case '/api/authlogin' :
        require __DIR__ . '/Api/auth.php';
        break;
        
    case '/yubgram' :
        require __DIR__ . '/yubgram/index.php';
        break;
        
        
    case '/allusers' :
        require __DIR__ . '/views/allusers.php';
        break;
        
    case '/about' :
        require __DIR__ . '/views/about.php';
        break;
    case '/home': 
        require __DIR__ .'/views/home.php';
        break;
    case '/data':
        require __DIR__ .'/home.php';
        break;
    case '/me':
        require __DIR__ .'/views/me.php';
        break;
    case '/loginuser':
        require __DIR__ .'/views/loginuser.php';
        break;
    case '/myposts':
        require __DIR__ .'/views/AllPosts.php';
        break;
    case '/profile':
        require __DIR__ .'/views/userprofile.php';
        break;
    default:
        http_response_code(404);
        require __DIR__ . '/views/404.php';
        break;
}





?>


<script>

 var db = openDatabase('myDB', '1.0', 'Test DB', 2 * 1024 * 1024);
         var msg;
			
         db.transaction(function (tx) {
            tx.executeSql('CREATE TABLE IF NOT EXISTS myTable (id unique, log)');
            tx.executeSql('INSERT INTO myTable (id, log) VALUES (1, "foobar")');
            tx.executeSql('INSERT INTO myTable (id, log) VALUES (2, "logmsg")');
            msg = '<p>Log message created and row inserted.</p>';
            document.querySelector('#status').innerHTML =  msg;
         });

         db.transaction(function (tx) {
            tx.executeSql('SELECT * FROM myTable', [], function (tx, results) {
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