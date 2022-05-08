<?php 

//https://golangexample.com/serve-kubernetes-logs-in-realtime-over-websocket/



?>
<html>
<head>
<!--  VUE  -->
  
</head>

<body>
  <div id="app">
    <b-navbar toggleable="lg" type="dark" variant="info">
      <b-navbar-brand href="#">Toast</b-navbar-brand>
    </b-navbar>
    <h1>BETA<h1>
    <b-button class="mt-2 ml-2" @click="makeToast()">Show Toast</b-button>
    <b-button class="mt-2 ml-2" @click="makeToast(true)">Show Toast (appended)</b-button>
    <b-button class="mt-2 ml-2" @click="popToast()">Pop Toast</b-button>
  </div>
  
  <script type="text/javascript">
  app = new Vue({
  el: "#app",
  data() {
      return {
        toastCount: 0
      }
    },
    methods: {
      makeToast(append = false) {
        this.toastCount++
        this.$bvToast.toast(`This is toast number ${this.toastCount}`, 
                            {
                                title: 'BootstrapVue Toast',
                                autoHideDelay: 5000,
                                variant: 'danger',
                                appendToast: append,
                                bottomLeft:true
                              }
        )
      },
      popToast() {
        // Use a shorter name for this.$createElement
        const h = this.$createElement
        // Increment the toast count
        this.count++
        // Create the message
        const vNodesMsg = h(
          'p',
          { class: ['text-center', 'mb-0'] },
          [
            h('b-spinner', { props: { type: 'grow', small: true } }),
            ' Flashy ',
            h('strong', {}, 'toast'),
            ` message #${this.count} `,
            h('b-spinner', { props: { type: 'grow', small: true } })
          ]
        )
        // Create the title
        const vNodesTitle = h(
          'div',
          { class: ['d-flex', 'flex-grow-1', 'align-items-baseline', 'mr-2'] },
          [
            h('strong', { class: 'mr-2' }, 'The Title'),
            h('small', { class: 'ml-auto text-italics' }, '5 minutes ago')
          ]
        )
        // Pass the vNodes as an array for message and title
        this.$bvToast.toast([vNodesMsg], {
          title: [vNodesTitle],
          solid: true,
          variant: 'info'
        })
      }
    }
});
  </script>
</body> 
</html>

