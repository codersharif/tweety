<div class="flex">  
    <form method="POST" action="{{URL::to('tweets/'.$tweet->id.'/like')}}">
        @csrf
        <div class="flex items-center {{$tweet->isLikedBy(current_user()) ?'text-blue-500':'text-gray-500'}} mr-4">

            <button type="submit" class="mr-1">
                <i class="fas fa-thumbs-up"></i>  
            </button>
            <!--likes create culumn subquery check Likeable-->
            <span class="text-xs">
                {{$tweet->likes ?:0}}
            </span>
        </div>
    </form>
    <form method="POST" action="{{URL::to('tweets/'.$tweet->id.'/like')}}">
        @csrf
        @method('DELETE')
        <div class="flex items-center {{$tweet->isDisLikedBy(current_user()) ?'text-blue-500':'text-gray-500'}}">
            <button type="submit" class="mr-1">
                <i class="fas fa-thumbs-down"></i>
            </button>
            <span class="text-xs">
                <!--dislikes create culumn subquery check Likeable-->
                {{$tweet->dislikes ?:0}}
            </span>
        </div>
    </form>
</div>