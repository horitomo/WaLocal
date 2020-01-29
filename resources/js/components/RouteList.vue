<template>
	<div class="panel">
		<form @submit.prevent="mapGo">
			<p>住所：{{ this.item.wayPoint }}</p>
			<button>選択</button>
		</form>
	</div>
</template>
<script>
export default {
	props: {
		item: {
			type: Object,
			required: true
		}
	},
	methods:{
		async mapGo(){
			this.item.storeAddress = this.item.wayPoint
			await this.$store.dispatch('file/storeLatLng',this.item);
			this.$router.push('/result')
		}
	}
}
</script>
