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
	}
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
	departurePosition: state => state.departurePosition ? state.departurePosition : ''

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
	}
}

const actions = {
	async register (context, data) {
		// const response = await axios.post('/api/register', data)
		context.commit('setPlace', data)
	},
	registerDPosition (context, data) {
		// const response = await axios.post('/api/register', data)
		context.commit('setDPosition', data)
	},
	async registerAPosition (context, data) {
		// const response = await axios.post('/api/register', data)
		context.commit('setAPosition', data)
	}
}

export default {
	namespaced: true,
	state,
	getters,
	mutations,
	actions
}
