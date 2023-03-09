<template>
  <header class="border-b border-gray-200 dark:border-gray-700 bg-white dark:bg-gray-900 w-full">
    <div class="container mx-auto">
      <nav class="p-4 flex flex-col sm:flex-no-wrap  sm:justify-between   justify-around">
        <div class="flex justify-around">
  <Link :href="route('listing.index')" class="">LOGO</Link>

  <Link :href="route('listing.index')" class="text-xl text-indigo-600 dark:text-indigo-300 font-bold ">NOTIFICATION</Link>
  <div v-if="user" class="items-center">
    <Link :href="route('logout')" method="delete" as="button" class="ml-auto">Logout</Link>
  </div>
</div>






  <div v-if="user" class="flex flex-row items-center justify-around gap-4 mt-5" >
    <Link :href="route('realtor.listing.create')" class="btn-primary">dépenses</Link>
  <Link class="text-sm text-gray-500" :href="route('realtor.listing.index')"> statistiques </Link>
  
  <div>
    <Link :href="route('logout')" method="delete" as="button">portefeuille</Link>
  </div>
</div>

    <div v-else class="flex items-center justify-around mt-5">
  <Link :href="route('user-account.create')" class="ml--10">Register</Link>
  <Link :href="route('login')" class="mr-10">Sign-In</Link>
</div>

      </nav>
    </div>
  </header>
  
  <main class="container mx-auto p-4 w-full">
    <div v-if="flashSuccess" class="mb-4 border rounded-md shadow-sm border-green-200 dark:border-green-800 bg-green-50 dark:bg-green-900 p-2">
      {{ flashSuccess }}
    </div>
    <slot>Default</slot>
  </main>
</template>


<script setup>
import { computed } from 'vue'
import { Link, usePage } from '@inertiajs/inertia-vue3'

const page = usePage()
const flashSuccess = computed(
  () => page.props.value.flash.success,
)
const user = computed(
  () => page.props.value.user,
)
</script>