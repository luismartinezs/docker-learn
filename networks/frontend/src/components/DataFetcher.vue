<script setup lang="ts">
import { ref, onMounted } from 'vue';

interface ApiResponse {
  message: string;
  dbTime: string;
}

const apiData = ref<ApiResponse | null>(null);
const error = ref<string | null>(null);

const fetchData = async () => {
  try {
    const response = await fetch('http://localhost:3001/api');
    if (!response.ok) {
      throw new Error('Network response was not ok');
    }
    apiData.value = await response.json();
  } catch (err) {
    error.value = err instanceof Error ? err.message : 'An error occurred';
  }
};

onMounted(fetchData);
</script>

<template>
  <div>
    <h2>Data from Backend:</h2>
    <p v-if="apiData">{{ apiData.message }} {{ apiData.dbTime }}</p>
    <p v-else-if="error">Error: {{ error }}</p>
    <p v-else>Loading...</p>
  </div>
</template>
