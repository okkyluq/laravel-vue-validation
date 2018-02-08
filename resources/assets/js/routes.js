import VueRouter from 'vue-router'



let routes = [
	
	{
		path:'/',
		component:require('./components/index')

	},
	{
		path:'/add',
		component:require('./components/add')
	}

]


export default new VueRouter({
	routes,
	mode:'history'
})