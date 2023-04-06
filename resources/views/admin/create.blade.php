<x-layout>
    <section class="px-6 py-8">
        <x-panel class="max-w-sm mx-auto">
        <form method ="POST" action="/admin">
            @csrf

            <div class="mb-6">
            <label class="block mb-2 uppercase font-bold text-xs text-grey-700" for="title">
                Title
            </label>

            <input class="border border-grey-400 p-2 w-full"
            type ="text"
            name="title"
            id="title"
            value ="{{old('title')}}"
            required >

        </div>

        <div class="mb-6">
            <label class="block mb-2 uppercase font-bold text-xs text-grey-700" for="slug">
                Slug
            </label>

            <input class="border border-grey-400 p-2 w-full"
            type ="text"
            name="slug"
            id="slug"
            required >

        </div>



        <div class="mb-6">
            <label class="block mb-2 uppercase font-bold text-xs text-grey-700" for="excerpt">
                Excerpt
            </label>

            <input class="border border-grey-400 p-2 w-full"
            type ="text"
            name="excerpt"
            id="excerpt"
            required >
        </div>
        <div class="mb-6">
            <label class="block mb-2 uppercase font-bold text-xs text-grey-700" for="body">
                Body
            </label>

            <input class="border border-grey-400 p-2 w-full"
            type ="text"
            name="body"
            id="body"
            required >
        </div>

        <div class="mb-6">
            <label class="block mb-2 uppercase font-bold text-xs text-grey-700" for="category_id">
                Category
            </label>

            <select name="category_id" id="category">
            
                @foreach (\App\Models\Category::all() as $category)
                    <option  value ="{{$category->id }}">{{ucwords($category->name)}}</option>
                    @endforeach

            </select>
        </div>

        <div class="mb-6">
            <button type="submit"
            class="bg-blue-400 text-white rounded py-2  px-4 hover:bg--blue-500">
            Publish
            </button>
        </div>
        </form>
        </x-panel>

    </section>
</x-layout>