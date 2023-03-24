<template>
  <div>
    
  



<RealtorShow
  :kader="kader"
  :depenses-du-jour="depensesDuJour"
/>
    
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
    },
    depensesDuJour : {
      type : Object ,
    }
  },
  mounted() {
   // console.log('user solde value is:', this.user);
  }
}
</script>
