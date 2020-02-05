<template>
	<footer class="footer">
		<div v-if="isLogin">
			<button class="button button--link" @click="logout">Logout</button>
			<button class="button button--link" @click="admin">ルート・お店登録</button>
		</div>
		<RouterLink  v-else class="button button--link" to="/login">
			Login / Register
		</RouterLink>
	</footer>
</template>

<script>
export default {
	computed: {
		isLogin () {
			return this.$store.getters['auth/check']
		}
	},
	methods: {
		async logout () {
			await this.$store.dispatch('auth/logout')
			this.$router.push('/login')
		},
		async admin() {
			this.$router.push('/registertop')
		}
	}
}
</script>
