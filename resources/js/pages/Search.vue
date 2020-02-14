<template>
	<div class="backmain">
		<div class="searchtitlediv">
			<img src="storage/site_image/search.png" alt="miss" class="searchimage">
			<h2 class="searchtitle">おすすめのルートを探す</h2>
		</div>
		<SearchWindow />
	</div>
</template>
<script>
import SearchWindow from '../components/SearchWindow'
export default {
	data(){
		return{
			routeForm: {
				departure : '',
				arrival : ''
			}
		}
	},
	methods :{
		route(routeForm){
			this.routeForm = routeForm
			console.log(this.routeForm)
		}
	},
	components:{
		SearchWindow
	}
}
</script>
