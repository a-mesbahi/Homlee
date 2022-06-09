import {createRouter, createWebHistory}  from 'vue-router'
import Home from '../views/Home.vue'
import Login from '../views/Login.vue'
import GetIdeas from '../views/GetIdeas.vue'
import GetProfession from '../views/GetProfession.vue'
import ShopPart from '../views/ShopPart.vue'
import Index from '../views/Dashboard/Index.vue'
import Statistics from '../views/Dashboard/Statistics.vue'
import Products from '../views/Dashboard/Products.vue'
import Professionals from '../views/Dashboard/Professionals.vue'
import Sales from '../views/Dashboard/Sales.vue'
import AdminLogin from '../views/Dashboard/login.vue'
import DashboardSingleProduct from '../views/Dashboard/DashboardSingleProduct.vue'
import HomleePros from '../views/HomleePros/Index.vue'
import Profile from '../views/HomleePros/Profile.vue'
import AddProject from '../views/HomleePros/AddProject.vue'
import ProfessionalProject from '../views/HomleePros/ProfessionalProject.vue'
import Login_prof from '../views/HomleePros/Login_prof.vue'
import ProfessionalEditProfile from '../views/HomleePros/ProfessionalEditProfile.vue'
import Product from '../views/Product.vue'
import Contact from '../views/Contact.vue'
import NotFound from '../views/NotFound.vue'

const routes = [
    {
        path: '/',
        name: 'Home',
        component: Home,
    },
    {
        path: '/login',
        name: 'Login',
        component: Login,
    },
    {
        path: '/GET_IDEAS_',
        name: 'GetIdeas',
        component: GetIdeas,
    },
    {
        path: '/GET_PROFESSION_',
        name: 'GetProfession',
        component: GetProfession,
    },
    {
        path: '/Products',
        name: 'ShopPart',
        component: ShopPart,
    },{
        path: '/login_prof',
        name: 'Login_prof',
        component: Login_prof,
    },
    {
        path:'/professional/profile',
        name:'Profile',
        component:Profile,
        children:[
            {
                path:'',
                name: 'ProfessionalProject',
                component:ProfessionalProject
            }
            ,
            {
                path:'/professional/profile/edit',
                name: 'ProfessionalEditProfile',
                component:ProfessionalEditProfile
            },
            {
                path:'/professional/profile/AddProject',
                name: 'AddProject',
                component:AddProject
            }
        ]
    },
    {
        path: '/:id/product',
        name: 'Product',
        component: Product,
    },
    {
        path: '/dashboard/login',
        name: 'AdminLogin',
        component: AdminLogin,
    },
    {
        path: '/dashboard',
        name: 'Index',
        component: Index,
        children:[
            {
                path:'',
                name: 'Statistics',
                component:Statistics
            }
            ,{
                path:'/dashboard/products',
                name: 'Products',
                component:Products
            }
            ,{
                path:'/dashboard/:id/product',
                name: 'DashboardSingleProduct',
                component:DashboardSingleProduct
            }
            ,{
                path:'/dashboard/Professionals',
                name: 'Professionals',
                component:Professionals
            },
            {
                path:'/dashboard/sales',
                name: 'Sales',
                component:Sales
            }
        ]
    },
    {
        path:'/pros',
        name:'HomleePros',
        component:HomleePros
    },
    {
        path:'/contact',
        name:'Contact',
        component:Contact
    },
    {
        name:"NotFound",
        path:"/:pathMatch(.*)*",
        component: NotFound
    }
]
const router = createRouter({
    history: createWebHistory(),
    routes,
})










export default router