<script setup>
    import SimpleLayout from '@/Layouts/SimpleLayout.vue';
    import { Head ,Link,useForm} from '@inertiajs/vue3';
        import InputError from '@/Components/InputError.vue';
    import InputLabel from '@/Components/InputLabel.vue';
    import TextInput from '@/Components/TextInput.vue';
    import BaseSelect from '@/Components/BaseSelect.vue';


    const bookForm = useForm({
        'title' : '' ,
        'author' : '' ,
        'published_year' : '' ,
        'description' : '' ,
        'status' : ''
    })

    const status = [
        {"id":  "available", "text": "available"},
        {"id":  "borrowed", "text": "borrowed"},
        {"id":  "reserved", "text": "reserved"},
    ]

    
    const addBook = () => {
        const response = bookForm.post(route('books.store'));
        if(response){
            bookForm.reset()
        }
    }

</script>
<template>
    <Head title="Create Book" />

    <SimpleLayout>
         <div class="mt-4 mx-4">
            <div class="flex justify-between">
                <h3>Create Book</h3>
                <Link :href="route('books.index')" class="bg-red-400 text-white px-4 py-2 rounded mr-2">Book List</Link>
            </div>

            <form @submit.prevent="addBook()">

                <div class="grid grid-cols-1 gap-4 md:grid-cols-2">

                     <div>
                        <InputLabel for="text" value="Title" />

                        <TextInput
                            id="text"
                            type="text"
                            class="mt-1 block w-full"
                            v-model="bookForm.title"
                            placeholder="e.g Eloquent ORM"
                            autocomplete="off"
                        />

                        <InputError class="mt-2" :message="bookForm.errors.title" />
                    </div>

                     <div>
                        <InputLabel for="text" value="Author" />

                        <TextInput
                            id="text"
                            type="text"
                            class="mt-1 block w-full"
                            v-model="bookForm.author"
                            placeholder="e.g Muhammed Said"
                            autocomplete="off"
                        />

                        <InputError class="mt-2" :message="bookForm.errors.author" />
                    </div>
                    
                     <div>
                        <InputLabel for="text" value="Published Year" />

                        <TextInput
                           
                            type="date" id="year" name="year" min="1900" max="2100" placeholder="YYYY"
                            class="mt-1 block w-full"
                            v-model="bookForm.published_year"
                            autocomplete="off"
                        />

                        <InputError class="mt-2" :message="bookForm.errors.published_year" />
                    </div>
                    <div>
                        <BaseSelect v-model="bookForm.status" label="Status" :selected="bookForm.status"
                                                :options="status"/>

                        <InputError class="mt-2" :message="bookForm.errors.published_year" />
                    </div>
                </div>
                <div class="grid grid-cols-1 ">
                     <div>
                        <InputLabel for="text" value="Description" />

                        <textarea
                           
                            
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                            v-model="bookForm.description"
                            autocomplete="off"
                        ></textarea>

                        <InputError class="mt-2" :message="bookForm.errors.description" />
                    </div>
                </div>
                <button :href="route('books.create')" :disabled="bookForm.processing"  class="bg-green-400 text-white px-4 py-2 rounded mr-2 mt-3">
                    <span v-if="bookForm.processing">Submitting...</span>
                    <span v-else>Submit</span>
                </button>

                
            </form>
         </div>
    </SimpleLayout>
</template>

<style scoped>

</style>