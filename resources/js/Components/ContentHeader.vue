<script setup>
const props = defineProps({
    title:{
      type:String,
      default:""
    },
    color:{
      type:String,
      default:"bg-cyan-900 text-white"
    }
});
</script>
<template>
    <div :class="`${color} text-lg font-medium px-4 py-2 rounded-t-md`">
      {{ props.title }}
    </div>
</template>