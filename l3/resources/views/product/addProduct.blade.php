<!DOCTYPE html>
<head>
    <title>Add Product</title>
</head>
<body>
    <form method="POST" action="{{ route('postProduct') }}" enctype="multipart/form-data">
        @csrf
        <table>
            <tr>
                <td>prod_cat</td>
                <td>
                    <select name="prod_cat">
                        <option value="">select category</option>
                        @foreach ($category as $categories)
                            <option value="{{$categories->id}}">
                                {{$categories->cat_name}}
                            </option>
                        @endforeach
                    </select>
                </td>
            </tr>    
            <tr>
                <td>prod_title</td>
                <td> <input type="text" name="prod_title" value="{{ old('prod_title') }} "/> </td>
            </tr>
            <td>
                @error('prod_title')
                <td class="alert alert-danger">{{ $message }}</td>
                @enderror
            </td>    

            <tr>
                <td>prod_desc</td>
                <td> <input type="text" name="prod_desc" value="{{ old('prod_desc') }} "/> </td>
            </tr>
            <td>
                @error('prod_desc')
                <td class="alert alert-danger">{{ $message }}</td>
                @enderror
            </td> 

            <tr>
                <td>prod_image</td>
                <td> <input type="file" name="prod_image"  value="{{ old('prod_image') }} "/> </td>
            </tr>
            <td>
                @error('prod_image')
                <td class="alert alert-danger">{{ $message }}</td>
                @enderror
            </td> 

            <tr>
                <td> <input type="submit" name="submit" value="Add Product" /> </td>
            </tr>
        </table>
    </form>
</body>
</html>