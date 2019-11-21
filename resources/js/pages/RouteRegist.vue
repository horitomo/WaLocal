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
    <div v-if="isCheck">
      {{ arrival }}
      <br>
      {{ departure }}
      <br>
      <Googlemap />
    </div>
  </div>
</template>
<script>
import Googlemap from '../components/Googlemap'
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
    },
    arrival () {
      return this.$store.getters['file/arrival']
    },
    departure() {
            return this.$store.getters['file/departure']
    },
    isCheck(){
      if(this.$store.getters['file/checkA'] && this.$store.getters['file/checkD'] ){
          return true
      }else {
        return false
      }
    }
	},
  methods :{
    async route(){
      //console.log(this.routeForm)
      // authストアのresigterアクションを呼び出す
			await this.$store.dispatch('file/register', this.routeForm)

			// トップページに移動する
			//this.$router.push('/')
    }
  },
  components:{
    Googlemap
  }
}
</script>
