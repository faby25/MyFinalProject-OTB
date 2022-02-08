<header class="max-w-xl mt-8 mx-auto text-center">
    <h1 class="text-4xl">BIENVENIDO A LA PAGINA DE <span class="text-blue-500">OTB-SUCA</span></h1>
    <div class="items-center inline-flex">
        <x-application-logo class="h-20 w-auto" id="otbsuca.jpg" />
    </div>
    <h2 class="inline-flex mt-3 uppercase">Sistema Administrativo para el control de pagos de agua de la OTB-SUCA</h2>
    <h1 class="text-1xl mt-3"><span class="text-blue-500">Posts realizadas por la Administracion de OTB-SUCA</span></h1>
    <div class="space-y-2 lg:space-y-0 lg:space-x-4 mt-3">
        <!--  Category -->
        <div class="relative lg:inline-flex bg-gray-100 rounded-xl">
            <x-posts.category-dropdown />
        </div>

        <!-- Users filter -->
        <div class="relative flex lg:inline-flex items-center bg-gray-100 rounded-xl">
            <x-posts.user-dropdown />
        </div>

        <!-- Search -->
        <div class="relative flex lg:inline-flex items-center bg-gray-100 rounded-xl px-3 py-2">
            <form method="GET" action="/">
                <input type="text" name="search"
                placeholder="Buscar"
                class="bg-transparent placeholder-black font-semibold text-sm"
                value="{{request('search')}}">
            </form>
        </div>
    </div>
</header>
