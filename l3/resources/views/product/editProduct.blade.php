<!DOCTYPE html>
<head>
    <title>Edit Category</title>
</head>
<body>
    <form method="POST" action="{{ route('updateProduct', $product->id)  }}" enctype="multipart/form-data">
        @csrf
        <table>
            <tr>
                <td> prod_cat </td>
                <td>
                    <select name="prod_cat">
                        @if(!empty($product->prod_cat) && $product->prod_cat == $product->prod_cat)
                            <option value=" {{$product->prod_cat}}" selected>{{$product->prod_cat}} </option> 
                        @endif
                        <option value="{{$product->prod_cat}}"> {{$product->prod_cat}}</option>
    
                    </select>
                </td>
            </tr>
            <tr>
                <td>prod_title</td>
                <td> <input type="text" name="prod_title" value="{{ ($product->prod_title) }} "/> </td>
            </tr>
            <td>
                @error('prod_title')
                <td class="alert alert-danger">{{ $message }}</td>
                @enderror
            </td>    

            <tr>
                <td>prod_desc</td>
                <td> <input type="text" name="prod_desc" value="{{ ($product->prod_desc) }} "/> </td>
            </tr>
            <td>
                @error('prod_desc')
                <td class="alert alert-danger">{{ $message }}</td>
                @enderror
            </td> 

            <tr>
                <td>prod_image</td>
                <td> <input type="file" name="prod_image"  value="{{ old('prod_image') }} "/> </td>
                {{-- <td><span>{{ $product->prod_image }}</span></td> --}}
                <td><img src="public/image/{{ $product->prod_image }}" width="80px"></td>
            </tr>
            <td>
                @error('prod_image')
                <td class="alert alert-danger">{{ $message }}</td>
                @enderror
            </td> 

            <tr>
                <td> <input type="submit" name="submit" value="Update" /> </td>
            </tr>
        </table>
    </form>
</body>
</html>