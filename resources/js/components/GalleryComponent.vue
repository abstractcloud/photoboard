<template>
    <div class="gallery grid mt-3">
        <Photo v-for="photo in photos" :photo_data="photo" :key="photo.id" ></Photo>
    </div>
</template>

<script>
    import Photo from './PhotoComponent.vue';
    import axios from 'axios';
    
    export default {
        name: 'Gallery',
        components: {Photo},
        
        data() {
            return{
                photos: []
            }
        },
        
        created() {
            axios.get('/api/gallery')
                
                .then(response => {
                    console.log(response.data);
                    this.photos = response.data;
                })
        }
    }
</script>