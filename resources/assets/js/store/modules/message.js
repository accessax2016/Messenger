import * as types from '../mutation-types'

// state
const state = {
	messages: []
}

// getters
const getters = {
	getMessages: (state) => {
		return state.messages;
	}
}

// mutations
const mutations = {
	[types.FETCH_MESSAGES_OF_ROOM]: (state, messages) => {
		state.messages = messages;
		// state.messages.sort((a, b) => a.created_at > b.created_at);
	},
	[types.ADD_MESSAGE]: (state, message) => {
		state.messages.push(message);
		// state.messages.sort((a, b) => a.created_at > b.created_at);
	}
}

// actions
const actions = {
	fetchMessagesOfRoom: ({ commit }, room_id) => {
		return axios.get('/api/messages/room/' + room_id)
			.then(response => {
	            // console.log(response);
	            commit(types.FETCH_MESSAGES_OF_ROOM, response.data)
	        })
			.catch(error => {
	            // console.log(error);
	        });
	},
	sendMessage: ({ commit }, message) => {
		return axios.post('/api/messages/send', message)
			.then(response => {
	            // console.log(response);
	            commit(types.ADD_MESSAGE, response.data)
	        })
			.catch(error => {
	            // console.log(error);
	        });
	},
	addMessage: ({ commit }, message) => {
		commit(types.ADD_MESSAGE, message)
	}
}

export default {
	namespaced: true,
	state,
	getters,
	mutations,
	actions
}