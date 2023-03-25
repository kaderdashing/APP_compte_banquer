<template>
    <div class="m-4 p-4">
<h1>salut depuis edit </h1>  

<ul>
      <li v-for="item in attributes" :key="item.id">
        <p>Nom : {{ item.nom }}</p>
        <p>Catégorie ID : {{ item.categorie_id }}</p>
        <p>Prix : {{ item.prix }}</p>
        <p>Date de création : {{ item.created_at }}</p>
      </li>
    </ul>
      <form @submit.prevent="calcule">
        <div>
        <label for="depense" class="label"> Nouvelle Depenses</label>
        <input id="depense"  type="text" class="input" v-model="form.depense" />
       
      </div>
        <button class="btn-primary butt">ajouter</button>
      </form>
     
  
    <p>Prix total : {{ prixTotal }}</p>
</div>
</template>

<script>
export default {
  props: {
    attributes: {
      type: Object,
      required: false
    }
  },
  data() {
    return {
      form: {
        depense: ''
      }
    }
  },
  computed: {
    prixTotal() {
      return this.attributes.reduce((total, item) => total + item.prix, 0);
    }
  },
  methods: {
    calcule() {
      const prix = parseInt(this.form.depense);
      if (!isNaN(prix)) {
        this.attributes.push({
          nom: '',
          categorie_id: 6,
          prix: prix,
          created_at: new Date().toISOString()
        });
      }
      this.form.depense = '';
    }
  }
}
</script>



<style  scoped>
.butt{
    margin-top: 10px;
    margin-bottom: 10px;
}
.label{
    margin-top: 15px;
}
</style>

