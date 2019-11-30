<template>
    <div class="grid-item">
        <img :src="getImageUrl()" alt="">
    </div>
</template>

<script>
    export default {
        props: [
            'photo_data'
        ],
        created() {
            console.log('Photo component.', this.photo_data)
        },
        methods: {
            getImageUrl () {
                return '/uploads/' + this.photo_data.path + '/'  + this.photo_data.image;
            }
        }
    }
</script>