// import Home from './components/Home.vue';
import Room from './components/Room.vue';

const routes = [
    { 
    	path: '/', 
    	// component: Home, 
    	// name: 'home',
        redirect: '/room/1/dai-sanh' 
    },
    {
    	path: '/room/:id/:name_url',
    	component: Room,
    	name: 'room'
    }
];

export default routes;