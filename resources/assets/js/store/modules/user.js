import * as types from '../mutation-types'

// state
const state = {
	current_user: {},
	users: [],
	countUsersInChannels: {}
}

// getters
const getters = {
	getCurrentUser: state => {
		return state.current_user;
	},
	getUsers: state => {
		return state.users;
	},
	getCountUsersOnline: state => {
		return room_id => {
			if (!(_.isUndefined(state.countUsersInChannels.channels))) {
				if (!(_.isUndefined(state.countUsersInChannels.channels['presence-room.' + room_id]))) {
					return state.countUsersInChannels.channels['presence-room.' + room_id].user_count;
				}
				return 0;
			}
			return 0;
		}
	}
}

// mutations
const mutations = {
	[types.SET_CURRENT_USER]: (state, current_user) => {
		state.current_user = current_user;
	},
	[types.FETCH_USERS_IN_ROOM]: (state, users) => {
		state.users = users;
		state.users.sort((a, b) => a.name > b.name);
	},
	[types.ADD_USER_JOIN_ROOM]: (state, user) => {
		state.users.push(user);
		state.users.sort((a, b) => a.name > b.name);
	},
	[types.REMOVE_USER_LEAVE_ROOM]: (state, user) => {
		state.users.splice(state.users.indexOf(user), 1);
		state.users.sort((a, b) => a.name > b.name);
	},
	[types.COUNT_USERS_IN_CHANNELS]: (state , count) => {
		state.countUsersInChannels = count;
	}
}

// actions
const actions = {
	setCurrentUser: ({ commit }) => {
		return axios.get('/api/users/current-user')
			.then(response => {
	            // console.log(response);
	            commit(types.SET_CURRENT_USER, response.data)
	        })
			.catch(error => {
	            // console.log(error);
	        });
	},
	fetchUsersInRoom: ({ commit }, users) => {
		commit(types.FETCH_USERS_IN_ROOM, users);
	},
	addUserJoinRoom: ({ commit }, user) => {
		commit(types.ADD_USER_JOIN_ROOM, user);
	},
	removeUserLeaveRoom: ({ commit }, user) => {
		commit(types.REMOVE_USER_LEAVE_ROOM, user);
	},
	countUsersInChannels: ({ commit }) => {
		return axios.get('/api/users/count-users-in-channels')
			.then(response => {
	            // console.log(response);
	            commit(types.COUNT_USERS_IN_CHANNELS, response.data)  
	        })
			.catch(error => {
	            // console.log(error);
	        });
	}
}

export default {
	namespaced: true,
	state,
	getters,
	mutations,
	actions
}