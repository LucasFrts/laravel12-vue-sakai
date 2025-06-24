<script setup>
import AppLayout from "@/primevue/layout/AppLayout.vue";
import { Head } from "@inertiajs/vue3";
import { ref } from 'vue';
import ContentHeader from "@/Components/ContentHeader.vue";
import CategoriesTable from "@/Components/Categories/CategoriesTable.vue";
import CreateForm from "@/Components/Categories/CreateForm.vue";
import Button from 'primevue/button';

const { categorias:categoriasProps } = defineProps({
    categorias: {
        type: Array,
        default: []
    }
});

const categorias = ref(categoriasProps);

const showModal = ref(false);

const getCategories = async () => {
    const response = await axios.get('/categorias');
    console.log("voltou", response);
    categorias.value = response.data;
}

const finishModal = async () => {
    await getCategories();
    showModal.value = false;
}

</script>
<template>
    <AppLayout>
        <Head title="Categorias" />
        <ContentHeader title="Categorias"/>
            <div class="flex justify-end">
                <Button label="Nova Categoria"  icon="pi pi-plus" class="my-3 bg-cyan-900 px-3 py-2 font-bold" @click="showModal = true" />
            </div>
          
          <CategoriesTable @finishEdit="finishModal" :categorias="categorias"/>
       
        <CreateForm @finish="finishModal" v-model:visible="showModal"/>

    </AppLayout>
</template>