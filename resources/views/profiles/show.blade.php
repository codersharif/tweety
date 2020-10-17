@component('components.app')
<header class="mb-6 relative">
    <img src="{{asset('public/img/banar.png')}}"
         alt="banar"
         class="mb-2"
         style="width: 100%;height: 250px;"
         />
    <div class="flex justify-between items-center mb-4">
        <div style="max-width: 270px">
            <h2 class="font-bold text-2xl mb-0">{{$user->name}}</h2>
            <p class="text-sm">Joined {{$user->created_at->diffForHumans()}}</p>
        </div>
        <div class="flex">
            <?php // @if(current_user()->is($user))?>
            @can('edit',$user)
            <a href="{{$user->path('edit')}}"
               class="rounded-full border border-gray-300 py-2 px-4 text-black text-sm mr-2">
                Edit Profile
            </a>
            @endcan
            @component('components.follow-button',['user' =>$user])
            @endcomponent
            
        </div>
    </div>

    <img src="{{$user->avatar}}" 
         style="width: 150px;height: 150px;left:40%;top: 41%;"
         alt="sharif"
         class="rounded-full mr-2 absolute"/>

    <p class="text-sm">Tailwind will swap these directives out at build time with all of its generated CSS.
        Tailwind will swap these directives out at build time with all of its generated CSS.
        Tailwind will swap these directives out at build time with all of its generated CSS.</p>
</header>

@include('_timelines',[
'tweets'=>$tweets])

@endcomponent
