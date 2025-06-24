<script setup>
import { ref } from 'vue';
import Dialog from 'primevue/dialog';
import InputText from '../InputText.vue';
import Textarea from '../Textarea.vue';
import InputSwitch from 'primevue/inputswitch';
import Button from 'primevue/button';
import { useToast } from 'primevue/usetoast';
import Toast from 'primevue/toast';
import axios from 'axios';

const toast = useToast();

const emit = defineEmits(['finish']);

const form = ref({
  name: '',
  description: '',
  active: true
});

const errors = ref({
  name: null,
  description: null
});

const validateForm = () => {
  let valid = true;
  errors.value.name = form.value.name ? null : 'O nome é obrigatório.';
  errors.value.description = form.value.description ? null : 'A descrição é obrigatória.';

  if (errors.value.name || errors.value.description) {
    toast.add({
      severity: 'error',
      summary: 'Erro de Validação',
      detail: 'Preencha todos os campos obrigatórios.',
      life: 3000
    });
    valid = false;
  }

  return valid;
};

const salvarCategoria = async () => {
  if (!validateForm()) return;

  try {
    const response = await axios.post('/categorias', form.value);
    console.log(response)
    if (response.status == 201) {
      toast.add({
        severity: 'success',
        summary: 'Sucesso',
        detail: 'Categoria criada com sucesso.',
        life: 1500
      });
      emit('finish');
    }
  }
  catch (err) {
    console.error(err);
    toast.add({
      severity: 'error',
      summary: 'Erro',
      detail: 'Erro ao criar categoria.',
      life: 1500
    });
  }

  
};
</script>
<template>
  <Dialog modal header="Nova Categoria" :style="{ width: '30rem' }">
    <div class="flex flex-col gap-4">
      <Toast />
      <div>
        <label for="nome" class="block text-sm font-medium text-gray-100 mb-1">Nome</label>
        <InputText id="nome" v-model="form.name" class="w-full" :class="{ 'p-invalid': errors.name }" />
        <small v-if="errors.name" class="p-error">{{ errors.name }}</small>
      </div>

      <div>
        <label for="descricao" class="block text-sm font-medium text-gray-100 mb-1">Descrição</label>
        <Textarea id="descricao" v-model="form.description" rows="4" class="w-full"
          :class="{ 'p-invalid': errors.description }" />
        <small v-if="errors.description" class="p-error">{{ errors.description }}</small>
      </div>

      <div class="flex items-center justify-between">
        <label class="text-sm font-medium text-gray-100">Ativo</label>
        <InputSwitch v-model="form.active" />
      </div>

      <div class="flex justify-end">
        <Button label="Salvar" icon="pi pi-check" class="bg-cyan-900 px-3 py-2 font-bold" @click="salvarCategoria" />
      </div>
    </div>
  </Dialog>
</template>