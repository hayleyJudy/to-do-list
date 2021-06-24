<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <style>
        .grid-container{
            display:grid;
            grid-template-columns: 5fr 5fr; 
            grid-gap: 20px;
        }
        .icon{
            float:right;
            filter: grayscale(100%);
        }
        .icon:hover{
            opacity:50%;
        }
        .form-group{
            border-bottom:1px solid grey;
            padding:10px;
        }
        input[type=checkbox]:checked + label.strikethrough{
            text-decoration: line-through;
        }
    </style>

    <div class="grid-container p-12">
        <div class="grid-item max-w-7x1  sm:px-6 lg:px-8 bg-white shadow-xl sm:rounded-lg p-5">
            <div class="flex">
                <div class="flex-auto text-2xl mb-4">Today's Tasks</div>
                
                <div class="flex-auto text-right mb-4">
                    <a href="/task">
                        <img src="images/list.png" class="icon w-10 h-10">
                    </a>
                </div>
            </div>
            @foreach(auth()->user()->tasks as $task)
                @if(Carbon\Carbon::parse($task->date)->format('Y-m-d') == Carbon\Carbon::today()->format('Y-m-d') )
                    <div class="form-group">
                        {{$task->description}}
                    </div>
                @endif
                      
            @endforeach
            
        </div>
        <div class="grid-item max-w-7x1 sm:px-6 lg:px-8 bg-white shadow-xl sm:rounded-lg p-5">
            <div class="flex">
                <div class="flex-auto text-2xl mb-4">Calendar</div>
                
                <div class="flex-auto text-right mb-4">
                    <a href="/task">
                        <img src="images/663353.png" class="icon w-10 h-10">
                    </a>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>