<template>
	<div>
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
