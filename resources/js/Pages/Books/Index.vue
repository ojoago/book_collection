<script setup>
    import SimpleLayout from '@/Layouts/SimpleLayout.vue';
    import { Head ,Link} from '@inertiajs/vue3';
    defineProps({
        books:[Array,Object]
    })
</script>
<template>
    <Head title="Book List" />

    <SimpleLayout>
        <div class="py-12 mx-auto">
            <div class="flex justify-between">
                <h3>Book Lists</h3>
                <Link :href="route('books.create')" class="bg-green-400 text-white px-4 py-2 rounded mr-2">Add Book</Link>
            </div>
           
            <div class="mt-2">
                <table class="w-full bg-white border border-gray-200 shadow">
                    <thead>
                        <th class="py-2 px-4 text-left border">S/N</th>
                        <th class="py-2 px-4 text-left border">Title</th>
                        <th class="py-2 px-4 text-left border">Auther</th>
                        <th class="py-2 px-4 text-left border">Year</th>
                        <th class="py-2 px-4 text-left border">Description</th>
                        <th class="py-2 px-4 text-left border">Status</th>
                        <th class="py-2 px-4 text-left border">Action</th>
                    </thead>
                    <tbody>
                        <tr v-for="(book,loop) in books.data" :key="loop">
                            <td class="py-2 px-4 border">{{ loop+1 }}</td>
                            <td class="py-2 px-4 border">{{ book?.title }}</td>
                            <td class="py-2 px-4 border">{{ book?.author }}</td>
                            <td class="py-2 px-4 border">{{ book?.year }}</td>
                            <td class="py-2 px-4 border">{{ book?.description }}</td>
                            <td class="py-2 px-4 border">{{ book?.status }}</td>
                            <td class="py-2 px-4 border">
                               <Link :href="route('books.show',book.id)" class="bg-blue-600 text-white px-2 py-2 rounded mr-2 inline-block">Detail</Link> 
                                <Link :href="route('books.edit',book.id)" class="bg-yellow-400 text-white px-2 py-2 rounded mr-2 inline-block">Edit</Link>
                                <Link :href="route('books.destroy',book.id)" class="bg-red-400 text-white px-2 py-2 rounded mr-2 inline-block">Delete</Link>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </SimpleLayout>
</template>

<style scoped>

</style>