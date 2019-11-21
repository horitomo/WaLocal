const state = {
	arrival : null,
	departure : null
}

const getters = {
	// arrival(state) {
	// 	return state.arrival;
	// },
	checkA: state => !! state.arrival,
	checkD: state => !! state.departure,
	arrival: state => state.arrival ? state.arrival : '',
	departure: state => state.departure ? state.departure : ''
}

const mutations = {
	setPlace (state, data) {
		state.arrival = data.arrival
		state.departure = data.departure
	}
}

const actions = {
	async register (context, data) {
		// const response = await axios.post('/api/register', data)
		context.commit('setPlace', data)
	}
}

export default {
	namespaced: true,
	state,
	getters,
	mutations,
	actions
}
