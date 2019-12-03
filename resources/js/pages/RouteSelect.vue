<template>
  <div>
    <p>出発地：{{ this.departureS }}</p>
    <p>到着地：{{ this.arrivalS }}</p>
    <StoreList
        v-for="place in places"
        v-bind:key="place.id"
        :item="place"
      />
  </div>
</template>
<script>
import StoreList from '../components/StoreList.vue' 
var GOOGLEMAP_API_KEY = process.env.MIX_GMP_API_KEY
export default {
  name: "GoogleMap",
  data() {
    return {
      map: null,
      mapPosition: {lat: 35.658034, lng: 139.701636},
      departureS : this.$store.getters['file/departure'],
      arrivalS : this.$store.getters['file/arrival'],
      departurePosition:{
	      lat:'',
	      lng:''
      },
      arrivalPosition: {
	      lat:'',
	      lng:''
      },
      places: []
    };
  },
  methods: {
    isList(){
      this.loadJS(`https://maps.googleapis.com/maps/api/js?key=${GOOGLEMAP_API_KEY}&callback=initMap`)
      let self = this
      window.initMap = self.initMap
      this.places[0] = {"storeName":"一陽来福","address":"東京都八王子市楢原町472-1","lat":35.6806528,"lng":139.30740349999996}
      this.places[1] = {"storeName":"みんみんラーメン　本店","address":"東京都八王子市楢原町437-1","lat":35.6806528,"lng":139.30740349999996}
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
      var geocoderTo = new google.maps.Geocoder();
      var from = this.departureS;
      var to = this.arrivalS;
      var depP = {"lat":0.1,"lng":0.1};
      var arriP = {"lat":0.1,"lng":0.1};
      geocoderFrom.geocode({ address: from }, function(results, status){
      if (status === 'OK' && results[0]){  //status を確認して処理開始
        depP.lat = results[0].geometry.location.lat();
        self.departurePosition.lat = results[0].geometry.location.lat();
        depP.lng = results[0].geometry.location.lng();
        self.departurePosition.lng = results[0].geometry.location.lng();
      }
      });
      
      geocoderTo.geocode({ address: to }, function(resultt, status){
      if (status === 'OK' && resultt[0]){  //status を確認して処理開始
        arriP.lat = resultt[0].geometry.location.lat();
        arriP.lng = resultt[0].geometry.location.lng();
      }
      });
      setTimeout(() => this.$store.dispatch('file/registerDPosition', depP), 500);
      setTimeout(() => this.$store.dispatch('file/registerAPosition', arriP), 500);

      //console.log(depP)
	//document.myform.submit()
	  },
  },
  mounted : function(){
    //this.$store.dispatch('file/registerDPosition', this.departurePosition)
  },
  destroyed(){
    const oldTag = document.getElementById('google-map')
    oldTag.parentNode.removeChild(oldTag);
    window.google = {}
  },
  components :{
    StoreList
  },
  watch: {
    $route: {
      async handler () {
        await this.isList()
      },
      immediate: true
    }
  }
};
</script>
