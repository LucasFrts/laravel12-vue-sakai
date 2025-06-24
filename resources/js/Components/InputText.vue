<template>
  <InputText v-bind="$attrs" v-model="model" class="custom-input-text" />
</template>

<script setup>
import { computed } from 'vue';
import InputText from 'primevue/inputtext';

const props = defineProps(['modelValue']);
const emit = defineEmits(['update:modelValue']);

const model = computed({
  get: () => props.modelValue,
  set: value => emit('update:modelValue', value)
});
</script>

<style scoped>
.custom-input-text {
  background: #1e1e1e;
  border: 1px solid #1e1e1e;
  color: rgba(255, 255, 255, 0.6);
  border-radius: 4px;
  padding: 0.5rem;
  transition:
    background-color 0.2s,
    border-color 0.2s,
    color 0.2s,
    box-shadow 0.2s,
    background-size 0.2s cubic-bezier(0.64, 0.09, 0.08, 1);
}

.custom-input-text:focus-within,
.custom-input-text:focus {
  border-color: #e5e7eb;
  outline: none;
}
</style>
