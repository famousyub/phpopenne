<html>
    <head>
        <title>Info</title>
        <script src="<https://cdn.jsdelivr.net/npm/vue@2.6.14/dist/vue.js>"></script>
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
               {foreach from=$posts item=v}
                <li>
                    <div class="sidebar-thumb">
                      <video width="320" height="240" controls>
  <source src="{$link}{$v->getPostFile()}" type="video/mp4">
  <source src="{$link}{$v->getPostFile()}" type="video/ogg">
Your browser does not support the video tag.
</video>

<img src="{$link}{$v->getPostFile()}" alt="hello" class="img" height="80" width="80"   />
                      
                        
                    </div><!-- .Sidebar-thumb -->
                    <div class="sidebar-content">
                        <h5 class="animated bounceInRight"><a href="{$v->getPostText()}">
                        <img src="{$v->getPostText()}" alt=" {$v->getPostText()}" />s
                       
                        </a></h5>
                    </div><!-- .Sidebar-thumb -->
                    <div class="sidebar-meta">
                        <span class="time" ><i class="fa fa-clock-o"></i> 
                        {$v->getPostFeeling()}
                        </span>
                        <span class="comment"><i class="fa fa-comment"></i> 
                        
                        {$v->getPost_id()}
                        </span>
                    </div><!-- .Sidebar-meta ends here -->
                </li><!-- .Li ends here -->
                
                {/foreach}
                
              </ul><!-- .Ul ends here -->
          </div><!-- .Widget ends here -->
      </div><!-- .Col ends here -->
    <div class="col-md-4"></div><!-- .Col ends here -->
  </div><!-- .Row ends here -->
</div><!-- .Container ends here -->
     
   
     
     
     
     
     
     
     
     
     
     <script src="https://unpkg.com/vue@2.1.8/dist/vue.js" ></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/vue-resource/1.0.3/vue-resource.min.js" ></script>
     
     <script>
     
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
     </script>
     
     
     
     
     
     
     
     
     
     
     
     
     
    </body>
</html>