<div class="border border-blue-400 rounded-lg px-8 py-6 mb-8">
    <form method="post" action="{{URL::to('/tweets')}}">
        @csrf
        <textarea
            name="body"
            class="w-full"
            placeholder="what's up doc?"
            required
            >                    
        </textarea>

        <hr class="my-4">

        <footer class="flex justify-between items-center">
            <img src="{{auth()->user()->avatar}}" 
                 style="width: 40px;height: 40px;"
                 alt="sharif"
                 class="rounded-full mr-2"/>
            <button type="submit" class="bg-blue-500 hover:bg-blue-600  rounded-lg shadow px-10 text-white text-sm h-10">Tweet-a-roo!</button>
        </footer>
    </form>
    @error('body')
    <span class="text-red-500 text-sm mt-2">{{$message}}</span>
    @enderror
</div>