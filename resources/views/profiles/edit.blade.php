@component('components.app')
<form method="POST" action="{{$user->path()}}" enctype="multipart/form-data">
    @csrf
    @method('PATCH')
    <div class="mb-6">
        <label class="block mb-2 uppercase font-bold text-sm text-grey-700">Name</label>
        <input type="text" name="name" id="name" value="{{$user->name}}" class="border border-gray-400 p-2 w-full" required/>
        @error('name')
        <p class="text-red-500 text-sm mt-2">{{$message}}</p>
        @enderror
    </div>

    <div class="mb-6">
        <label class="block mb-2 uppercase font-bold text-sm text-grey-700">User Name</label>
        <input type="text" name="username" id="username" value="{{$user->username}}" class="border border-gray-400 p-2 w-full" required/>
        @error('username')
        <p class="text-red-500 text-sm mt-2">{{$message}}</p>
        @enderror
    </div>
    <div class="mb-6">
        <label class="block mb-2 uppercase font-bold text-sm text-grey-700">avatar</label>
        <div class="flex">
        <input type="file" name="avatar" id="avatar" value="{{$user->avatar}}" class="border border-gray-400 p-2 w-full"/>
        <img src="{{$user->avatar}}" 
             style="width: 40px;height: 47px;"
             alt="sharif"
             />
        </div>
        @error('avatar')
        <p class="text-red-500 text-sm mt-2">{{$message}}</p>
        @enderror
    </div>
    <div class="mb-6">
        <label class="block mb-2 uppercase font-bold text-sm text-grey-700">Email</label>
        <input type="email" name="email" id="email" value="{{$user->email}}" class="border border-gray-400 p-2 w-full" required/>
        @error('email')
        <p class="text-red-500 text-sm mt-2">{{$message}}</p>
        @enderror
    </div>
    <div class="mb-6">
        <label class="block mb-2 uppercase font-bold text-sm text-grey-700">Password</label>
        <input type="password" name="password" id="password" class="border border-gray-400 p-2 w-full" required/>
        @error('password')
        <p class="text-red-500 text-sm mt-2">{{$message}}</p>
        @enderror
    </div>
    <div class="mb-6">
        <label class="block mb-2 uppercase font-bold text-sm text-grey-700">Confirm password</label>
        <input type="password" name="password_confirmation" id="password_confirmation" class="border border-gray-400 p-2 w-full" required/>
        @error('password_confirmation')
        <p class="text-red-500 text-sm mt-2">{{$message}}</p>
        @enderror
    </div>
    <div class="mb-6">
        <button type="submit" class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500">
            Submit
        </button>
        <a href="{{$user->path()}}" class="hover:underline">Cancel</a>
    </div>
</form>

@endcomponent