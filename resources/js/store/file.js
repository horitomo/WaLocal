const state = {
	arrival : null,
	departure : null,
	departurePosition:{
		lat: null,
		lng:null
	},
	arrivalPosition:{
		lat: null,
		lng: null
	},
	lat: null,
	lng: null,
	address: null
}

const getters = {
	// arrival(state) {
	// 	return state.arrival;
	// },
	checkA: state => !! state.arrival,
	checkD: state => !! state.departure,
	arrival: state => state.arrival ? state.arrival : '',
	departure: state => state.departure ? state.departure : '',
	arrivalPosition: state => state.arrivalPosition ? state.arrivalPosition : '',
	departurePosition: state => state.departurePosition ? state.departurePosition : '',
	lat: state => state.lat ? state.lat : '',
	lng: state => state.lng ? state.lng : '',
	address: state => state.address ? state.address : ''
}

const mutations = {
	setPlace (state, data) {
		state.arrival = data.arrival
		state.departure = data.departure
	},
	setDPosition (state, data) {
		state.departurePosition.lat = data.lat
		state.departurePosition.lng = data.lng
	},
	setAPosition (state, data) {
		state.arrivalPosition.lat = data.lat
		state.arrivalPosition.lng = data.lng
	},
	setStoreLatLng (state, data) {
		state.lat = data.lat
		state.lng = data.lng
		state.address = data.address
	}
}

const actions = {
	register (context, data) {
		context.commit('setPlace', data)
	},
	registerDPosition (context, data) {
		context.commit('setDPosition', data)
	},
	registerAPosition (context, data) {
		context.commit('setAPosition', data)
	},
	storeLatLng (context, data) {
		context.commit('setStoreLatLng', data)
	},
	route (context, data) {
		const response = axios.post('/api/route', data)
	}
}

export default {
	namespaced: true,
	state,
	getters,
	mutations,
	actions
}
