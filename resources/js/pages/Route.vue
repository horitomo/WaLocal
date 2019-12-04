<template>
	<div class="panel">
		<Googlemap2 />
		<form @submit.prevent="prev">
			<button>戻る</button>
		</form>
	</div>
</template>

<script>
	import Googlemap2 from '../components/Googlemap2'
	export default {
		methods: {
			prev(){
				this.$router.push('/list')
			}
		},
		components:{
			Googlemap2
		}
	}
</script>
