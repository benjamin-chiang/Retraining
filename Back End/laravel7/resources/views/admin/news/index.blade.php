@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">

@endsection

@section('main')
    <div class="container">
        <a href="/admin/news/create" class="btn btn-primary" >新增最新消息</a>
        <hr>
        <table id="myTable" class="display">
            <thead>
                <tr>
                    <th>標題</th>
                    <th>日期</th>
                    <th>圖片</th>
                    <th>內文</th>
                    <th width="100px" >操作</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($newsData as $news)
                <tr>
                    <td>{{$news->title}}</td>
                    <td>{{$news->date}}</td>
                    <td><img src="{{$news->img}}" alt="" width="200px"></td>
                    <td>{{$news->content}}</td>
                    <td>
                        <a href="/admin/news/edit/{{$news->id}}" type="submit" class="btn btn-success btn-sm" >編輯</a>
                        <button type="submit" class="btn btn-danger btn-sm delete-btn" data-id="#delete_{{$news->id}}">刪除</button>
                        <form id="delete_{{$news->id}}" action="/admin/news/delete/{{$news->id}}" method="get"></form>
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
                console.log(delBtn);
                let id = this.getAttribute('data-id');
                console.log(id);
                if (confirm('是否刪除這篇文章？')) {
                    document.querySelector(id).submit();
                }
            })
        });
    </script>
@endsection
