<template>
	<div class="searchwindows">
		<form class="form" @submit.prevent="route">
			<label for="departure" class="marginsame">出発地</label>
			<input type="text" class="form__item marginsame" id="departure"  v-model="routeForm.departure">
			<label for="arrival" class="marginsame">到着地</label>
			<input type="text" class="form__item marginsame" id="arrival"  v-model="routeForm.arrival">
			<div class="form__button">
				<button type="submit" class="button button--inverse marginsame">検索</button>
			</div>
		</form>
	</div>
</template>
<script>
export default {
	data() {
		return {
			routeForm: {
				departure : '',
				arrival : ''
			}
		}
	},
	methods : {
		async route(){
			// authストアのresigterアクションを呼び出す
			await this.$store.dispatch('file/register', this.routeForm)
			// トップページに移動する
			if(this.$store.getters['file/departure'] && this.$store.getters['file/arrival']){
			this.$router.push('/listStore')
			}
		}
	}
}
</script>
