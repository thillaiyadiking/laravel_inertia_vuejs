<template>

    <Head>
        <title>My App</title>
        <meta name="description" content="Information about my app" head-key="description">
    </Head>

    <section class="p-6 bg-gray-200">
        <header class="flex justify-between">
            <div>
                <h1 class="font-bold text-lg">My App</h1>
            </div>
            <p>
                Welcome {{ username }}
            </p>
            <Nav />
        </header>
    </section>

    <section class="p-6">
        <input type="text" value="hi how are you" class="bg-gray-300" name="" id="">
        <div class="max-w-3xl mx-auto">
            <slot />
        </div>
    </section>
</template>
<script>
import { Head } from '@inertiajs/vue3';
import Nav from './Nav.vue';

export default {
    components: { Nav, Head },
    computed: {
        username() {
            return this.$page.props.auth.user.username
        }
    }

}
</script>