<script setup lang="ts">
import { Form } from '@inertiajs/vue3';

interface Props {
  title: string
}

defineProps<Props>()
</script>

<template>
  <div class="w-full m-auto flex grow items-center justify-center bg-gray-100 px-4">
    <div class="w-full max-w-md bg-white shadow-md rounded-lg p-6">
      <h1 class="text-xl font-semibold mb-3 text-center">
        This content is password protected
      </h1>

      <p class="text-gray-600 text-center mb-6 leading-relaxed">
        To view <strong>{{ title }}</strong>, please enter the password below.
        If you don’t have the password, contact the site administrator.
      </p>

      <Form class="space-y-4" method="POST" #default="{ progress, errors }">
        <div>
          <label class="block text-sm font-medium mb-1">Password</label>
          <input
            type="password"
            name="password"
            class="w-full border rounded px-3 py-2 focus:ring focus:ring-blue-200"
            placeholder="Enter password to continue"
          />

          <div v-if="errors?.password" class="text-red-600 text-sm mt-1">
            {{ errors.password }}
          </div>
        </div>

        <button
          type="submit"
          :disabled="Boolean(progress)"
          class="w-full bg-blue-600 text-white py-2 rounded hover:bg-blue-700 disabled:opacity-50"
        >
          {{ progress ? 'Checking...' : 'Unlock Content' }}
        </button>
      </Form>

      <p class="text-xs text-gray-400 text-center mt-4">
        Your password will not be stored. It is used only to verify access.
      </p>
    </div>
  </div>
</template>
