<template>
  <div :class="{ 'aqua-bg': isLightMode }" class="ma-div w-full">    
    <div class="container mx-auto px-4">
      <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 ">
        <div v-for="(item, index) in kader" :key="item.id" :class="index === 0 ? 'mt-4 first-item' : 'other-items'" class="bg-white  shadow-md rounded-lg flex justify-between items-center p-4 border-gray-300 ">





                <div>

                      <h2 class="text-xl font-semibold text-green-600">{{ item.name }}</h2>
                </div>
                  <div class="flex items-center">
                    <p class="text-xl font-semibold mr-5">DA</p>


                            <Link :href="'/depenses/' + item.id + '/edit'">
          <div class="pointer-events-none">
            <img src="../images/my-image.png" alt="Mon image" class="inline-block align-middle w-6 h-6" />
          </div>
        </Link>               


                  </div>
        


        </div>
      </div>
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
    computed: {
    isLightMode() {
      return window.matchMedia('(prefers-color-scheme: light)').matches;
    },
  },

    mounted() {
      console.log('kader value is:', this.kader);
    }
  }
  </script>

  <script setup>
  import { Link } from '@inertiajs/inertia-vue3'
</script>




<style scoped>
.aqua-bg {
  background-color: rgb(135, 253, 155);
}

.ma-div {
  color: #000000;
}

@media (prefers-color-scheme: dark) {
  .dark\:ma-div {
    background-color: #1F2937;
    color: #F3F4F6;
  }
}
</style>