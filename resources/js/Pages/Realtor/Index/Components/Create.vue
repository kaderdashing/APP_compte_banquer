<template>
  <div>
    
    <realtorForm  :user="user" />
    <RealtorShow :kader="kader" />
    
  </div>
</template>

<script>
import RealtorShow from '@/Pages/Realtor/Index/Components/RealtorShow.vue'
import RealtorForm from '@/Pages/Realtor/Index/Components/RealtorForm.vue'

import { usePage } from '@inertiajs/inertia-vue3'

export default {
  components: {
    RealtorShow , // Déclaration du composant RealtorShow
    RealtorForm ,
  },
  props: {
    kader: {
      type: Array,
      required: true
    } ,
    user: {
      type: Number,
      required: true
    }
  },
  mounted() {
   // console.log('user solde value is:', this.user);
  }
}
</script>
