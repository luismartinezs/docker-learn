<script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>
<div>
  <p>This is a Vue app embedded in a Yii project</p>
  <div id="app">{{ message }}</div>
</div>
<script>
  const { createApp, ref } = Vue

  createApp({
    setup() {
      const message = ref('Hello vue!')
      return {
        message
      }
    }
  }).mount('#app')
</script>
