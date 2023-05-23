<div class="p-10">
    {{-- The whole world belongs to you. --}}
    
    <div class="mb-5">
        <h3 class="font-bold text-3xl text-gray-900 my-3">

            {{$vacante->titulo}}

        </h3>
        <div class="md:grid md:grid-cols-2 bg-gray-70 p-4 my-10" >
            <p class="font-bold text-sm uppercase text-gray-900 my-3" >Empresa:
                <span class="normal-case font-normal">{{$vacante->empresa}}</span>
            </p>
            <p class="font-bold text-sm uppercase text-gray-900 my-3" >ULTIMO DIA PARA POSTULARSE:
                <span class="normal-case font-normal">{{$vacante->ultimo_dia}}</span>
            </p>
            <p class="font-bold text-sm uppercase text-gray-900 my-3" >Categoria:
                <span class="normal-case font-normal">{{$vacante->categoria->categoria}}</span>
            </p>
            <p class="font-bold text-sm uppercase text-gray-900 my-3" >Salario:
                <span class="normal-case font-normal">{{$vacante->salario->salario}}</span>
            </p>
        </div>
      
       
    </div>

            <div class="md:grid md:grid-cols-6 gap-4" >
                    <div class="md:col-span-2">
                        <img src="{{asset('storage/vacantes/'. $vacante->imagen)}}" alt="{{'Imagen vacante'.$vacante->titulo}}">
                    </div>

                    <div class="md:col-span-4">
                       <h2 class="text-2xl font-bold mb-5">Descripcion del Puesto</h2>
                       <p>{{$vacante->descripcion}}</p>
                    </div>

            </div>
            @guest
                
            <div class="mt-5 bg-gray-200 border border-dashed p-5 text-center" >
                <p>
                    Deseas aplicar a esta Vacante? <a class="font-extrabold text-indigo-900" href="{{route('register')}}">Crea una Cuenta y postula a esta y otras vacantes </a>
                </p>
    
            </div>
          
            @endguest
            @cannot ('create',App\Models\Vacante::class)
            <livewire:postular-vacante :vacante="$vacante"/>
            @endcan
           
          
</div>
