<template>
	<div class="page-content-wrap">
		<component :is="current_view"></component>
	</div>
</template>

<script>
import Province from './Province.vue'

export default{
	components:{
		Province
	},
	
	data(){
		return{
			current_view: 'Province'
		}
	}
}
</script>

<style>
.page-content-wrap{
	padding: 5px;
}
</style>