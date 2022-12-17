@extends('admin.layout.master')
@section('content')
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <br>
                        <h2 class="offset-4">
                            Nhóm Quyền
                        </h2>
                        <a class="btn btn-primary" href="{{ route('group.create') }}"> Thêm Nhóm Quyền </a>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">STT</th>
                                    <th scope="col">Tên Nhóm Quyền</th>
                                    <th scope="col">Hiện có</th>
                                    <th scope="col">Tùy Chọn</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($groups as $key => $group)
                                    <tr>
                                        <th scope="row">{{ ++$key }}</th>
                                        <td>{{ $group->name }}</td>
                                        <td>{{ count($group->users) }} Người</td>
                                        <td>
                                            <form action="{{ route('group.destroy', $group->id) }}" method="post">
                                                @method('DELETE')
                                                @csrf
                                                <a href="{{ route('group.edit', $group->id) }}" class='btn btn-warning'> Sửa
                                                </a>
                                                <button
                                                    onclick="return confirm('Bạn có chắc muốn đưa danh mục này vào thùng rác không?');"
                                                    class='btn btn-danger' type="submit">Xóa</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div style="float:right">
                            {{ $groups->onEachSide(5)->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
