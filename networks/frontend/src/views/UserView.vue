<script setup lang="ts">
import { ref, onMounted } from 'vue';
import { useRoute } from 'vue-router';
import UserEdit from '../components/user/UserEdit.vue';
import { User } from '../components/user/types';

const route = useRoute();
const user = ref<User | null>(null);

const fetchUsers = async () => {
  try {
    const response = await fetch('http://localhost:3001/api/users');
    if (!response.ok) {
      throw new Error('Failed to fetch users');
    }
    const users: User[] = await response.json();
    const filteredUser = users.find(u => u.id === Number(route.params.id));
    if (filteredUser) {
      user.value = filteredUser;
    } else {
      console.error('User not found');
    }
  } catch (error) {
    console.error('Error fetching users:', error);
  }
};

onMounted(fetchUsers);
</script>

<template>
  <div>
    <h1>User {{ $route.params.id }}</h1>
    <UserEdit v-if="user" :user="user" />
    <p v-else>Loading user...</p>
  </div>
</template>
