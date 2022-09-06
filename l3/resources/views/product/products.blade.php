@extends('layout')
@section('title', 'Categories')

@section('content')

    <div>
        <a class="btn btn-primary" href="{{ route('addProduct') }}">Add Product</a>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">

       
    <script>
        $(document).ready(function() {
            $('#chk_all').click(function() {
                if (this.checked)
                    $('.chkbox').prop('checked', true);
                else
                    $('.chkbox').prop('checked', false);
            });

            $('#delete_form').submit(function(e) {
                if (!confirm("Confirm Delete?")) {
                    e.preventDefault();
                }
            });
        });
    </script>


    <form id="delete_form">
        <table class="table">

            <thead class="table-dark">
                <tr>
                    <th><input id="chk_all" name="chk_all" type="checkbox" /></th>
                    <th scope="col">s.no.</th>
                    <th scope="col">prod_cat</th>
                    <th scope="col">Prod_title</th>
                    <th scope="col">Prod_desc</th>
                    <th scope="col">Prod_image</th>
                    <th scope="col">action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($product as $key => $products)
                    <tr>
                        <td><input type="checkbox" name="chk_id[]" class="chkbox" data-id="{{ $products->id }}"></td>
                        <td>{{ ++$key }}</td>
                        <td>{{ $products->cat_name }}</td>
                        <td>{{ $products->prod_title }}</td>
                        <td>{{ $products->prod_desc }}</td>
                        <td><img src="{{ url('public/image/' . $products->prod_image) }}" width="80" height="80">
                        </td>
                        <td>
                            <a class="btn btn-primary" href="{{ route('editProduct', $products->id) }}">Edit</a>
                            <a class="btn btn-danger" href="{{ route('deleteProduct', $products->id) }}">Delete</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <input id="submit" name="submit" type="submit" data-url="" class="btn btn-danger"
            value="Delete Selected Row(s)" />
    </form>

    <div>
        <a class="btn btn-primary" href="{{ route('logout') }}">logout</a>
    </div>
@endsection
