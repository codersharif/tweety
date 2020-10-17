<ul>
    <li>
        <a href="{{ route('home') }}" class="font-bold text-lg mb-4 block"
           >Home</a>
    </li>
    <li>
        <a href="{{URL::to('explore')}}" class="font-bold text-lg mb-4 block"
           >Explore</a>
    </li>
  
    <li>
        <a href="{{ route('profile',auth()->user()) }}"
           class="font-bold text-lg mb-4 block"
           >Profile</a>
    </li>
    <li>
        <form method="post" action="{{ route('logout') }}">
            @csrf
            <button class="font-bold text-lg mb-4 block" type="submit">Logout</button>
        </form>
    </li>
</ul>