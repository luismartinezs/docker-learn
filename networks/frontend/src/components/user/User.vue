<script setup lang="ts">
import { defineProps } from 'vue';
import { User } from './types';
const props = defineProps<{
  user: User
}>();
</script>

<template>
  <div class="user-card">
    <p>Email: {{ user.email }}</p>
    <p>ID: {{ user.id }}</p>
    <RouterLink :to="`/user/${user.id}`">Edit</RouterLink>
  </div>
</template>

<style scoped>
.user-card {
  border: 1px solid #444;
  border-radius: 8px;
  padding: 16px;
  margin-bottom: 16px;
  background-color: #222;
}

h3 {
  margin-top: 0;
  color: #e0e0e0;
}

p {
  margin: 8px 0;
  color: #b0b0b0;
}
</style>
