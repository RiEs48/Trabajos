
<div>


      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">


         @forelse ($vacantes as $vacante )
            
         

         <div class="p-6 text-gray-900 md:flex md:justify-between md:items-center">
               <div class="leading-10">
                  <a href="{{   route('vacantes.show', $vacante->id)  }}" class="text-xl font-bold">
                     {{$vacante->titulo}}
                  </a>
                  <p class="text-sm text-gray-800 font-bold">
                     {{$vacante->empresa}} 
                  </p>
                  <p class="text-sm text-orange-600 font-bold">
                     Ultimo Dia de Postulacion  : {{$vacante->ultimo_dia}} 
                  </p>

               </div>

               <div class="flex flex-col md:flex-row items-stretch gap-3  mt-5 md:mt-0">

                  <a href="{{route('candidatos.index',$vacante)}}" class="bg-slate-800 py-2 px-4 rounded-lg text-white text-xs font-bold uppercase text-center">
                   {{$vacante->candidatos->count()}}  Candidatos 
                  </a>
                  <a href="{{route('vacantes.edit', $vacante->id )}}" class="bg-blue-800 py-2 px-4 rounded-lg text-white text-xs font-bold uppercase text-center">
                     Editar 
                  </a>
                  <button
                   wire:click="$emit('mostrarAlerta',{{$vacante->id}})"
                   class="bg-red-800 py-2 px-4 rounded-lg text-white text-xs font-bold uppercase text-center">
                     Eliminar 
                  </button>
               

               </div>
         </div>
         
      @empty
            <p class="p-3 text-center text-sm" >No hay vacantes que mostrar</p>

      @endforelse

      </div>

      <div class=" mt-10">

         {{ $vacantes ->links()}}
      </div>

   </div>
   @push('scripts')
   <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
   <script>
      Livewire.on('mostrarAlerta',vacanteId=>{
         Swal.fire({
         title: 'Estas seguro que quieres eliminar una vacante?',
         text: "Una vez eliminada no se podra Recuperar",
         icon: 'warning',
         showCancelButton: true,
         confirmButtonColor: '#3085d6',
         cancelButtonColor: '#d33',
         confirmButtonText: 'Si !Eliminar!',
         cancelButtonText: 'Cancelar',
         }).then((result) => {
         if (result.isConfirmed) {
               Livewire.emit('eliminarVacante', vacanteId)


            Swal.fire(
               'Se Elimino!',
               'Tu Vacante ah sido Eliminada.',
               'success'
            )
         }
         })
         
      })
     
   </script>
   @endpush