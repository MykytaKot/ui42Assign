
<template>
 <div class="gradient-bg">
    <div class="container w-100 h-100 align-center main-search ">
        <div class="h-fit-content">
            <h1 class="text-white m-3 big-text fw-lighter"> Vyhľadať v databáze obcí</h1>
        <form action=""  class="container align-center">
            <div class="input-group w-75 shadow  ">
                <input type="text" id="search" class="form-control rounded-1 p-3 pl-4 pr-4" v-model="searchTerm" placeholder="Zadajte nazov ..."  aria-label="Search">
                
                </div>
           </form>
           
           <div v-if="searchResults.length > 0" class="results-container bg-white mt-2 mb-4 shadow  px-4 rounded">
                <div v-for="result in searchResults.slice(0, 10)" :key="result.id" class="w-100"> 
                 
                    <router-link :to="'/city/' + result.id" class="btn jumbotron border-top link-primary d-flex row"><img class="col-md-1 col-sm-2 d-none d-md-block  d-lg-block d-xl-block "   :src="result.img_path" alt=""><h5 class="col-md-5 col-sm-4 text-start">{{ result.name }} </h5> <span class="col-6"> Región:{{ result.region }} </span> </router-link>
        
                
                </div>
            </div>
        </div>
    </div>
 </div>
</template>

<script>
import $ from "jquery";
export default {
    data() {
    return {
      searchTerm: '',
      searchResults: []
    }
  },
  methods: {
    async searchData() {
      if (this.searchTerm.length > 1) { 
            
        try {

          const response = await axios.get(`/api/search/${this.searchTerm}`);
          this.searchResults = response.data; 
          console.log(this.searchResults);
        } catch (error) {
          console.error("Error fetching data:", error);
        }
      }else{
        this.searchResults = [];
      
      }
    }
  },
  watch: { 

    searchTerm() { 
      this.searchData();
    }
  } 
}
</script>