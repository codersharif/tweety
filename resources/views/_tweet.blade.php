<div class="flex p-4 border-b border-b-gray-400">
    <div class="mr-2 flex-shrink-0">
        <a href="{{$tweet->user->path()}}">
            <img src="{{$tweet->user->avatar}}" 
                 style="width: 50px;height: 50px;"
                 alt="sharif"
                 class="rounded-full mr-2"/>
        </a>
    </div>
    <div>
        <h5 class="font-bold mb-4">
            <a href="{{$tweet->user->path()}}">
                {{$tweet->user->name}}
            </a>
        </h5>
        <p class="text-sm mb-3">
            {{$tweet->body}}
        </p>
        
        @component('components.like-buttons',compact('tweet')) @endcomponent
  
    </div>
</div>