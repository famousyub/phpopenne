<?php
/* Smarty version 4.1.0, created on 2022-04-07 07:59:48
  from '/home/user/Bureau/phpopen/HomeLife/templates/myposts.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.0',
  'unifunc' => 'content_624e4c9c07b470_41055328',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '9bd6490254611688779a8945510710aa5ac4dea1' => 
    array (
      0 => '/home/user/Bureau/phpopen/HomeLife/templates/myposts.tpl',
      1 => 1649298585,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_624e4c9c07b470_41055328 (Smarty_Internal_Template $_smarty_tpl) {
?><html>
    <head>
        <title>Info</title>
        <?php echo '<script'; ?>
 src="<https://cdn.jsdelivr.net/npm/vue@2.6.14/dist/vue.js>"><?php echo '</script'; ?>
>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css"/>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.2.3/animate.min.css"/>
        <style>
       
        
        
        body{
        background-color:#000;
  margin-top: 40px;
}
ul, li {
    list-style: none;
}
h5{
  margin: 0;
  
}
h3{
  color: #2996bd;
  margin: 10px 0px 15px;
  padding-bottom:10px;
  padding-left: 10px;
  border-left: 5px solid #32aae1;
}
.sidebar.widget {
  background: #f2f2f2;
  border: 1px solid #ddd;
  padding: 10px 20px;
}
.sidebar.widget ul {
    margin: 0px;
    padding: 0;
    overflow: hidden;
}
.sidebar.widget ul li {
    overflow: hidden;
    font-size: 14px;
    margin-bottom: 20px;
    border-bottom: 1px dashed #ddd;
    padding-bottom: 20px
}
.sidebar-thumb{
    float: left;
    overflow: hidden;
    margin-right: 15px;
}
.sidebar-thumb img{
  background: #fff;
  border: 1px dashed #e0e0e0;
  padding: 6px;
  height: 75px;
  width: 75px;
  
  -webkit-border-radius: 100px;
  -moz-border-radius: 100px;
  border-radius: 100px;
}
.sidebar-content h5{ 
    font-size: 16px;
    cursor: pointer;
    line-height: 24px;
}
.sidebar-content h5 a:hover{ 
  color: #2996bd;
}

.sidebar-content h5 a{ 
    color: #202020;
    outline: 0 none;
    text-decoration: none;
    font-weight: bold
}
.sidebar-meta{
  margin-top: 10px;
}
.sidebar-meta span{
  color: #2e2e2e;
}
.sidebar-meta span.time{
  margin-right: 10px;
}
.sidebar-meta span i{
  color: #2996bd
}
#posts {
  text-align: center;
  font-size: 0;
}
#posts .post {
  position: relative;
  width: 100%;
  height: 500px;
  margin: 0;
  border: 3px solid #000;
  display: inline-block;
  background-size: cover;
  background-position: center center;
  transition: all 300ms ease-out;
}
#posts .post h2 {
  color:#fff;
  position: absolute;
  bottom: 80px;
  margin: 0;
  font-size: 2vw;
  line-height: 0.8;
  font-family: 'MuseoSansRounded-900', 'Arial Black', sans-serif;
  padding: 0 60px;
  text-transform: uppercase;
  text-align: left;
  z-index: 1000;
}
#posts .post p {
  color:#fff;
  position: absolute;
  bottom: 40px;
  margin: 0;
  font-size: 1.5vw;
  line-height: 0.8;
  padding: 0 60px;
  text-transform: capitalize;
  text-align: left;
  z-index: 1000;
}
#posts .post:before {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  display: block;
  background: #000;
  opacity: 0.5;
  -ms-filter: progid:DXImageTransform.Microsoft.Alpha(opacity=50);
  filter: alpha(opacity=50);
  transition: all 300ms ease-out;
  content: '';
  z-index: 1;
}
#posts .post:hover:before {
  opacity: 0.2;
  -ms-filter: progid:DXImageTransform.Microsoft.Alpha(opacity=20);
  filter: alpha(opacity=20);
}



        </style>
    </head>
    <body>
     
     
     <div class="row column header" id="app">
  <h1 class="cover-heading">Live Search Test</h1>
  <div class="medium-6 medium-offset-3 ctrl">
    <form class="searchForm" v-on:submit.prevent="submitSearch">
      <input type="text" v-model="searchQuery" placeholder="Type here" @keyup="submitSearch">
      <span v-show="searchQuery" class="removeInput" @click="removeSearchQuery">+</span>
    </form>
    
    
  </div>
  <div class="searchResult" v-show="isResult">
      <transition-group name="expand" tag="div">
    <a :href="'http://en.wikipedia.org/?curid='+ elem.pageid" v-for="elem in articleObj" v-bind:key="elem">

      <div class="medium-8 medium-offset-2 columns card">
        <h1 class="text-headline">{{ elem.title }}</h1>
        <p class="text-body-1">{{ elem.extract }}</p> 
      </div>

      </a>
      </transition-group>
  </div>
</div>
     
     
     
      <div id="root"></div>
      
      
      
      
      <div id="app2"></div>
     
    
    

     
     <div class="container">
  <div class="row">
      <div class="col-md-4"></div><!-- .Col ends here -->
      <div class="col-md-4">
          <div class="sidebar widget">
              <h3>Recent Post</h3>
              <ul>
               <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['posts']->value, 'v');
$_smarty_tpl->tpl_vars['v']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->do_else = false;
?>
                <li>
                    <div class="sidebar-thumb">
                      <video width="320" height="240" controls>
  <source src="<?php echo $_smarty_tpl->tpl_vars['link']->value;
echo $_smarty_tpl->tpl_vars['v']->value->getPostFile();?>
" type="video/mp4">
  <source src="<?php echo $_smarty_tpl->tpl_vars['link']->value;
echo $_smarty_tpl->tpl_vars['v']->value->getPostFile();?>
" type="video/ogg">
Your browser does not support the video tag.
</video>

<img src="<?php echo $_smarty_tpl->tpl_vars['link']->value;
echo $_smarty_tpl->tpl_vars['v']->value->getPostFile();?>
" alt="hello" class="img" height="80" width="80"   />
                      
                        
                    </div><!-- .Sidebar-thumb -->
                    <div class="sidebar-content">
                        <h5 class="animated bounceInRight"><a href="<?php echo $_smarty_tpl->tpl_vars['v']->value->getPostText();?>
">
                        <img src="<?php echo $_smarty_tpl->tpl_vars['v']->value->getPostText();?>
" alt=" <?php echo $_smarty_tpl->tpl_vars['v']->value->getPostText();?>
" />s
                       
                        </a></h5>
                    </div><!-- .Sidebar-thumb -->
                    <div class="sidebar-meta">
                        <span class="time" ><i class="fa fa-clock-o"></i> 
                        <?php echo $_smarty_tpl->tpl_vars['v']->value->getPostFeeling();?>

                        </span>
                        <span class="comment"><i class="fa fa-comment"></i> 
                        
                        <?php echo $_smarty_tpl->tpl_vars['v']->value->getPost_id();?>

                        </span>
                    </div><!-- .Sidebar-meta ends here -->
                </li><!-- .Li ends here -->
                
                <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                
              </ul><!-- .Ul ends here -->
          </div><!-- .Widget ends here -->
      </div><!-- .Col ends here -->
    <div class="col-md-4"></div><!-- .Col ends here -->
  </div><!-- .Row ends here -->
</div><!-- .Container ends here -->
     
   
     
     
     
     
     
     
     
     
     
     <?php echo '<script'; ?>
 src="https://unpkg.com/vue@2.1.8/dist/vue.js" ><?php echo '</script'; ?>
>
     <?php echo '<script'; ?>
 src="https://cdnjs.cloudflare.com/ajax/libs/vue-resource/1.0.3/vue-resource.min.js" ><?php echo '</script'; ?>
>
     
     <?php echo '<script'; ?>
>
     
     Vue.filter('htmlEscape', function(value) {
  return value.replace(/\&amp\;/g, '&');
});
Vue.filter('dateTime', function(val) {
  return new Date(val).toGMTString().slice(0, -13);
});

var vm = new Vue({
  el: '#app',
  data: {
    articleObj: null,
    isResult: false,
    searchQuery: '',
  },
  computed: {

  },
  ready: function() {
  },
  methods: {
    removeSearchQuery: function() {
      this.searchQuery = '';
      this.isResult = false;
    },
    submitSearch: function() {
      var reqURL = "/myposts";
     
      this.$http.jsonp(reqURL).then(function(response) {
        this.articleObj = response.data.query.pages;
        this.isResult = true;
      }, function(response) { /* fail response msg */
        console.log(response);
      });
    }
  }
});
     <?php echo '</script'; ?>
>
     
     
     
     
     
     
     
     
     
     
     
     
     
    </body>
</html><?php }
}
