@extends('welcome')
@section('pageTitle', 'Projets / Edit Access')
@section('content')
@if ($errors->any())
    <div class=" bg-red-500 text-red-900 p-6">
        <ul class="ml-2">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<div class=" flex items-center justify-center py-8 px-6 sm:px-6 lg:px-10">
      
    <div class="max-w-full w-full space-y-6">

      <div class="rounded-2xl  bg-white max-w-full  overflow-hidden shadow-xl p-8">
        
        <form class="space-y-4" action="{{route('projets.accesses.update',[$projetId,$access->id])}}" method="POST">
            @csrf
            @method('patch')            
            <div class="flex flex-wrap -mx-3 mb-6">
                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                    <label for="project_name" class="block font-medium text-lg text-gray-700">Username</label>
                    <input name="username" value="{{$access->upperUsername}}" type="text"  readonly type="text" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded-md py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                </div>
                <div class="w-full md:w-1/2 px-3">
                    <label for="project_name" class="block font-medium text-lg text-gray-700">Password</label>
                  <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded-md py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" name="password"  type="password">
                </div>
              </div>
            <button type="submit" class="md:inline relative md:w-1/6 w-full  flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-orange-600 hover:bg-orange-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-orange-500">
              Create
            </button>
            <a href="{{route('projets.show',$projetId)}}" class="md:inline relative md:w-1/6 w-full  flex justify-center py-2 px-4 border border-black text-sm font-medium rounded-md text-black bg-white-600 hover:bg-black hover:text-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-black-500 mt-2">back</a>
          </div>
        </form>
    </div>
  </div>
@endsection