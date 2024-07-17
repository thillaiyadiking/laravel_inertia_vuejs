<template>
    <div>
        <component class="px-1" :class="{ 'text-gray-500': !link.url, 'text-blue-500': link.active }"
            :is="link.url ? 'Link' : 'span'" v-for="link in links" :href="link.url" v-html="link.label">

        </component>
    </div>
</template>
<script>
export default {
    props: {
        links: Array
    }
}
</script>