<template>
    <Link class="text-blue-500 hover:underline" :class="{ 'font-bold underline': active }">
    <slot />
    </Link>
</template>

<script setup>
import { Link } from '@inertiajs/vue3';
defineProps({
    active: Boolean
})

// export default {
//     // components: { Link },
//     props: {
//         active: Boolean
//     }
// }
</script>