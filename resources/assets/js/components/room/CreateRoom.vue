<template>
    <div v-if="currentUser" class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Tạo phòng mới</h4>
                </div>
                <div class="modal-body" style="text-align: left;">
                    <div class="row">
                        <div class="col-lg-4">
                            <img :src="room.image" alt="Hình phòng" class="img-circle" width="150" height="150" >
                        </div>
                        <div class="col-lg-8">
                            <label>Tên phòng (6 - 32 ký tự):</label>
                            <input type="text" class="form-control" name="" v-model="room.name" placeholder="Nhập tên phòng" required>
                            <br>
                            <input type="file" name="image" @change="changeImage">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal" @click="postRoom" :disabled="canClick">TẠO</button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                room: {
                    name: '',
                    image: '',
                    user_id: ''
                }
            }
        },
        computed: {
            currentUser() {
                return this.$store.getters['user/getCurrentUser'];
            },
            canClick() {
                if (this.room.name.length >= 6) {
                    return false;
                }
                return true;
            }
        },
        methods: {
            changeImage(e) {
                let image = e.target.files[0];
                let reader = new FileReader();
                reader.readAsDataURL(image);
                reader.onload = (e) => {
                    this.room.image = e.target.result;
                }
            },
            postRoom() {
                var app = this;
                if (app.room.name.length != 0) {
                    app.room.user_id = app.currentUser.id;
                    // console.log(app.room);
                    app.$store.dispatch('room/createRoom', app.room);

                    setTimeout(
                        () => {
                            app.room.name = '';
                            app.room.image = '';
                        }
                        , 100);
                }
            },
        },
        mounted() {
            // console.log('Component mounted.')
        }
    }
</script>
