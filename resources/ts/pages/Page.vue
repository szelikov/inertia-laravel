<script setup lang="ts">
import { Head } from '@inertiajs/vue3'
import DateTime from '../components/DateTime.vue';

interface Props {
  page: Page
}

defineProps<Props>()
</script>

<template>
  <Head>
    <title>{{ page.title }}</title>
    <!-- <meta name="description" :content="meta.description || page.title" /> -->
    <!-- <meta name="keywords" v-if="meta.keywords" :content="meta.keywords" /> -->
    <!-- <meta name="robots" v-if="meta.robots" :content="meta.robots" /> -->
    <!-- <link rel="canonical" :href="meta.canonical || page.url" /> -->

    <!-- <meta property="og:title" :content="meta.title || page.title" /> -->
    <!-- <meta property="og:description" :content="meta.description || page.title" /> -->
    <!-- <meta property="og:type" content="article" /> -->
    <!-- <meta property="og:url" :content="meta.canonical || page.url" /> -->
    <!-- <meta property="og:image" v-if="meta.image" :content="meta.image" /> -->
  </Head>

  <header class="container mx-auto">
    <h1 class="text-xl font-semibold mb-4 text-center">{{ page.title }}</h1>
    <DateTime :date="page.publishedAt" />
  </header>
  <div class="container mx-auto" v-if="page.content" >
    <div class="content" v-if="page.content" v-html="page.content" />
    <pre class="bg-black text-gray-600">{{ page }}</pre>
  </div>
</template>
