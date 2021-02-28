<template>
    <div class="row">
        <spinner v-show="loading"></spinner>

        <div class="col-sm" > <!--v-for="pokemon in pokemones" -->
			<div class="card text-center" style="width: 18rem; margin-top: 70px;">
			  <img style="height: 100px; width: 100px; background-color: #EFEFEF; margin: 20px;" class="card-img-top rounded-circle mx-auto d-block" v-bind:src="pokemon.foto" alt="">
			  <div class="card-body">
			    <h5 class="card-title"></h5> <!--{{ pokemon.name }} -->
			    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
			    <a href="/entrenadores" class="btn btn-primary">Ver más...</a>
			  </div>
			</div>
		</div>

    </div>
</template>

<script>


import EventBus from '../event-bus.js';  

export default {
	data(){
		return {
			pokemons: [],
			loading: true
		}
	},
	created(){
		EventBus.$on('pokemon-added', data => {
			this.pokemons.push(data)
		})

	},
	mounted(){
		axios.get('http://crudlaravel6.6.test:8080/admin/pokemones').then((response) => {
			this.pokemons = response.data
			this.loading = false

		})
	}
    
}
</script>