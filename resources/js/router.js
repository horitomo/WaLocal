import Vue from 'vue'
import VueRouter from 'vue-router'

// ページコンポーネントをインポートする
import First from './pages/First'
import RouteRegist from './pages/RouteRegist.vue'
import Login from './pages/Login.vue'
import List from './pages/RouteSelect.vue'
import Route from './pages/Route.vue'
import Search from './pages/Search.vue'
import ListStore from './pages/ListStore'
import ResultRoute from './pages/ResultRoute'

import store from './store'

// VueRouterプラグインを使用する
// これによって<RouterView />コンポーネントなどを使うことができる
Vue.use(VueRouter)

// パスとコンポーネントのマッピング
const routes = [
	{
		path:'/',
		component: First,
		beforeEnter (to, from, next) {
			if (!store.getters['auth/check']) {
				next('/login')
			} else {
				next()
			}
		}
	},
	{
		path: '/register',
		component: RouteRegist
	},
	{
		path: '/login',
		component: Login,
		beforeEnter (to, from, next) {
			if (store.getters['auth/check']) {
				next('/')
			} else {
				next()
			}
		}
	},
	{
		path:'/list',
		component: List
	},
	{
		path:'/route',
		component:Route
	},
	{
		path: '/search',
		component:Search
	},
	{
		path:'/listStore',
		component:ListStore
	},
	{
		path:'/result',
		component:ResultRoute
	}
]

// VueRouterインスタンスを作成する
const router = new VueRouter({
	mode: 'history',
	routes
})

// VueRouterインスタンスをエクスポートする
// app.jsでインポートするため
export default router
