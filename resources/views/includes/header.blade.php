<form action="" method="POST">
    @csrf
    <div class="flex flex-row p-5">
        <div class="w-6/12">
            <input type="text" id="address" name="address" autocomplete="off"  class="p-2  bg-gray-200 w-full rounded-md" placeholder="اضف عنوان">
        </div>
        
        <div class="w-6/12">

            <select name="category" class="p-1 mr-5 bg-gray-200 w-full rounded-md" name="category">
                <option value="">حدد التصنيف</option>
            </select>
        </div>

        <div class="mr-5">
            <button type="submit" class="py-2 px-5 bg-gray-500 hover:bg-gray-400 text-white mr-5 rounded-md">بحث</button>
        </div>
    </div>
       
    
</form>