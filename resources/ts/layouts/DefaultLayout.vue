<script setup lang="ts">
import { Link , Head } from '@inertiajs/vue3'

</script>

<template>
    <Head>
        <title>Zelo CMS - Laravel</title>
        <meta name="description" content="Your page description">
    </Head>
    <main>
        <article>
            <slot />
        </article>
        <header>
            <Link href="/">Home</Link>
            <Link href="/about">About</Link>
            <Link href="/contact">Contact</Link>
        </header>
        <footer>
            Footer
        </footer>
    </main>
</template>
