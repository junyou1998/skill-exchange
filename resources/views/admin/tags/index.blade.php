@extends('layouts.admin')
@section('content')

<div class="container">

    <table id="table" class="display table table-striped table-bordered" >
        <thead>
            <tr>
                <th>標籤</th>
                <th>貼文數量</th>
                <th>操作操作</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tags as $tag)

            <tr>
                <td>{{$tag->name}}</td>
            <td>{{$tag->posts_count}}</td>
                <td><button class="btn btn-danger" onclick="deleteTag({{$tag->id}})">刪除</button></td>
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