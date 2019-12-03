<template>
	<div class="panel">
		<form @submit.prevent="go">
			<p>店名：{{ this.item.storeName }}</p>
			<p>住所：{{ this.item.address }}</p>
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
		async go(){
			await this.$store.dispatch('file/storeLatLng',this.item);
			this.$router.push('/route')
		}
	}
}
</script>
