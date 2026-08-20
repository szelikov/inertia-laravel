<script setup lang="ts">
interface Props {
  data?: any;
}

defineProps<Props>();
</script>

<template>
  <footer class="border-t bg-white py-6 mt-10">
    <div class="container mx-auto text-center text-sm text-gray-500">
      © {{ new Date().getFullYear() }} SiteName. All rights reserved.
    </div>
  </footer>
</template>
