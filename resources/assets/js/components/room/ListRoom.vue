<template>
    <div v-if="rooms" class="room-section">
        <div class="room-section-title">
            <p class="lead text-center">
                Danh Sách Phòng ({{ filteredRooms.length }})
                <span class="glyphicon glyphicon-plus pull-right add-room" aria-hidden="true" data-toggle="modal" data-target="#myModal"></span>
                <createRoom></createRoom>
            </p>
        </div>
        <div class="room-section-search">
            <input type="text" name="" class="form-control" placeholder="Tìm kiếm ..." v-model="search">
        </div>
        <div class="room-section-content">
            <div class="room-list">
                <div class="list-group">
                    <router-link :to="{ name: 'room', params: {id: room.id, name_url: room.name_url} }" class="list-group-item" 
                    v-for="room in filteredRooms" :key="room.id" exact>
                        <div class="room">
                            <div class="room-image">
                                <img :src="sourceImage(room.image)" class="img-circle" width="60" height="60">
                            </div>
                            <div class="room-name">
                                <p class="name">{{ room.name }}</p>
                                <p class="text-muted">
                                    <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                                    {{ countUsersOnline(room.id) }} người đang truy cập
                                </p>
                            </div>
                        </div>
                    </router-link>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import CreateRoom from './CreateRoom.vue';

    export default {
        components: {
            createRoom: CreateRoom
        },
        computed: {
            rooms() {
                return this.$store.getters['room/getAllRooms'];
            },
            filteredRooms() {
                return this.rooms.filter((room) => {
                    return room.name.match(this.search);
                })
            }
        },
        data() {
            return {
                search: ''
            }
        },
        methods: {
            sourceImage(url) {
                return "/image/room/" + url;
            },
            countUsersOnline(room_id) {
                return this.$store.getters['user/getCountUsersOnline'](room_id)
            }
        },
        mounted() {
            // console.log('Component mounted.')
        }
    }
</script>
