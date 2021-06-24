<x-app-layout>
<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Edit Task') }}
    </h2>
</x-slot>

<style>
    .form-group{
        padding-bottom:20px
    }
    label{
        padding-right:20px;
    }
    textarea{
        height:150px;
    }
    select{
        width:200px;
    }
</style>

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-5">
        
            <form method="POST" action="/task/{{ $task->id }}">

                <div class="form-group">
                    <textarea name="description" class="bg-gray-100 rounded border border-gray-400 leading-normal resize-none w-full h-20 py-2 px-3 font-medium placeholder-gray-700 focus:outline-none focus:bg-white">{{$task->description }}</textarea>	
                    @if ($errors->has('description'))
                        <span class="text-danger" style="color:red">{{ $errors->first('description') }}</span>
                    @endif
                </div>

                <div class="form-group">
                    <label for="date">Date:</label>
                    <input type="date" id="date" name="date" value="$task->date" class="bg-gray-100 rounded border border-gray-400 leading-normal h-10 py-1 px-2 font-medium placeholder-gray-700 focus:outline-none focus:bg-white">
                    @if ($errors->has('date'))
                        <span class="text-danger" style="color:red">{{ $errors->first('date') }}</span>
                    @endif
                </div>

                <div class="form-group">
                    <label for="status">Status</label>
                    <select id="status" name="status" class="bg-gray-100 rounded border border-gray-400 leading-normal h-10 py-1 px-2 font-medium placeholder-gray-700 focus:outline-none focus:bg-white">
                        <option value="To Do">To Do</option>
                        <option value="Completed">Completed</option>
                        <option value="Ongoing">Ongoing</option>
                        <option value="On Hold">On Hold</option>
                    </select>
                </div>

                <div class="form-group" style="text-align:center">
                    <button type="submit" name="update" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Update task</button>
                    <a href="{{route('list')}}">
                        <input type= "button" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded" value="Cancel">
                    </a>
                </div>

            {{ csrf_field() }}
            </form>
        </div>
    </div>
</div>
</x-app-layout>