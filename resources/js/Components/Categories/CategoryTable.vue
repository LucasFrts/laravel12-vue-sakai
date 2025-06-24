<script setup>
import DataTable from 'primevue/datatable';
import Column from 'primevue/column';
import { reactive, ref, computed } from 'vue';
import Button from 'primevue/button';
import InputText from 'primevue/inputtext';
import Dropdown from 'primevue/dropdown';
import ContentHeader from '../ContentHeader.vue';

const filtros = reactive({
    nomeOuEmail: '',
    status: '',
    atendente: ''
});

const contatosFiltrados = ref([]);
const showFiltered = ref(false);;

const contatos = computed(() => {
    return showFiltered.value ? contatosFiltrados.value : contatosProp.value;
});

const statusOptions = [
    { label: 'Aberto', value: 'aberto' },
    { label: 'Em atendimento', value: 'em_atendimento' },
    { label: 'Concluído', value: 'concluido' }
];

const atendentes = [
    { label: 'Fulano', value: 'Fulano' },
    { label: 'Ciclano', value: 'Ciclano' },
    { label: 'Beltrano', value: 'Beltrano' }
];

const contatosProp = ref([
    { cliente: 'Janice Morahan', status: 'Aberto', atendente: '' },
    { cliente: 'Jallin Rabei', status: 'Em Atendimento', atendente: 'Fulano' },
    { cliente: 'Lena Stroman', status: 'Em Atendimento', atendente: 'Ciclano' },
    { cliente: 'Adan Schiller', status: 'Concluido', atendente: 'Beltrano' },
]);

const verItem = (data, index) => {
    console.log("Ver item:", data, index);
};

const filtrar = () => {
    const resultado = contatosProp.value.filter(contact => {
        const nomeOuEmail = filtros.nomeOuEmail.toLowerCase();
        const matchNomeEmail = contact.cliente.toLowerCase().includes(nomeOuEmail) || (contact.email && contact.email.toLowerCase().includes(nomeOuEmail));
        const contactStatus = contact.status.toLowerCase().trim().replace(" ", '_');
        const matchStatus = filtros.status === '' || contactStatus === filtros.status.toLowerCase();
        const matchAtendente = filtros.atendente === '' || contact.atendente.toLowerCase() === filtros.atendente.toLowerCase();
        return matchNomeEmail && matchStatus && matchAtendente;
    });
    showFiltered.value = true;
    contatosFiltrados.value = resultado;
};

const limparFiltros = () => {
    filtros.nomeOuEmail = '';
    filtros.status = '';
    filtros.atendente = '';
    contatosFiltrados.value = [];
    showFiltered.value = false;
};

</script>
<template>
    <form class="flex flex-wrap gap-4 mb-6 items-center justify-start pt-3" @submit.prevent="filtrar">
        <div class="w-full sm:w-auto">
            <InputText v-model="filtros.nomeOuEmail" placeholder="Nome ou email do cliente" class="w-full input-text" />
        </div>

        <div class="w-full sm:w-auto">
            <Dropdown v-model="filtros.status" :options="statusOptions" optionLabel="label" optionValue="value"
                placeholder="Status" class="w-full" />
        </div>

        <div class="w-full sm:w-auto">
            <Dropdown v-model="filtros.atendente" :options="atendentes" optionLabel="label" optionValue="value"
                placeholder="Atendente" class="w-full" />
        </div>

        <Button label="Filtrar" icon="pi pi-filter" class="w-full sm:w-auto" type="submit" />
        <Button label="Limpar" icon="pi pi-filter-slash" class="w-full sm:w-auto" type="button"
            @click="limparFiltros" />
    </form>
    <template v-if="contatos.length > 0">
        <DataTable stripedRows :value="contatos" class="shadow-md mt-0 rounded" responsiveLayout="scroll">
            <Column field="cliente" header="Cliente" />
            <Column field="status" header="Status" />
            <Column field="atendente" header="Atendido por:" />
            <Column header="Ações" style="width: 120px;" class="px-3">
                <template #body="{ data, index }">
                    <Button type="button" label="Ver" icon="pi pi-search-plus" severity="success"
                        class="px-2 bg-cyan-900" text-size="small" @click="verItem(data, index)" />
                </template>
            </Column>
        </DataTable>
    </template>
    <template v-else>
        <ContentHeader color="bg-amber-400 text-cyan-900 font-bold rounded" :title="`${showFiltered ? 'Sem atendimentos para o status definido' : 'Sem atendimentos para a gategoria definida'}`"/>
    </template>

</template>
<style lang="css">
.input-text {
    background: #1e1e1e;
    border-color: #1e1e1e;
    color: rgba(255, 255, 255, 0.6);
    transition: background-color 0.2s, border-color 0.2s, color 0.2s, box-shadow 0.2s, background-size 0.2s cubic-bezier(0.64, 0.09, 0.08, 1);
    border-radius: 4px;
}

.input-text::focus {
    border-color: #e5e7eb;
}
</style>