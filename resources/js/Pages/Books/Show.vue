<script setup>
    import SimpleLayout from '@/Layouts/SimpleLayout.vue';
    import { Head ,Link} from '@inertiajs/vue3';

    defineProps({
        book:[Array,Object]
    })



</script>
<template>
    <Head title=" Book Details" />

    <SimpleLayout>
         <div class="mt-4 mx-4">
            <div class="flex justify-between mb-4">
                <h1 class="font-extrabold text-3xl"> Book Detail</h1>
                <div class="gap-2 inline-block">
                    <Link :href="route('books.index')" class="bg-red-400 text-white px-4 py-2 rounded mr-2">Back</Link>
                    <Link :href="route('books.edit',book.id)" class="bg-yellow-400 text-white px-4 py-2 rounded mr-2">Edit</Link>
                    <Link :href="route('books.create')" class="bg-green-400 text-white px-4 py-2 rounded mr-2">Add New</Link>
                </div>
            </div>

                <div class="grid grid-cols-1 ">
                    <hr>

                     <div>
                        <h1 class="text-2xl font-semibold">Title: {{ book.title }}</h1>
                    </div>

                     <div>

                        <p class="text-lg text-gray-600 font-semibold">Auther: {{ book.author }}</p>

                    </div>
                    
                     <div>
                       
                        <p class="text-lg text-gray-500 font-semibold">

                          Published Year:  {{ book.year }}
                        </p>
                    </div>

                     <div>
                       
                        <p class="text-xl text-green-300 font-semibold">
                           Status:  {{ book.status }}
                        </p>
                    </div>
                     
                </div>
                <div class="grid grid-cols-1 ">
                     <div>
                        <p class="text-sm font-semibold">
                          Description:  {{ book.description }}
                        </p>
                    </div>

                    <div>
                       
                        <p class="text-xl text-dark font-bold">
                           Date Created:  {{ book.created_at }}
                        </p>
                    </div>
                </div>
                

                
         </div>
    </SimpleLayout>
</template>

<style scoped>

</style>