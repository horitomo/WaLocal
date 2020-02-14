<template>
	<div>
		<form class="form" @submit.prevent="storeRegisterStart">
			<label for="">店名：</label>
			<input type="text" name="storeName" id="" v-model="storeRegisterForm.storeName">
			<label for="">住所：</label>
			<input type="text" name="storeAddress" id="" v-model="storeRegisterForm.storeAddress">
			<label for="">コメント：</label>
			<textarea name="comment" rows="4" cols="40" v-model="storeRegisterForm.comment">ここに感想を記入してください。</textarea><br>
			<label for="">ジャンル：</label>
			<select name="storeCategory" id="" v-model="storeRegisterForm.storeCategory">
				<option disabled value="">ジャンルを決定してください</option>
				<option value="01">麺類</option>
				<option value="02">和食</option>
				<option value="03">洋食</option>
				<option value="04">中華</option>
			</select>
			<input type="file" @change="onFileChange">
			<br />
			<button>登録</button>
		</form>
	</div>
</template>
<script>
var GOOGLEMAP_API_KEY = process.env.MIX_GMP_API_KEY
export default {
	data() {
		return {
			storeRegisterForm: {
				storeName : '',
				storeAddress : '',
				storeCategory : '',
				comment:'',
				lat : '',
				lng : '',
				photo : null
			}
		}
	},
	methods : {
		onFileChange (event) {
			const reader = new FileReader()
			reader.onload = e => {
			this.preview = e.target.result
			}
			reader.readAsDataURL(event.target.files[0])
			this.storeRegisterForm.photo = event.target.files[0]
			console.log(this.storeRegisterForm.photo)
		},
		async storeRegisterStart() {
			console.log(this.storeRegisterForm)
			await this.initMap()
			setTimeout(() => axios.post('/api/store',this.storeRegisterForm), 500);
			setTimeout(() => this.$router.push("/"), 600)
		},
		loadJS(src) {
			const ref = window.document.getElementsByTagName("script")[0];
			const script = window.document.createElement("script");
			script.src = src;
			script.async = true;
			script.setAttribute('id', 'google-map');
			ref.parentNode.insertBefore(script, ref);
		},
		initMap() {
			let self = this
			var geocoderFrom = new google.maps.Geocoder(); 
			var storeAdd = this.storeRegisterForm.storeAddress
			geocoderFrom.geocode({ address: storeAdd }, function(results, status){
				if (status === 'OK' && results[0]){  //status を確認して処理開始
					self.storeRegisterForm.lat = results[0].geometry.location.lat();
					self.storeRegisterForm.lng = results[0].geometry.location.lng();
				}
			});
		},
	},
	watch: {
		$route: {
			async handler () {
				await this.loadJS(`https://maps.googleapis.com/maps/api/js?key=${GOOGLEMAP_API_KEY}&callback=storeRegisterStart`)
			},
			immediate: true
		}
	}
}
</script>
