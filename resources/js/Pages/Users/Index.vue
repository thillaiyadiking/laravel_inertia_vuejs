<template>

    <Head>
        <title>Users</title>
    </Head>

    <div class="flex justify-between">

        <h1 class="text-3xl">Users</h1>
        <Link href="/users/create" class="text-blue-500">New User</Link>
        <input type="text" v-model="search" placeholder="Search Here ..." class="border px-2 rounded-lg">
    </div>


    <div class="relative overflow-x-auto mt-8">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        id
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Name
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Action
                    </th>

                </tr>
            </thead>
            <tbody>
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700" v-for="user in users.data"
                    :key="user.id">

                    <td class="px-6 py-4">
                        {{ user.id }}
                    </td>
                    <td class="px-6 py-4">
                        {{ user.name }}
                    </td>
                    <td class="px-6 py-4">
                        <Link :href="'users/' + user.id + '/edit'" class="text-indigo-600 hover:text-indigo-950">
                        Edit
                        </Link>
                    </td>

                </tr>

            </tbody>
        </table>
    </div>

    <!-- Paginator -->
    <div class="mt-6">
        Paginator
        <!-- <template v-for="link in users.links">
            <Link v-if="link.url" :href="link.url" v-html="link.label">
            </Link>
            <span v-else v-html="link.label"></span>
        </template> -->
        <!-- <component class="px-1" :class="link.url ? '' : 'text-gray-500'" :is="link.url ? 'Link' : 'span'" v-for="link in users.links"
            :href="link.url" v-html="link.label">

        </component> -->
        <Pagination :links="users.links" />
    </div>
    <!-- <ul>
        <li v-for="user in users" :key="user.id" v-text="user.name"></li>
    </ul> -->
    <!-- <div style="margin-top:900px">
        <p> The Current Time is {{ time }}.</p>
        <Link href="/users" class="text-blue-500" preserve-scroll>
        Refresh
        </Link>
    </div> -->
</template>

<script setup>
import { ref, watch } from 'vue';
import Pagination from '../../Shared/Pagination.vue';
import { router } from '@inertiajs/vue3';
import { throttle } from 'lodash';
import { debounce } from 'lodash';

let props = defineProps({
    // time: String
    users: Object,
    filters: Object
})
// import Layout from '../Shared/Layout.vue';
// import NavLink from '../Shared/NavLink.vue';
// import { Head } from '@inertiajs/vue3';

let search = ref(props.filters.search)

watch(search, debounce(function (value) {
    // console.log("changes" + value);
    // Inertia.get('/users', { search: value })
    router.get('/users', { search: value }, { preserveState: true, replace: true })

}, 500))

// export default {
//     // layout: Layout,
//     // components: { NavLink, Head },
//     props: {
//         time: String
//     }
// };
// defineProps({
//     time: String
// })
</script>