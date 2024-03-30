import HomePage from './components/HomePage.vue';
import DetailPage from './components/DetailPage.vue';
 
export const routes = [
    {
        name: 'home',
        path: '/',
        component: HomePage
    },
    {
        name: 'city',
        path: '/city/:cityid',
        component: DetailPage
    }
];