<!DOCTYPE html>
<head>
    <title>Edit Category</title>
</head>
<body>
    <form method="POST" action="{{ route('updateCategory', $category->id)  }}" enctype="multipart/form-data">
        @csrf
        <table>
            <tr>
                <td>cat_name</td>
                <td> <input type="text" name="cat_name" value="{{ ($category->cat_name) }} "/> </td>
            </tr>
            <td>
                @error('cat_name')
                <td class="alert alert-danger">{{ $message }}</td>
                @enderror
            </td>    

            <tr>
                <td>cat_desc</td>
                <td> <input type="text" name="cat_desc" value="{{ ($category->cat_desc) }} "/> </td>
            </tr>
            <td>
                @error('cat_desc')
                <td class="alert alert-danger">{{ $message }}</td>
                @enderror
            </td> 

            <tr>
                <td>cat_image</td>
                <td> <input type="file" name="cat_image"  value="{{ old('cat_image') }} "/> </td>
                {{-- <td><span>{{ $category->cat_image }}</span></td> --}}
                <td><img src="public/image/{{ $category->cat_image }}" width="80px"></td>
            </tr>
            <td>
                @error('cat_image')
                <td class="alert alert-danger">{{ $message }}</td>
                @enderror
            </td> 

            <tr>
                <td> <input type="submit" name="submit" value="Edit Category" /> </td>
            </tr>
        </table>
    </form>
</body>
</html>