import Vue from 'vue';
import Vuex from 'vuex';
import room from './modules/room';
import user from './modules/user';
import message from './modules/message';

Vue.use(Vuex);

export default new Vuex.Store ({
	modules: {
		room,
		user,
		message
	},
	strict: true,
})