<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">

 
 <meta name="viewport" content="width=device-width, initial-scale=1">
 
 <script src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.0.3/vue.js"></script>

</head>
<body>

<div class="container mt-3">
  <h2> user list</h2>
  <ul class="list-group">
  
    {foreach from=$users item=v}
    <li class="list-group-item">
    
    
    <h1>
    username : {$v->getUsername()}
    </h1>
    
    
    <div>
    <span>
    
      email  : {$v->getEmail()}
    
    
    </span>
    </div>
    
    
    <h2>
    
    
      gender : {$v->getGender()}
    </h2>
    
    
    
    <h1>
     phone number : 
     
     {$v->getPhonenumber()}
    </h1>
    
    
    </li>

    
     {/foreach}
  </ul>
</div>

</body>
</html>
