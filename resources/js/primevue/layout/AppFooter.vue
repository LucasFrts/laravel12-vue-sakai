<script setup>
import { computed } from 'vue';

const logoUrl = "/images/laravel-icon.webp";
</script>

<template>
    <div class="layout-footer">
        <img :src="logoUrl" alt="Logo" height="20" class="mr-2" />
        by
        <span class="font-medium ml-2">Lucas Freitas</span>
    </div>
</template>
<style lang="scss" scoped>
img{
    max-width: 100px;
}
</style>
