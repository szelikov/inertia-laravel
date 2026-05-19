<script setup lang="ts">
import { Head } from '@inertiajs/vue3'

interface Props {
  page: Page
}

const props = defineProps<Props>()
const meta = props.page.metaData
</script>

<template>
  <Head>
    <title>{{ meta.title || page.title }}</title>
    <meta name="description" :content="meta.description || page.title" />
    <meta name="keywords" v-if="meta.keywords" :content="meta.keywords" />
    <meta name="robots" v-if="meta.robots" :content="meta.robots" />
    <link rel="canonical" :href="meta.canonical || page.url" />

    <meta property="og:title" :content="meta.title || page.title" />
    <meta property="og:description" :content="meta.description || page.title" />
    <meta property="og:type" content="article" />
    <meta property="og:url" :content="meta.canonical || page.url" />
    <meta property="og:image" v-if="meta.image" :content="meta.image" />
  </Head>

  <h1>{{ page.title }}</h1>
  <div v-if="page.content" v-html="page.content" />
  <pre>{{ page }}</pre>
</template>