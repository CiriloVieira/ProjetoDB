<template>
    <app-layout>
        <div>teste</div>
        <table class="rounded-t-lg m-5 w-5/6 mx-auto bg-gray-200 text-gray-800">
            <tr class="text-left border-b-2 border-gray-300">
                <th class="px-4 py-3">Firstname</th>
                <th class="px-4 py-3">Lastname</th>
                <th class="px-4 py-3">Age</th>
                <th class="px-4 py-3">Sex</th>
            </tr>

            <tr class="bg-gray-100 border-b border-gray-200">
                <td class="px-4 py-3">Jill</td>
                <td class="px-4 py-3">Smith</td>
                <td class="px-4 py-3">50</td>
                <td class="px-4 py-3">Male</td>
            </tr>

        </table>



    </app-layout>
</template>

<script>
import AppLayout from '@/Layouts/AppLayout'

export default {
    name: "Database",
    components: {
        AppLayout
    }


}
</script>

<style scoped>

</style>
