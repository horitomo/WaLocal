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
		  console.log(this.item.storeName)
		  console.log(this.$store.getters['file/departurePosition'])
		  console.log(this.$store.getters['file/arrivalPosition'])
	  }
  }
}
</script>
