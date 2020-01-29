<template>
	<div>
		<p>出発地：{{ this.routeFormList.departure }}</p>
		<p>到着地：{{ this.routeFormList.arrival }}</p>
		<RouteList
		v-for="place in storeplaces"
		v-bind:key="place.id"
		:item="place"
		/>
	</div>
</template>
<script>
import RouteList from '../components/RouteList'
export default {
	components:{
		RouteList
	},
	data () {
		return {
			storeplaces: [],
			routeFormList: {
				departure : this.$store.getters["file/departure"],
				arrival : this.$store.getters["file/arrival"]
			}
		}
	},
	methods: {
		async fetchPlaces () {
			this.routeFormList.departure = this.$store.getters["file/departure"]
			this.routeFormList.arrival = this.$store.getters["file/arrival"]
			console.log(this.routeFormList)
			const response = await axios.post('/api/route/example',this.routeFormList)
			console.log(response)
			let self = this
			self.storeplaces = response.data
		},
		async list(){
			const response = await axios.post('/api/route/example', this.routeFormList)
			console.log(response)
			let self = this
			self.storeplaces = response.data
		},
	},
	watch: {
		$route: {
			async handler () {
				await this.fetchPlaces()
			},
			immediate: true
		}
	}
}
</script>
