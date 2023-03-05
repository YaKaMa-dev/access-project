<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    @vite('resources/css/app.css')
    <link href="./designweb/design.css" rel="stylesheet">
    <title>Document</title>
</head>
<body class="bg-slate-200">
    
    <aside class="  bg-slate-800 p-2 lg:w-1/5  lg:float-left lg:h-full  ">
        <nav class="text-white">
            <ul>
                <li><h1 class="  text-teal-500  p-2 font-bold text-2xl pt-4 mb-2 pb-8">LOGO</h1></li>
                <li class="p-4 hover:text-orange-600 font-semibold lg:block md:inline"><a class="text-xl pr-12" href="#"><i class="fa fa-fw fa-home" aria-hidden="true"></i><span>Home</span></a></li>
                <li class="p-4 hover:text-orange-600 font-semibold lg:block md:inline"><a class="text-xl pr-12" href="{{route('projets.index')}}" class=""><i class="fa fa-industry" aria-hidden="true"></i> <span>Project</span></a></li>
                <li class="p-4 hover:text-orange-600 font-semibold lg:block md:inline"><a class="text-xl pr-12" href="{{route('profile.show')}}" class=""><i class="fa fa-fw fa-user" aria-hidden="true"></i><span>Profile</span></a></li>
                           
            </ul>
        </nav>
    </aside>
    
    <main class=" h-full w-full">
        <div class="  p-4  text-teal-800  lg:ml-20 bg-white ">
          <h2 class="text-left p-4 lg:pl-56  text-3xl   font-extrabold ">
            <i class="fa fa-fw fa-industry" aria-hidden="true"></i> @yield('pageTitle')
          </h2>
        </div>
        @yield('content')
        @show
   </main>

   <footer>

   </footer>

</body>
</html>