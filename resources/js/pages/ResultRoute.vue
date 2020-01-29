<template>
	<div>
		<Googlemap2 />
		<RouterLink to="/listStore">
			戻る
		</RouterLink>
		<RouterLink to="/">
			TOP
		</RouterLink>
	</div>
</template>
<script>
import Googlemap2 from '../components/Googlemap2'
export default {
	components:{
		Googlemap2
	}
}
</script>
