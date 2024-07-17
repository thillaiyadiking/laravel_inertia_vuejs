<template>
    <nav>
        <ul class="flex list-disc space-x-8">
            <li>
                <!-- <Link href="/" class="text-blue-500 hover:underline"
                    :class="{ 'font-bold underline': $page.url == '/' }">
                Home</Link> -->
                <NavLink href="/" :active="$page.url == '/'">Home</NavLink>

            </li>
            <li>
                <!-- <Link href=" /users?name=fathil" class="text-blue-500 hover:underline"
                    :class="{ 'font-bold underline': $page.url.startsWith('/users') }">Users</Link> -->
                <NavLink href="/users?name=fathil" :active="$page.url.startsWith('/users')">Users</NavLink>
            </li>
            <li>
                <!-- <Link href="settings" class="text-blue-500 hover:underline"
                    :class="{ 'font-bold underline': $page.url == '/settings' }">Settings</Link> -->
                <NavLink href="/settings" :active="$page.url == '/settings'">settings</NavLink>
            </li>
            <li>
                <NavLink href="logout" method="post" :data="{ fff: 'bar' }" as="button"
                    class="text-blue-500 hover:underline" :class="{ 'font-bold underline': $page.url == '/logout' }">
                    Logout</NavLink>
            </li>
        </ul>
    </nav>
</template>

<script>
import NavLink from './NavLink.vue';

export default {
    components: { NavLink }
}
</script>