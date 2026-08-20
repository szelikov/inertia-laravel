<script setup lang="ts">
interface Props {
  data?: any;
}

defineProps<Props>();
</script>

<template>
  <header class="border-b bg-white">
    <nav class="container mx-auto flex items-center justify-between py-4 sticky top-0">
      <a href="/" class="flex items-center gap-2">
        <!-- <img src="/img/logo.svg" alt="Logo" class="logo h-8"> -->
        <span class="font-semibold text-lg">SiteName</span>
      </a>
      
      <ul class="flex gap-6">
        <li><a href="/about" class="hover:text-blue-600">About</a></li>
        <li><a href="/blog" class="hover:text-blue-600">Blog</a></li>
        <li><a href="/contact" class="hover:text-blue-600">Contact</a></li>
      </ul>
    </nav>
  </header>
</template>
