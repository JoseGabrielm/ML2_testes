<div class="m-5" style="text-align: center">
    
     <!-- Cabeçalho da pagina - que vai para layouts/app.blade na tag  $header  -->
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('contador') }}
        </h2>
    </x-slot>

    <div>
        <button type="button" wire:click="increment" class="btn btn-secondary"> + </button>
        <h1 class="m-3">{{ $count }}</h1>
        <button type="button" wire:click="decrement" class="btn btn-secondary"> - </button>
    </div>
    
    <div class="row justify-content-center m-5" >
        <input wire:model="count" type="text"  class=" text-center h1 border border-warning " style="width: 8rem;">
    </div>
    
</div>
        
    
    
    

</div>
