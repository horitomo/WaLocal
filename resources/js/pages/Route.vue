<template>
	<div class="panel">
		<Googlemap2 />
		<form @submit.prevent="route">
			<button>登録</button>
		</form>
		<form @submit.prevent="prev">
			<button>戻る</button>
		</form>
	</div>
</template>

<script>
	import Googlemap2 from '../components/Googlemap2'
	export default {
		data() {
			return {
				routeRegisterForm : {
					departureAddress : this.$store.getters['file/departure'],
					arrivalAddress : this.$store.getters['file/arrival'],
					wayPoint : this.$store.getters['file/address']
				}
			};
		},
		methods: {
			async route(){
				const responce = await axios.post('/api/route', this.routeRegisterForm)
				// トップページに移動する
				this.$router.push('/')
			},
			prev(){
				this.$router.push('/list')
			}
		},
		components:{
			Googlemap2
		}
	}
</script>
