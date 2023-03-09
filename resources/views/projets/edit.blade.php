@extends('welcome')
@section('pageTitle', 'Edit Projets')
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
        
        <form class="space-y-4" action="{{route('projets.update',$projet->id)}}" method="POST">
            @csrf   
            @method('put')         
          <input type="hidden" name="remember" value="True">
          <div class="rounded-md shadow-sm -space-y-px">
            <div class="grid gap-6">
              <div class="col-span-12">
                <label for="project_name" class="block font-medium text-lg text-gray-700">Libele</label>
                <input type="text" name="project_name" value="{{$projet->upperLibele}}" id="project_name" autocomplete="given-name" class="mt-1 p-2  block  w-full shadow-sm sm:text-sm bg-gray-200 text-gray-700 border border-gray-200 focus:bg-white focus:border-gray-500 rounded-md"  value="{{old('libele_projet')}}">
              </div>
            </div>
          </div>

          <div>
            <button type="submit" class="md:inline relative md:w-1/6 w-full  flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-orange-600 hover:bg-orange-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-orange-500">
              Update
            </button>
            <a href="{{route('projets.index')}}" class="md:inline relative md:w-1/6 w-full  flex justify-center py-2 px-4 border border-black text-sm font-medium rounded-md text-black bg-white-600 hover:bg-black hover:text-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-black-500 mt-2">back</a>
          </div>
        </form>
    </div>
  </div>
@endsection