<x-app-layout>
<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Send Email') }}
    </h2>
</x-slot>

<script>
    var msg = '{{Session::get('alert')}}';
    var exist = '{{Session::has('alert')}}';
    if(exist){
      alert(msg);
    }
</script>

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
</style>




<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-5">
            
            <form>
                <div class="form-group">
                    <label for="to">To:</label>
                    <input type="text" name="to" class="bg-gray-100 rounded border border-gray-400 leading-normal resize-none h-10 py-2 px-3 font-medium placeholder-gray-700 focus:outline-none focus:bg-white">
                    @if ($errors->has('to'))
                        <span class="text-danger" style="color:red">{{ $errors->first('to') }}</span>
                    @endif
                </div>

                <div class="form-group">
                    <label for="subject">Subject:</label>
                    <input type="text" name="subject" class="bg-gray-100 rounded border border-gray-400 leading-normal resize-none w-64 h-10 py-2 px-3 font-medium placeholder-gray-700 focus:outline-none focus:bg-white">
                    @if ($errors->has('subject'))
                        <span class="text-danger" style="color:red">{{ $errors->first('subject') }}</span>
                    @endif
                </div>

                <div class="form-group">
                    <label for="text">Text Message:</label><br>

                    <script>
                        function updateTextArea() {     
                            var allVals = [];
                            $('.statusBox :checked').each(function(i) {
                                    
                                allVals.push((i!=0?"\r\n":"")+ $(this).val());
                            });
                            $('#textarea').val(allVals).attr('rows',allVals.length) ;
                                
                            }
                            $(function() {
                                $('.statusBox input').click(updateTextArea);
                                updateTextArea();
                            });
                    </script>
                    
                    <div class="statusBox">
                    <label><input type="checkbox" id="to do" name="to do" value="To Do">To Do</label>
                    <input type="checkbox" id="completed" name="completed" value="Completed">
                    <label for="completed">Completed</label>
                    <input type="checkbox" id="On Hold" name="On Hold" value="On Hold">
                    <label for="On Hold">On Hold</label>
                    <input type="checkbox" id="Ongoing" name="Ongoing" value="Ongoing">
                    <label for="Ongoing">On Hold</label>
                    </div>
                    
                    <!-- <button value="" class="bg-green-500 hover:bg-green-700 text-white font-bold py-1 px-2 rounded">Add to Text Message</button> -->
                    
                    <textarea name="textarea" id="textarea" class="bg-gray-100 rounded border border-gray-400 leading-normal w-full py-2 px-3 font-medium placeholder-gray-700 focus:outline-none focus:bg-white"  placeholder='Enter your task'></textarea>  
                    @if ($errors->has('text'))
                        <span class="text-danger" style="color:red">{{ $errors->first('text') }}</span>
                    @endif
                </div>

                
                
                <div class="form-group" style="text-align:center">
                    <button type="submit" formmethod="post" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Send Email</button>
                    <a href="{{route('dashboard')}}">
                        <input type= "button" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded" value="Cancel">
                    </a>
                </div>
                {{ csrf_field() }}
            </form>
        </div>
    </div>
</div>
</x-app-layout>