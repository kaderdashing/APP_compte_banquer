<template>
  <div>
    <h1 class="text-3xl">show page</h1>
 <div class="m-6">
    <ul>
      <li v-for="(value, category) in userCategories" :key="category">
        <div class="text-purple-600 md:text-green-600 text-3xl capitalize mt-4"> {{ category}}  </div>
        <ul>
              <li v-for="(expense, index) in expenses" :key="index" >
                  <div v-if="expense.categorie_id === value" class="shadow-2xl p-5 md:p-1 flex space-x-4 ">
                   
                      <p>Nom: {{ expense.nom }}</p>
                      
                      <p>Prix: {{ expense.prix }}</p>
                      <p>Commentaire: {{ expense.commentaire }}</p>
                  </div>
              </li>

        </ul>
      </li>
    </ul>
  </div>
  </div>
</template>
<script>
export default {
  props: {
   expenses: {
    type: Array,
    default: () => []
  } ,
  userCategories: Object

}
}
</script>

<style scoped>

</style>
