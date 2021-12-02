@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">

@endsection

@section('main')
    <div class="container">
        <a href="/admin/product/type/create" class="btn btn-primary" >新增產品類別</a>
        <hr>
        <table id="myTable" class="display">
            <thead>
                <tr>
                    <th width="100px">產品類別id</th>
                    <th>類型名稱</th>
                    <th width="100px" >操作</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($productTypes as $productType)
                <tr>
                    <td>{{$productType->id}}</td>
                    <td>{{$productType->name}}</td>
                    <td>
                        <a href="/admin/product/type/edit/{{$productType->id}}" type="submit" class="btn btn-success btn-sm" >編輯</a>
                        <button type="submit" class="btn btn-danger btn-sm delete-btn" data-id="#delete_{{$productType->id}}">刪除</button>
                        <form id="delete_{{$productType->id}}" action="/admin/product/type/destroy/{{$productType->id}}" method="get"></form>
                        @csrf
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
                if (confirm('是否刪除這個產品類別？')) {
                    document.querySelector(id).submit();
                }
            })
        });

    </script>
@endsection
