<form action="" method="POST">
    @csrf
    <div class="flex flex-row p-5">
        <div class="w-6/12">
            <input type="text" id="address" name="address" autocomplete="off"  class="p-2  bg-gray-200 w-full rounded-md" placeholder="اضف عنوان">
        </div>
        
        <div class="w-6/12">

            <select  class="p-1 mr-5 bg-gray-200 w-full rounded-md" name="category">
                <option value="">حدد التصنيف</option>
            </select>
        </div>

        <div class="mr-5">
            <button type="submit" class="py-2 px-5 bg-gray-500 hover:bg-gray-400 text-white mr-5 rounded-md">بحث</button>
        </div>
    </div>
       
    
</form>
<section class="m-auto text-center">
    <div class="category mt-5">
        @foreach ($categories as $category)
            <li style="display: inline-block;
            margin-bottom:5px;">
                <a href="{{route('category.show',$category->slug)}}" class="bg-blue-900 hover:bg-gray-400" 
                    style="border: none;
                        border-radius: 5px;
                        font-size: 14px;
                        color: #fff;
                        font-weight: #000;
                        padding: 5px 19px;
                        display: inline-block;
                        margin: 0 3px;
                        -webkit-transition: 0.3s;
                        -moz-transition: 0.3s;
                        -o-transition: 0.3s;
                        transition: 0.3s;
                        cursor: pointer;">
                    {{$category->title}}
                </a>
            </li>
        @endforeach
    </div>
</section>