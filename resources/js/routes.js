
const GradoviList = () => import('./components/category/GradoviComponent.vue' /* webpackChunkName: "resource/js/components/category/list" */)
const CreateGrad = () => import('./components/category/ExampleComponent.vue' /* webpackChunkName: "resource/js/components/category/add" */)


export const routes = [
    
    {
        name: 'gradoviList',
        path: '/gradovi',
        component: GradoviList
    },
    
    {
        name: 'categoryAdd',
        path: '/gradovi/add',
        component: CreateGrad
    }
]