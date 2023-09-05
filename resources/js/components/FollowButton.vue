<template>
    <div>
        <button class="btn btn-primary btn-sm" @click="followUser" v-text="buttonText" style="margin-left: 25px;"></button>
        <!-- <div class="pr-5" style="padding-right: 30px; margin-left: 25px;"><strong>{{ followersCount }}</strong> Followers</div> -->
    </div>
</template>

<script>
    export default {
        props: ['user_id', 'follow_status'],

        mounted() {

        },

        data: function() {
            return {
                status: this.follow_status,
                // followersCount: this.followers
            }
        },

        methods: {
            followUser() {
                axios.post('/follow/' + this.user_id).then(response => {
                    this.status = !(this.status);
                    // this.followersCount = response.data.followers;
                    // console.log(response.data);
                })
                .catch(errors => {
                    if(errors.response.status == 401) {
                        window.location = '/login';
                    }

                    if(errors.response.status == 403) {
                        alert('You cannot follow yourself');
                    }
                });
            }
        },

        computed : {
            buttonText() {
                return (this.status) ? "Unfollow" : "Follow";
            }
        },
    }
</script>
