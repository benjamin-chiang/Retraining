@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">

@endsection

@section('main')
    <div class="container">
        <a href="/admin/product/create" class="btn btn-primary" >新增產品</a>
        <hr>
        <table id="myTable" class="display">
            <thead>
                <tr>
                    <th>類型</th>
                    <th>名稱</th>
                    <th>簡介</th>
                    <th>圖片</th>
                    <th>價格</th>
                    <th width="100px" >操作</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                <tr>
                    <td>{{$product->productType->name}}</td>
                    <td>{{$product->name}}</td>
                    <td>{{$product->description}}</td>
                    <td><img src="{{$product->img}}" alt="" width="200px"></td>
                    <td>{{$product->price}}</td>
                    <td>
                        <a href="/admin/product/edit/{{$product->id}}" type="submit" class="btn btn-success btn-sm" >編輯</a>

                        <button type="submit" class="btn btn-danger btn-sm delete-btn" data-id="#delete_{{$product->id}}">刪除</button>
                        <form id="delete_{{$product->id}}" action="/admin/product/delete/{{$product->id}}" method="post">
                            @csrf
                        </form>
                    </td>
                </tr>

                @endforeach
            </tbody>
        </table>
    </div>
@endsection

@section('js')
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#myTable').DataTable();
        });

        let delBtns = document.querySelectorAll('.delete-btn');
        delBtns.forEach(delBtn => {
            delBtn.addEventListener('click', function () {
                let id = this.getAttribute('data-id');
                console.log(id);
                if (confirm('是否刪除這篇文章？')) {
                    document.querySelector(id).submit();
                }
            })
        });

    </script>
@endsection
