<script setup>
import DataTable from 'primevue/datatable';
import Column from 'primevue/column';
import { ref } from 'vue';
import Button from 'primevue/button';
import ContentHeader from '../ContentHeader.vue';

const contatos = ref([
  { cliente: 'Janice Morahan', categoria: 'Categoria A', pedido: 'Lorem ipsum...' },
  { cliente: 'Rollin Fadel', categoria: 'Categoria C', pedido: 'Lorem ipsum...' },
  { cliente: 'Lena Stroman', categoria: 'Categoria B', pedido: 'Lorem ipsum...' },
  { cliente: 'Adan Schiller', categoria: 'Categoria A', pedido: 'Lorem ipsum...' },
]);

const verItem = (data, index) => {
  console.log("Ver item:", data, index);
};

</script>
<template>
    <ContentHeader title="Contatos recentes" class="mt-6"/>
    <DataTable stripedRows :value="contatos" class="shadow-md mt-0 rounded-md" responsiveLayout="scroll">
      <Column field="cliente" header="Cliente"/>
      <Column field="categoria" header="Categoria"/>
      <Column field="pedido" header="Parte do texto pedido"/>
      <Column header="Ações" style="width: 120px;" class="px-3">
        <template #body="{ data, index }">
         <Button type="button" label="Ver" icon="pi pi-search-plus" severity="success" class="px-2 bg-cyan-900" text-size="small" @click="verItem(data, index)" />
        </template>
      </Column>
    </DataTable>
</template>