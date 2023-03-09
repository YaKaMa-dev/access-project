@extends('welcome')
@section('pageTitle', 'Projets / Accesses')
@section('content')

@if (session('succes'))
<div class="bg-green-500 text-green-900 p-6">
   <ul class="ml-2">{{ session('succes') }}</ul>
</div>
@endif
  
<div class="flex flex-col overflow-auto  max-h-96">
    <div class="text-center">
        
    </div>
    <a href="{{route('projets.accesses.create',$projet->id)}}" class="hover:bg-orange-800 p-2 bg-orange-600  mt-6 text-white w-16 font-bold">+ <span>Add</span></a>
      <div class="overflow-x-auto">
        <div class="py-4 inline-block min-w-full sm:px-6 lg:px-8">
          <div class="overflow-hidden">
            <table class="min-w-full text-center">
              <thead class="border-b bg-gray-800">
                <tr>
                  <th scope="col" class="text-sm font-medium text-white px-6 py-4">
                    #
                  </th>
                  <th scope="col" class="text-sm font-medium text-white px-6 py-4">
                    Username
                  </th>
                  <th scope="col" class="text-sm font-medium text-white px-6 py-4">
                    Actions
                  </th>
                </tr>
              </thead class="border-b">
              <tbody>
                @foreach ($accesses as $access)
                <tr class="bg-white border-b">
                    
                        
                  <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{$access->id}}</td>
                  <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                    {{$access->upperUsername}}
                  </td>
                  <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                    <form action="{{route('projets.accesses.destroy',[$projet->id,$access->id])}}" method="POST">
                      @csrf
                      @method('DELETE')
                      <a href="{{route('projets.accesses.edit',[$projet->id,$access->id])}}" title="Edit Project" class="p-2 text-lg hover:text-green-600"><i class="fa fa-pencil" aria-hidden="true"></i></a> 
                    <button type="submit" title="Delete Project" onclick="return confirm('are you sure?')" class="p-2 text-lg hover:text-red-600"><i class="fa fa-trash" aria-hidden="true"></i></button> 
                    <a href="{{route('projets.accesses.show',[$projet->id,$access->id])}}" title="Show Project" class="p-2 text-lg hover:text-orange-600"><i class="fa fa-eye" aria-hidden="true"></i></a> 
                    </form>
                  </td>
                </tr class="bg-white border-b">
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
    <div class=" mx-20 mt-4 ">
      {{ $accesses->links() }}
  </div>
@endsection