<div class="bg-gray-100 p-5 mt-10 flex flex-col justify-center items-center">
    {{-- To attain knowledge, add things every day; To attain wisdom, subtract things every day. --}}
    
  <h3 class=" text-center text-2xl font-bold my-4">Postular a este Empleo</h3>
 
        
 
      
 
  @if (session()->has('mensaje'))
    
    <p class="uppercase border border-green-400 bg-green-100 text-green-950 p-2 my-5 rounded-lg">
        {{session('mensaje')}}
    </p>
    @else
        <form class="w-96 mt-5" wire:submit.prevent='postularme'>
            <div>
                <x-input-label  for="cv" :value="__('Curriculum o Hoja de Vida Formato (PDF)')" />
                <x-text-input  id="cv" type="file" wire:model="cv" accept=".pdf" class="block mt-1 w-full" />           

            </div>

            <x-input-error :messages="$errors->get('cv')" class="mt-2" />


            <x-primary-button class="w-full bg-lime-500 justify-center mt-5">
                {{ __('Postular Empleo') }}
            </x-primary-button>

        </form>
      
      
  @endif



</div>
