<!DOCTYPE html>
<head>
    <title>Add Category</title>
</head>
<body>
    <form method="POST" action="{{ route('postCategory') }}" enctype="multipart/form-data">
        @csrf
        <table>
            <tr>
                <td>cat_name</td>
                <td> <input type="text" name="cat_name" value="{{ old('cat_name') }} "/> </td>
            </tr>
            <td>
                @error('cat_name')
                <td class="alert alert-danger">{{ $message }}</td>
                @enderror
            </td>    

            <tr>
                <td>cat_desc</td>
                <td> <input type="text" name="cat_desc" value="{{ old('cat_desc') }} "/> </td>
            </tr>
            <td>
                @error('cat_desc')
                <td class="alert alert-danger">{{ $message }}</td>
                @enderror
            </td> 

            <tr>
                <td>cat_image</td>
                <td> <input type="file" name="cat_image"  value="{{ old('cat_image') }} "/> </td>
            </tr>
            <td>
                @error('cat_image')
                <td class="alert alert-danger">{{ $message }}</td>
                @enderror
            </td> 

            <tr>
                <td> <input type="submit" name="submit" value="Add Category" /> </td>
            </tr>
        </table>
    </form>
</body>
</html>