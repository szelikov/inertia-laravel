<script setup lang="ts">
import { computed } from 'vue';

interface Props {
  date: null | string | Date
}

const { date } = defineProps<Props>()

const dateFormatted = computed<string | null>(() => {
  if (!date) {
    return null
  }
  const dateTime = new Date(date)
  if (Number.isNaN(dateTime.getTime())) {
    return null
  }
  return dateTime.toDateString()
})
</script>

<template>
  <time v-if="dateFormatted">{{ dateFormatted }}</time>
</template>
