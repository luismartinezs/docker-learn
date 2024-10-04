<script setup lang="ts">
import { ref, onMounted } from 'vue';
import User from './user/User.vue';
import { User as UserType } from './user/types';

type ApiResponse = Array<UserType>

const users = ref<ApiResponse | null>(null);
const error = ref<string | null>(null);

const fetchUsers = async () => {
  try {
    const response = await fetch('http://localhost:3001/api/users');
    if (!response.ok) {
      throw new Error('Network response was not ok');
    }
    users.value = await response.json();
  } catch (err) {
    error.value = err instanceof Error ? err.message : 'An error occurred';
  }
};

onMounted(fetchUsers);
</script>

<template>
  <div>
    <h2>Users:</h2>
    <p v-if="users">
      <User v-for="user in users" :key="user.id" :user="user" />
    </p>
    <p v-else-if="error">Error: {{ error }}</p>
    <p v-else>Loading...</p>
  </div>
</template>