<script setup>
import AppLayout from "@/primevue/layout/AppLayout.vue";
import { Head } from "@inertiajs/vue3";
import ContentHeader from "@/Components/ContentHeader.vue";
import CategoryTable from "@/Components/Categories/CategoryTable.vue";

</script>
<template>
    <AppLayout>
        <Head title="Items Errados | Categorias" />
        <ContentHeader title="Itens Errados"/>
        <CategoryTable/>
    </AppLayout>
</template>