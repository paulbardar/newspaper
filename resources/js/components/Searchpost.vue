<template>
	<form class="form-inline my-2 my-lg-0">
      <input @keyup="refreshAutosuggest" id="queryfield" class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search"  v-model="query" />
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit" @click.prevent="searchNow">Search</button>

		<div class="card autosuggest" v-if="Object.keys(this.results).length">
			<div class="card-body">
				<ul class="list-unstyled">
					<li v-for="(res, key) in this.results" :key="key">
						<a class="link" :href="'/posts/'+res.id">{{ findInLine(res.title) + "..." }}</a>
					</li>
				</ul>
			</div>
		</div>

    </form>

</template>

<script >
import axios from 'axios'

	export default{
		data(){
			return {
				query:"",
				results:{}
			}
		},
		methods:{
			searchNow(){
				window.location.href = window.location.origin + '/search/' + this.query
			},

			findInLine(string){
             let currentPosition = string.indexOf(this.query);
             let start = currentPosition < 10? 0: currentPosition - 10;

             return string.substr(start, 20);
           },

			refreshAutosuggest(){
				if(this.query.length > 2){
					axios.get('/autosearch/'+this.query).then((response)=>{
						this.results = response.data
					}).catch((errors)=>{
						console.log(errors.response.data)
					})
				}else{
					this.results = {}
				}
			}
		},
		mounted(){
			document.addEventListener("click", (event)=>{
				let clickedElement = event.target.getAttribute('class');
				if(clickedElement != 'link' || clickedElement != 'autosuggest'){
					this.results = {}
				}
			})
		}



	}
</script>

<style scoped>
	.autosuggest{
		position: absolute;
		top: 50px;
		z-index: 100000000;
	}
</style>
