<template>
    <div class="grid-item">
        <img width="300px" :src="getImageUrl()" alt="">
    </div>
</template>

<script>
    export default {
        props: [
            'photo_data'
        ],

        mounted() {
            
        },

        methods: {
            getImageUrl () {
                return '/uploads/' + this.photo_data.path + '/'  + this.photo_data.image;
            }
        }
    }
</script>