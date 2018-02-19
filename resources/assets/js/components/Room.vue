<template>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3">
                <listRoom></listRoom>
            </div>
            <div class="col-lg-9">
                <detailRoom></detailRoom>
            </div>
        </div>
    </div>
</template>

<script>
    import ListRoom from './room/ListRoom.vue';
    import DetailRoom from './room/DetailRoom.vue';

    export default {
        components: {
            listRoom: ListRoom,
            detailRoom: DetailRoom
        },
        watch: {
            '$route' (to, from) {
                Echo.leave(`room.` + from.params.id);
                
                this.$store.dispatch('message/fetchMessagesOfRoom', parseInt(to.params.id));

                Echo.join(`room.` + this.$route.params.id)
                .here((users) => {
                    this.$store.dispatch('user/countUsersInChannels');
                    this.$store.dispatch('user/fetchUsersInRoom', users);
                })
                .joining((user) => {
                    // this.$store.dispatch('user/countUsersInChannels');
                    this.$store.dispatch('user/addUserJoinRoom', user);
                    this.$toaster.success(user.name + ' đã vào phòng ');
                })
                .leaving((user) => {
                    // this.$store.dispatch('user/countUsersInChannels');
                    this.$store.dispatch('user/removeUserLeaveRoom', user);
                    this.$toaster.error(user.name + ' đã rời phòng ');
                })
                .listen('ChatEvent', (e) => {
                    this.$store.dispatch('message/addMessage', e);
                });
            }
        },
        created() {
            this.$store.dispatch('user/countUsersInChannels');
            this.$store.dispatch('user/setCurrentUser');
            this.$store.dispatch('room/fetchRooms');

            this.$store.dispatch('message/fetchMessagesOfRoom', parseInt(this.$route.params.id));

            Echo.join(`room.` + this.$route.params.id)
            .here((users) => {
                this.$store.dispatch('user/countUsersInChannels');
                this.$store.dispatch('user/fetchUsersInRoom', users);
            })
            .joining((user) => {
                // this.$store.dispatch('user/countUsersInChannels');
                this.$store.dispatch('user/addUserJoinRoom', user);
                this.$toaster.success(user.name + ' đã vào phòng ');
            })
            .leaving((user) => {
                // this.$store.dispatch('user/countUsersInChannels');
                this.$store.dispatch('user/removeUserLeaveRoom', user);
                this.$toaster.error(user.name + ' đã rời phòng ');
            })
            .listen('ChatEvent', (e) => {
                this.$store.dispatch('message/addMessage', e);
            });


            Echo.private(`messenger`)
                .listen('RoomEvent', (e) => {
                    this.$store.dispatch('room/addRoom', e);
                    this.$toaster.error('Phòng "' + e.name + '" mới được tạo kìa. Vào chém gió đi ace !!! ');
                });
        },
        mounted() {
            // console.log('Component mounted.')
            // setInterval(() => {
            //     this.$store.dispatch('user/countUsersInChannels')
            // }
            // , 5000);
        }
    }
</script>
