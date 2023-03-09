<template>
    <div>
      <h1>Welcome to Realtor Show Page</h1>
      <p>kader value is: {{ kader }}</p>
    </div>
  </template>
  
  <script>
  export default {
    props: {
      kader: {
        type: Object,
        required: true
      }
    },
    mounted() {
      console.log('kader value is:', this.kader);
    }
  }
  </script>
  