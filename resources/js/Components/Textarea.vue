<template>
  <Textarea v-bind="$attrs" v-model="model" class="custom-textarea" />
</template>

<script setup>
import { computed } from 'vue';
import Textarea from 'primevue/textarea';

const props = defineProps(['modelValue']);
const emit = defineEmits(['update:modelValue']);

const model = computed({
  get: () => props.modelValue,
  set: value => emit('update:modelValue', value)
});
</script>

<style scoped>
.custom-textarea {
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

.custom-textarea:focus-within,
.custom-textarea:focus {
  border-color: #e5e7eb;
  outline: none;
}
</style>
