@extends('welcome')
@section('pageTitle', 'Projets / View Access')
@section('content')


<div class=" flex items-center justify-center py-8 px-6 sm:px-6 lg:px-10">
      
    <div class="max-w-full w-full space-y-6">

      <div class="rounded-2xl  bg-white max-w-full  overflow-hidden shadow-xl p-8">
        
        <div class="space-y-4">         
            <div class="flex flex-wrap -mx-3 mb-6">
                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                    <label for="project_name" class="block font-medium text-lg text-gray-700 ">Link</label>
                    <div class="flex items-center  bg-gray-200 text-gray-700 border border-gray-200 rounded-md  px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500 py-2">
                        <input id="copy-input" value="{{$access->link}}"  readonly class="appearance-none bg-transparent border-none w-full text-gray-700 mr-3 px-2 leading-tight focus:outline-none " type="text" placeholder="Enter text...">
                        <input onclick="copyText()" value="Copy link" id="copy-button" class=" bg-teal-500 hover:bg-teal-700   text-sm  text-white py-2 px-4 rounded" type="button">
                      </div>                      
                </div>
                <div class="w-full md:w-1/2 px-3">
                    <label for="project_name" class="block font-medium text-lg text-gray-700">Password</label>
                  <input value="{{$password}}" readonly class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded-md py-4  px-4 leading-tight focus:outline-none    focus:border-gray-500" name="password"  type="text">
                </div>
              </div>
            <a href="{{route('projets.show',$projetId)}}" class="md:inline relative md:w-1/6 w-full  flex justify-center py-2 px-4   text-sm font-medium rounded-md text-black bg-white hover:bg-black hover:text-white  border-black border">
              Back
            </a>
            
          </div>
        </div>
    </div>
  </div>
  <script>
    function copyText() {
  // Get the input element
  var inputElement = document.getElementById("copy-input");
  var button_copy = document.getElementById("copy-button");

  // Select the text inside the input element
  inputElement.select();

  // Copy the selected text to the clipboard
  document.execCommand("copy");
  button_copy.style.background = "#009E60"; 
  button_copy.value = "Copied!";
    }
  </script>
@endsection