<script setup>
import { ref } from 'vue';

import AppMenuItem from './AppMenuItem.vue';

const model = ref([
    {
        label: 'My App',
        items: [
            { 
                label: 'Home', 
                icon: 'pi pi-fw pi-home', 
                to: '/' 
            },
            { 
                label: 'Categorias', 
                icon: 'pi pi-fw pi-table', 
                items: [
                    { label: 'Cancelamentos', icon: 'pi pi-fw pi-exclamation-circle', to: '/categorias/cancelamento' },
                    { label: 'Itens errados', icon: 'pi pi-fw pi-shopping-bag', to: '/categorias/itens-errados' },
                ]
            },
        ]
    },
]);
</script>

<template>
    <ul class="layout-menu">
        <template v-for="(item, i) in model" :key="item">
            <app-menu-item v-if="!item.separator" :item="item" :index="i"></app-menu-item>
            <li v-if="item.separator" class="menu-separator"></li>
        </template>
    </ul>
</template>

<style lang="scss" scoped></style>
