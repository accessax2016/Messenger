 <template>
 	<div v-if="messages && currentUser" class="message-list" v-chat-scroll>
        <ul class="list-group">
            <li class="list-group-item" v-for="message in messages" :key="message.id">
                <img v-if="!(message.user.id === currentUser.id)" :src="sourceImage(message.user.image)" class="img-circle message-avatar pull-left" width="40" height="40" data-toggle="tooltip" data-placement="left" :title="message.user.name">
                <div class="clearfix" data-toggle="tooltip" data-placement="left" :title="message.created_at">
                    <span class="message" :class="messageClass(message.user.id, currentUser.id)">{{ message.content }}</span>
                </div>  
            </li>
        </ul>
    </div>
</template>

<script>
    export default {
        computed: {
            messages() {
            	return this.$store.getters['message/getMessages'];
            },
            currentUser() {
                return this.$store.getters['user/getCurrentUser'];
            }
        },
        methods: {
            sourceImage(url) {
                return "/image/user/" + url;
            },
            messageClass(user_id, current_user_id) {
                if (user_id === current_user_id) {
                    return "pull-right message-active";
                }
                else {
                    return "pull-left";
                }
            },
        },
        mounted() {
            // console.log('Component mounted.')
        }
    }
</script>
