<template>
	<div class="panel">
		<Googlemap />
		<form @submit.prevent="prev">
			<button>戻る</button>
		</form>
	</div>
</template>

<script>
	import Googlemap from '../components/Googlemap'
	export default {
		methods: {
			prev(){
				this.$router.push('/list')
			}
		},
		components:{
			Googlemap
		}
	}
</script>
