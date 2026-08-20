<script setup lang="ts">
import { Link , Head } from '@inertiajs/vue3'
import Header from '../components/Layout/Header.vue';
import Footer from '../components/Layout/Footer.vue';

</script>

<template>
  <Head>
    <title>Zelo CMS - Laravel</title>
    <meta name="description" content="Your page description">
  </Head>
  <section class="min-h-screen flex flex-col items-stretch">
    <main class="order-1 grow flex flex-col">
      <slot />
    </main>
    <Header class="order-0" />
    <Footer class="order-5" />
  </section>
</template>
