<template>
    <div>

            <div v-for="(n,index) in 7" :key="index">
                <span></span>
                <star-rating :rating="3"></star-rating>
            </div>

    </div>
</template>

<script>
    import StarRating from 'vue-star-rating'

export default {


    components: {
      StarRating
    },
    mounted() {
        console.log('Component mounted.'+this.id)
    }
}
</script>

<style lang="stylus" scoped>

</style>
