<template>
    <div class="group-rom">
        <div class="first-part odd"></div>
        <div class="second-part"><slot></slot></div>
        <div class="third-part">12:30</div>
    </div>
</template>

<script>
    export default {
        
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
