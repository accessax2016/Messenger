 <template>
 	<div v-if="room" class="room-content">
 		<div class="title">
 			<p class="lead text-center">{{ room.name }}</p>
 		</div>
 		<div class="col-lg-8">
 			<div class="chat-section">
 				<listMessage></listMessage>
 				<sendMessage></sendMessage>
 			</div>
 		</div>
 		<div class="col-lg-4">
 			<div class="information-section">
 				<div class="room-information">
 					<div class="room">
 						<div class="room-image">
 							<img :src="sourceImage(room.image)" class="img-circle" width="60" height="60">
 						</div>
 						<div class="room-name">
 							<p class="name" style="margin-bottom: 0px;">{{ room.name }}</p>
 							<p class="name">Người tạo: {{ room.user.name }}</p>
 						</div>
 					</div>
 				</div>
 				<listUser></listUser>
 				<div class="room-action">
 					<br>
 					<router-link :to="{ name: 'room', params: {id: 1, name_url: 'dai-sanh'} }">
 						<button class="btn btn-danger btn-lg btn-block">Rời khỏi phòng</button>
 					</router-link>    
 				</div>
 			</div>
 		</div>
 	</div>
</template>

<script>
    import ListMessage from '../message/ListMessage.vue';
    import SendMessage from '../message/SendMessage.vue';
    import ListUser from '../user/ListUser.vue';

    export default {
        components: {
            listMessage: ListMessage,
            sendMessage: SendMessage,
            listUser: ListUser,
        },
        computed: {
            room() {
            	return this.$store.getters['room/getRoom'](parseInt(this.$route.params.id));
            }
        },
        methods: {
            sourceImage(url) {
                return "/image/room/" + url;
            }
        },
        mounted() {
            // console.log('Component mounted.')
        }
    }
</script>
