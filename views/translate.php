<?php 

if(isset($_POST["text"])){
    
    echo $_POST["text"];
    
    $url = "http://localhost:5000/detect";
    
    $curl = curl_init($url);
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    
    $headers = array(
        "Content-Type: application/json",
    );
    curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
    
    $data = '{"text": "hello there"}';
    $txt =  $_POST["text"];
    $datapost=array("text"=>$txt);
    curl_setopt($curl, CURLOPT_POSTFIELDS,json_encode($datapost) );
    
    //for debug only!
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
    
    $resp = curl_exec($curl);
    curl_close($curl);
    var_dump($resp);
    echo json_decode($resp);
    
}



?>


<html>

<head>

<title>

</title>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.4.4/css/bulma.min.css" />
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.18.0/axios.js"></script>
</head>




<body>




<div class="columns" id="app">
  <div class="column is-two-thirds">
    <section class="section">
      <h1 class="title">Fun with Forms in Vue 2.0</h1>
      <p class="subtitle">
        Learn how to work with forms, including <strong>validation</strong>!
      </p>
      <hr>

      <!-- form starts here -->
      <section class="form">
        <form action ="<?php echo $_SERVER['REQUEST_URI'] ?>" method="post" v-on:submit.prevent="$validator.validateAll(); console.log(form);" @submit.prevent="submitForm">
          <div class="field">
            <label class="label">text</label>
            <div class="control">
              <input name="text" v-model="form.text" v-validate="'required|min:3'" v-bind:class="{'is-danger': errors.has('text')}" class="input" type="text" placeholder="Full name">
            </div>
            <p class="help is-danger" v-show="errors.has('text')">
              {{ errors.first('text') }}
            </p>
          </div>

         

          <div class="field is-grouped">
            <div class="control">
              <input type="submit"   value="submit"            v-bind:disabled="errors.any()" class="button is-primary">
								Submit
							
            </div>
          </div>

        </form>
      </section>
    </section>
  </div>

  <div class="column">
    <section class="section" id="results">
      <div class="box">
        <ul>
          <li v-for="(item, k) in form">
            <strong>{{ k }}:</strong> {{ item }}</li>
        </ul>

      </div>
    </section>
  </div>
  
</div>





<div id="root">

</div>


<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.3.4/vue.min.js"></script>
<script type="text/javascript" src="https://unpkg.com/vee-validate@2.0.0-rc.18/dist/vee-validate.js"></script>

<script>

Vue.use(VeeValidate);
VeeValidate.Validator.extend("polite", {
  getMessage: field => `You need to be polite in the ${field} field`,
  validate: value => value.toLowerCase().indexOf("please") !== -1
});
new Vue({
  el: "#app",
  data: {
    form: {
      text: "",
    /*  message: "",
      inquiry_type: "",
      logrocket_usecases: [],
      terms: false,
      concepts: [],
      js_awesome: ""*/
    },
    options: {
      inquiry: [
        { value: "feature", text: "Feature Request" },
        { value: "bug", text: "Bug Report" },
        { value: "support", text: "Support" }
      ]
    }
  },
   methods: {
    submitForm() {
    
    const data = {'text':this.form.text};
      axios.post('http://localhost:5000/detect', {
        headers: { 'content-type': 'application/json' },
        data: JSON.stringify(data),
        
      }).then(response => {
         console.log(response);
         console.table(response);
        // this.response = response.data
        this.success = 'Data saved successfully';
        this.response = JSON.stringify(response, null, 2)
      }).catch(error => {
        this.response = 'Error: ' + error.response.status
      })
      this.text = '';
     // this.email = '';
      //this.firstSon = '';
    }
  }
});


</script>
</body>

</html>