import { createRouter, createWebHistory } from 'vue-router'
import Home from '../views/Home.vue'

const router = createRouter({
	history: createWebHistory(import.meta.env.BASE_URL),
	routes: [
		{
			path: '/',
			name: 'home',
			component: Home
		},
		{
			path: '/inputs',
			name: 'inputs',
			component: () => import('../views/Inputs.vue')
		},
		{
			path: '/buttons',
			name: 'buttons',
			// route level code-splitting
			// this generates a separate chunk (About.[hash].js) for this route
			// which is lazy-loaded when the route is visited.
			component: () => import('../views/Buttons.vue')
		},
		{
			path: '/draggable-custom',
			name: 'draggable-custom',
			component: () => import('../views/CustomDraggable.vue')
		},
		{
			path: '/draggable-library',
			name: 'draggable-library',
			component: () => import('../views/LibraryDraggable.vue')
		},
		{
			path: '/testing',
			name: 'testing',
			component: () => import('../views/Testing.vue')
		},
	]
})

export default router
