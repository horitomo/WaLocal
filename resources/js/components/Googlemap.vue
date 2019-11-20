<template>
  <div id="map"></div>
</template>
<script>
var GOOGLEMAP_API_KEY = process.env.MIX_GMP_API_KEY
export default {
  name: "GoogleMap",
  data() {
    return {
      map: null,
      mapPosition: {lat: 35.658034, lng: 139.701636}
    };
  },
  methods: {
    loadJS(src) {
      const ref = window.document.getElementsByTagName("script")[0];
      const script = window.document.createElement("script");
      script.src = src;
      script.async = true;
      script.setAttribute('id', 'google-map');
      ref.parentNode.insertBefore(script, ref);
    },
    initMap() {
      this.map = new google.maps.Map(document.getElementById('map'), {
        center: this.mapPosition,
        zoom: 11
      });

        var d = new google.maps.DirectionsService(); // ルート検索オブジェクト
        var r = new google.maps.DirectionsRenderer({ // ルート描画オブジェクト
        map: this.map, // 描画先の地図
        preserveViewport: true, // 描画後に中心点をずらさない
        });

        var request = {
        origin: new google.maps.LatLng(35.681382,139.766084), // 出発地
        // origin: from,
        destination: this.mapPosition, // 目的地
//        waypoints:wayPoints,
        travelMode: google.maps.DirectionsTravelMode.WALKING, // 交通手段(歩行。DRIVINGの場合は車)
        };
        // ルート検索
        d.route(request, function(result, status){
        // OKの場合ルート描画
        if (status == google.maps.DirectionsStatus.OK) {
        r.setDirections(result);
        }
        });
    },
  },
  mounted : function(){
    this.loadJS(`https://maps.googleapis.com/maps/api/js?key=${GOOGLEMAP_API_KEY}&callback=initMap`)
    window.initMap = this.initMap;
  },
  destroyed(){
    const oldTag = document.getElementById('google-map')
    oldTag.parentNode.removeChild(oldTag);
    window.google = {}
  }
};
</script>
