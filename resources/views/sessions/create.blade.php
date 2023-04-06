<x-layout>
    <section class="ppx-6 py-8 mt-10">
      <main class="max-w-lg mx-auto mt-10 bg-blue-50 border border-grey-200 p-6 rounded-xl">
        <h1 class="text-center font-bold  text-xl">log In</h1>

        <form method="POST" action="/login" class="mt-10">
            @csrf

        <div class="mb-6">
            <label class="block mb-2 uppercase font-bold text-xs text-grey-700" for="password">
                Email
            </label>

            <input class="border border-grey-400 p-2 w-full"
            type ="email"
            name="email"
            id="email"
            required >
            @if ($errors->has('email'))
    <span class="invalid-feedback">
        <strong>{{ $errors->first('email') }}</strong>
    </span>
@endif
        </div>

        <div class="mb-6">
            <label class="block mb-2 uppercase font-bold text-xs text-grey-700" for="password">
                Password
            </label>

            <input class="border border-grey-400 p-2 w-full"
            type ="password"
            name="password"
            id="password"
            required >

        </div>
        
        <div class="mb-6">
            <button type="submit"
            class="bg-blue-400 text-white rounded py-2  px-4 hover:bg--blue-500">
            Submit
            </button>
        </div>

        </form>
</main>
</section>
</x-layout>