<template>
  <div>
    <h1 class="ml-4">show page</h1>
 
    <ul>
      <li v-for="(value, category) in userCategories" :key="category">
        - {{ category}}
        <ul>
              <li v-for="(expense, index) in expenses" :key="index" >
                  <div v-if="expense.categorie_id === value">
                      *
                      <p>Nom: {{ expense.nom }}</p>
                      <p>Catégorie ID: {{ expense.categorie_id }}</p>
                      <p>Prix: {{ expense.prix }}</p>
                      <p>Commentaire: {{ expense.commentaire }}</p>
                  </div>
              </li>

        </ul>
      </li>
    </ul>
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
