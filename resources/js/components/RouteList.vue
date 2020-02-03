<template>
	<div class="panel">
		<form @submit.prevent="mapGo">
			<p>店名：{{ this.item.storeName }}</p>
			<p>住所：{{ this.item.wayPoint }}</p>
			<p>ジャンル：{{ this.docdoc }}</p>
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
	data(){
		return {
			docdoc : ''
		}

	},
	methods:{
		async mapGo(){
			this.item.storeAddress = this.item.wayPoint
			await this.$store.dispatch('file/storeLatLng',this.item);
			this.$router.push('/result')
		},
		category($category){
			if($category == "01"){
				this.docdoc = "麺類"
			}else if($category == "02"){
				this.docdoc = "和食"
			}else if($category == "03"){
				this.docdoc = "洋食"
			}else if($category == "04"){
				this.docdoc = "中華"
			}
		}
	},
	watch: {
		$route: {
			async handler () {
				await this.category(this.item.storeCategory)
			},
			immediate: true
		}
	}
}
</script>
