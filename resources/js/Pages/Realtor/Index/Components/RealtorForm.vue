<template>
    <div class=" ma-div">
    <div class="mx-2 mt-5">
        <div class="flex">


            <div class="inline-block shadow-lg px-15 border-dotted">
  <div class="inline-block text-center font-bold text-gray-500 text-xl ml-2 text-shadow-lg ml-5">SOLDE:</div>
  <div class="inline-block text-center font-bold text-green-500 text-xl ml-2 text-shadow-lg mr-5">{{user}} DA</div>
</div>



</div>

            <div class="flex justify-center items-center mt-5">
            <div class="mb-5">
                <p>les dépenses actives pour le <span class="text-purple-600">{{ date }} </span></p>
            </div>
            </div>
            
            
            
            <form @submit.prevent="create">
  <div class="grid grid-cols-8 gap-4">
    <div class="col-span-8 flex justify-center items-center">
      <div class="col-span-2">
        <label class="label">type</label>
        <div class="col-span-1">
          <select v-model="form.nom" class="input-filter-l w-22" placeholder="Choisir">
            <option value="flixy">flexy</option>
            <option value="tabac">tabac</option>
            <option value="bouché">bouché</option>
          </select>
        </div>
        <div v-if="form.errors.nom" class="input-error">
          {{ form.errors.nom }}
        </div>
      </div>

      <div class="col-span-1 md:col-span-1"></div> <!-- Ajout d'un espace pour les petits écrans -->

      <div class="col-span-2">
        <label class="block mb-1 ml-25 text-gray-500 dark:text-gray-300 font-medium">Montant</label>
        <input v-model.number="form.prix" type="text" class="block w-full p-2 rounded-md shadow-sm border border-gray-300 dark:border-gray-600 text-gray-500" />
        <div v-if="form.errors.prix" class="input-error">
          
          {{ form.errors.prix }}
        </div>
      </div>

      <div class="col-span-1 md:col-span-1"></div> <!-- Ajout d'un espace pour les petits écrans -->

      <div class="col-span-2 md:col-span-4">
        <label class="block mb-1 text-gray-500 dark:text-gray-300 font-medium">comment</label>
        <input v-model="form.commentaire" type="text" class="block w-full p-2 rounded-md shadow-sm border border-gray-300 dark:border-gray-600 text-gray-500" />
        <div v-if="form.errors.commentaire" class="input-error">
          {{ form.errors.commentaire }}
        </div>
      </div>
    </div>

    <div class="flex ml-10 ">
      
        <button type="submit" class="btn-primary mb-5 p-15  text-lg h-12 w-48 bg-teal-500 hover:bg-teal-400">Create</button>

    </div>
  </div>
</form>

            
            

    
    </div>
</div>
</template>
    
    <script setup>
    import RealtorShow from '@/Pages/Realtor/Index/Components/RealtorShow.vue'
    import { ref } from 'vue'
    
    import { useForm } from '@inertiajs/inertia-vue3'
    defineProps({
      kader: Object,
      user:Number ,
    })
    const form = useForm({
      nom: null,
    
      commentaire: null,
    
      prix: null,
    })
    const create = () => form.post(route('depenses.store'))
    
    
    </script>
    
    <script>
    export default {
      
      data() {
        return {
          date: '' ,
        };
      },
      mounted() {
        let currentDate = new Date();
        let jour = currentDate.getDate();
        let mois = currentDate.getMonth() + 1;
        let annee = currentDate.getFullYear();
    
        this.date = jour + '/' + mois + '/' + annee;
      }
    };
    </script>
    
    <style scoped>
    
    .border-dotted {
  border: 1px dotted #7ef5b3;
  border-spacing: 3px; /* Espacement de 3 pixels entre les points */
  border-radius: 10px; 
}


    .shadow-lg {
  box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2), 0 6px 6px rgba(0, 0, 0, 0.2);
}

.text-shadow-lg {
  text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.3);
}



    .ma-div {
  background-color: #ffffff;
  color: #000000;
}


@media (prefers-color-scheme: dark) {
  .dark\:ma-div {
    background-color: #1F2937;
    color: #F3F4F6;
  }
}
.flex {
  display: flex;
  justify-content: center;
}
    </style>