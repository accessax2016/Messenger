 <template>
 	<div v-if="users" class="room-participant">
        <p class="participant-title">Người tham gia ({{ users.length }})</p>
        <div class="participant-list">
            <div class="list-group">
                <a class="list-group-item" v-for="user in users" :key="user.id">
                    <div class="participant">
                        <div class="participant-image">
                            <img :src="sourceImage(user.image)" class="img-circle" width="35" height="35">
                        </div>
                        <div class="participant-name">
                            <p class="username">{{ user.name }}</p>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        computed: {
            users() {
                return this.$store.getters['user/getUsers'];
            }
        },
        methods: {
            sourceImage(url) {
                return "/image/user/" + url;
            }
        },
        mounted() {
            // console.log('Component mounted.')
        }
    }
</script>
