<template>
    <div class="form-message">
        <textarea class="form-control" rows="3" placeholder="Nhập tin nhắn ..."
        v-model="message.content"
        @keyup.enter="postMessage" ></textarea>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                message: {
                    content: '',
                    user_id: '',
                    room_id: ''
                }
            }
        },
        computed: {
            currentUser() {
                return this.$store.getters['user/getCurrentUser'];
            }
        },
        methods: {
            postMessage() {
                var app = this;
                if (app.message.content.length != 0) {
                    app.message.user_id = app.currentUser.id;
                    app.message.room_id = parseInt(app.$route.params.id);
                    app.$store.dispatch('message/sendMessage', app.message);

                    setTimeout(
                        () => app.message.content = ''
                        , 100);
                }
            },
        },
        mounted() {
            // console.log('Component mounted.')
        }
    }
</script>
