import Vue from 'vue'
import Vuex from 'vuex'

import auth from './auth'
import file from './file'

Vue.use(Vuex)

const store = new Vuex.Store({
	modules: {
		auth,
		file
	}
})

export default store
