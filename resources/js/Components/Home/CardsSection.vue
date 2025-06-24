<template>
    <div class="gap-6 flex justify-center">
        <Card
            class="flex flex-col items-center justify-center text-center py-3 shadow-md card-width"
        >
            <template #content>
                <div class="flex flex-col items-center">
                    <div class="text-blue-600 text-4xl mb-2">
                        <i class="pi pi-plus-circle"></i>
                    </div>
                    
                    <p class="text-lg font-semibold">Novos</p>
                    <p class="text-2xl font-bol mt-1">0</p>
                </div>
            </template>
        </Card>
        <Card
            class="flex flex-col items-center justify-center text-center py-3 shadow-md card-width"
        >
            <template #content>
                <div class="flex flex-col items-center">
                    <div class="text-orange-500 text-4xl mb-2">
                        <i class="pi pi-spinner"></i>
                    </div>
                    
                    <p class="text-lg font-semibold">Em atendimento</p>
                    <p class="text-2xl font-bol mt-1">0</p>
                </div>
            </template>
        </Card>
        <Card
            class="flex flex-col items-center justify-center text-center py-3 shadow-md card-width"
        >
            <template #content>
                <div class="flex flex-col items-center">
                    <div class="text-green-600 text-4xl mb-2">
                        <i class="pi pi-check-circle"></i>
                    </div>
                    
                    <p class="text-lg font-semibold">Concluídos</p>
                    <p class="text-2xl font-bol mt-1">0</p>
                </div>
            </template>
        </Card>
    </div>
</template>

<script setup>
import Card from "primevue/card";
</script>

<style scoped>
.p-datatable .p-datatable-thead > tr > th {
    background-color: #f8fafc;
}
.card-width {
    width: 10vw;
}
</style>
