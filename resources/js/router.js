import Vue from 'vue'
import VueRouter from 'vue-router'

// ページコンポーネントをインポートする
import RouteRegist from './pages/RouteRegist.vue'
import Login from './pages/Login.vue'

import store from './store'

// VueRouterプラグインを使用する
// これによって<RouterView />コンポーネントなどを使うことができる
Vue.use(VueRouter)

// パスとコンポーネントのマッピング
const routes = [
	{
		path: '/',
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
