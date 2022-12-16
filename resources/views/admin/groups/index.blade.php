@extends('admin.layout.master')
@section('content')


    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Nhóm Quyền</h5>
                        <a href="{{ route('group.create') }}"> Thêm Nhóm Quyền </a>

                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">STT</th>
                                    <th scope="col">Tên Nhóm Quyền</th>
                                    <th scope="col">Tùy Chọn</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($groups as $key => $group)
                                <tr>
                                    <th scope="row">{{++$key}}</th>
                                    <td>{{$group->name}}</td>
                                    <td>
                                        <form action="{{ route('group.destroy', $group->id) }}" method="post" >
                                            @method('DELETE')
                                            @csrf
                                         <a href="{{ route('group.edit', $group->id) }}" class ='btn btn-warning' > Sửa </a>
                                        <button onclick="return confirm('Bạn có chắc muốn đưa danh mục này vào thùng rác không?');" class ='btn btn-danger'  type="submit" >Xóa</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
