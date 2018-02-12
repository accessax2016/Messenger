<template>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3">
                <listRoom></listRoom>
            </div>
            <div class="col-lg-9">
                <guideRoom></guideRoom>
            </div>
        </div>
    </div>
</template>

<script>
    import ListRoom from './room/ListRoom.vue';
    import Guide from './Guide.vue';

    export default {
        components: {
            listRoom: ListRoom,
            guideRoom: Guide
        },
        created() {
            this.$store.dispatch('user/setCurrentUser');
            this.$store.dispatch('user/countUsersInChannels');
            this.$store.dispatch('room/fetchRooms');
        },
        mounted() {
            // console.log('Component mounted.')
        }
    }
</script>
