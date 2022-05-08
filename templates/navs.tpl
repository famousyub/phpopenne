

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
       
      
       <li><a href="/me">me</a></li>
      <li><a href="/">home</a></li>
      <li><a href="/about">about </a></li>
      <li><a href="/home">page</a></li>
       <li><a href="/data">data</a></li>
        <li><a href="profile">profile</a></li>
          <li><a href="/translate">translator</a></li>
                <li><a href="loginuser">cureent user</a></li>
                    <li><a href="myposts">myposts</a></li>
                    
                    </ul>
                    
                    </nav>