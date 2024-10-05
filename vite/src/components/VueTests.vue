<script setup lang="ts">
import { ref } from 'vue'
const message = ref('Hello from Vue')
</script>

<template>
  <div class="tests">
    <p class="text">{{ message }}</p>
  </div>
</template>

<style lang="scss" scoped>
.tests {
  .text {
    color: rgb(0, 216, 151);
  }
}
</style>