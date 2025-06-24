<script setup>
import { ref } from 'vue';
import DataTable from 'primevue/datatable';
import Column from 'primevue/column';
import Button from 'primevue/button';
import UpdateForm from './UpdateForm.vue';
import ConfirmDialog from 'primevue/confirmdialog';
import { useToast } from 'primevue/usetoast';
import Toast from 'primevue/toast';
import { useConfirm } from 'primevue/useconfirm';

const { categorias } = defineProps({
    categorias: {
        type: Array,
        default: []
    }
})

const emit = defineEmits(['finishEdit']);
const confirm = useConfirm();
const toast = useToast();

const showModal = ref(false);
const selected = ref(null);



const editar = (data, index) => {
    selected.value = {
        active: data.status == 'Active',
        ...data,

    };
    showModal.value = true;
};
const excluir = (data, index) => {
    confirm.require({
        message: 'Tem certeza que deseja excluir esta categoria?',
        header: 'Confirmação',
        icon: 'pi pi-exclamation-triangle',
        acceptLabel: 'Sim',
        rejectLabel: 'Não',
        acceptClass: 'p-button-danger',
        accept: async () => {
            await deleteCategory(data);
        },
        reject: () => {

        }
    });
};

const finishModal = () => {
    console.log("aaaaaaaaaaaaaa")
    showModal.value = false;
    emit('finishEdit');
}

const deleteCategory = async (data) => {
    try {
        const response = await axios.delete(`/categorias/${data.id}`);
        if (response.status == 204) {
            toast.add({
                severity: 'success',
                summary: 'Sucesso',
                detail: 'Categoria excluida com sucesso.',
                life: 1500
            });
            emit('finishEdit');
        }
    } catch (err) {
        console.error(err);
        toast.add({
            severity: 'error',
            summary: 'Erro',
            detail: 'Erro ao excluir categoria.',
            life: 1500
        });
    }
}
 
</script>
<template>
    <DataTable stripedRows :value="categorias" class="shadow-md mt-0 rounded" responsiveLayout="scroll">
        <Column field="id" header="Id" />
        <Column field="name" header="Nome" />
        <Column field="status" header="Status" />
        <Column header="Editar" style="width: 120px;" class="px-3">
            <template #body="{ data, index }">
                <Button type="button" icon="pi pi-pencil" severity="success" class="px-2 bg-cyan-900" text-size="small"
                    @click="editar(data, index)" />
                <template v-if="index == 0">
                    <UpdateForm @finish="finishModal" :selected="selected" v-model:visible="showModal" />
                </template>

            </template>
        </Column>
        <Column header="Excluir" style="width: 120px;" class="px-3">
            <template #body="{ data, index }">
                <Button type="button" icon="pi pi-trash" severity="success" class="px-2 bg-cyan-900" text-size="small"
                    @click="excluir(data, index)" />
                <template v-if="index == 0">
                    <ConfirmDialog />
                    <Toast/>
                </template>

            </template>
        </Column>
    </DataTable>
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