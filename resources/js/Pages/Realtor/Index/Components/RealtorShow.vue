<template>
    <div>
      <h1>Welcome to Realtor Show Page</h1>
      <div v-for="item in kader" :key="item.id">
        <p>ID: {{ item.id }}
        Code: {{ item.code }}
        Other Property: {{ item.city }}</p>
     
      </div>
    </div>
  </template>
  
  <script>
  export default {
    props: {
      kader: {
        type: Array,
        required: true
      }
    },
    mounted() {
      console.log('kader value is:', this.kader);
    }
  }
  </script>
  