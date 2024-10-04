<script setup lang="ts">
import { ref, defineProps } from 'vue';
import { User } from './types';

const props = defineProps<{
  user: User
}>();

const name = ref(props.user.name);
const email = ref(props.user.email);

const handleSubmit = async () => {
  try {
    const response = await fetch(`http://localhost:3001/api/users/${props.user.id}`, {
      method: 'PUT',
      headers: {
        'Content-Type': 'application/json',
      },
      body: JSON.stringify({
        name: name.value,
        email: email.value
      }),
    });

    if (!response.ok) {
      throw new Error('Failed to update user');
    }

    const updatedUser = await response.json();
    console.log('User updated successfully:', updatedUser);
  } catch (error) {
    console.error('Error updating user:', error);
  }
};
</script>

<template>
  <form @submit.prevent="handleSubmit" class="user-edit-form">
    <div class="form-group">
      <label for="name">Name:</label>
      <input id="name" v-model="name" type="text" required>
    </div>
    <div class="form-group">
      <label for="email">Email:</label>
      <input id="email" v-model="email" type="email" required>
    </div>
    <button type="submit">Update User</button>
  </form>
</template>

<style scoped>
.user-edit-form {
  max-width: 300px;
  margin: 0 auto;
}

.form-group {
  margin-bottom: 15px;
}

label {
  display: block;
  margin-bottom: 5px;
  color: #e0e0e0;
}

input {
  width: 100%;
  padding: 8px;
  border: 1px solid #444;
  border-radius: 4px;
  background-color: #333;
  color: #e0e0e0;
}

button {
  width: 100%;
  padding: 10px;
  background-color: #4CAF50;
  color: white;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

button:hover {
  background-color: #45a049;
}
</style>
