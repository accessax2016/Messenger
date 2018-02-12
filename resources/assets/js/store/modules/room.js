import * as types from '../mutation-types'

// state
const state = {
	rooms: [],
}

// getters
const getters = {
	getAllRooms: state => {
		return state.rooms;
	},
	getAmountRooms: state => {
		return state.rooms.length;
	},
	getRoom: state => {
		return room_id => state.rooms.find(room =>  room.id === room_id);
	}
}

// mutations
const mutations = {
	[types.FETCH_ROOMS]: (state, rooms) => {
		state.rooms = rooms;
		// state.rooms.sort((a, b) => a.id > b.id);
	},
	[types.ADD_ROOM]: (state, room) => {
		state.rooms.push(room);
		// state.rooms.sort((a, b) => a.id > b.id);
	}
}

// actions
const actions = {
	fetchRooms: ({ commit }) => {
		return axios.get('/api/rooms')
			.then(response => {
	            // console.log(response);
	            commit(types.FETCH_ROOMS, response.data)
	        })
			.catch(error => {
	            // console.log(error);
	        });
	},
	createRoom: ({ commit }, room) => {
		return axios.post('/api/rooms/create', room)
			.then(response => {
				// console.log(response);
				commit(types.ADD_ROOM, response.data)
			})
			.catch(error => {
				// console.log(error);
			})
	},
	addRoom: ({ commit }, room) => {
		commit(types.ADD_ROOM, room)
	}
}

export default {
	namespaced: true,
	state,
	getters,
	mutations,
	actions
}