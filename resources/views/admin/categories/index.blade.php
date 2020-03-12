@extends('layouts.admin')

@section('css')
@endsection

@section('content')

<div class="container">
    <a href="/admin/categories/create" class="btn btn-primary">create category</a>
    <table id="table" class="display table table-striped table-bordered" >
        <thead>
            <tr>
                <th>分類</th>
                <th>地區</th>
                <th>操作</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $category)

            <tr>
                <td>{{$category->name}}</td>
                <td>{{$category->posts_count}}</td>
                <td><a class="btn btn-primary" href="/admin/categories/{{$category->id}}/edit">編輯</a>
                    <button class="btn btn-danger" onclick="deleteCategory({{$category->id}})">刪除</button></td>
            </tr>
            @endforeach
        </tbody>
    </table>

</div>

@endsection
@section('js')
<script>
    var table = $('#table').DataTable({
    "order": [1, 'desc'],
    // "columnDefs": [{
    //     "orderable": false,
    //     "targets": 0
    // }],
    "language": {
        "emptyTable": "沒有符合的查詢項目",
        "info": "第 _START_ 到 _END_ 筆 , 共有 _TOTAL_ 筆",
        "infoEmpty": "0筆資料",
        "infoFiltered": ", 共查詢 _MAX_ 筆",
        "infoPostFix": "",
        "thousands": ",",
        "lengthMenu": "顯示行數 _MENU_",
        "loadingRecords": "Loading...",
        "processing": "Processing...",
        "search": "搜尋:",
        "zeroRecords": "沒有符合的查詢項目",
        "paginate": {
            "first": "第一頁",
            "last": "最後一頁",
            "next": "下一頁",
            "previous": "上一頁"
        },
        "aria": {
            "sortAscending": " - click/return to sort ascending",
            "sortDescending": ": activate to sort column descending"
        }
    }
});
</script>
@endsection