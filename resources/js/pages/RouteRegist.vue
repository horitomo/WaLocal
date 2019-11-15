<template>
  <div class="panel" v-if="isLogin">
    <form class="form" @submit.prevent="route">
      <label for="departure">出発地</label>
      <input type="text" class="form__item" id="departure"  v-model="routeForm.departure">
      <label for="arrival">到着地</label>
      <input type="text" class="form__item" id="arrival"  v-model="routeForm.arrival">
      <div class="form__button">
        <button type="submit" class="button button--inverse">検索</button>
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
  computed: {
		isLogin () {
			return this.$store.getters['auth/check']
		}
	},
  methods :{
    route(){
      console.log(this.routeForm)
    }
  }
}
</script>
