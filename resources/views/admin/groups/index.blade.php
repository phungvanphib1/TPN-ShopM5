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
                        @if (Auth::user()->hasPermission('Group_create'))
                            <a class="btn btn-primary" href="{{ route('group.create') }}"> Thêm Nhóm Quyền </a>
                        @else
                            <button type="button" class="btn btn-primary" disabled>Thêm Nhóm Quyền</button>
                        @endif
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
                                                @if (Auth::user()->hasPermission('Group_create'))
                                                    <a href="{{ route('group.detail', $group->id) }}" class='btn btn-info'>
                                                        Trao quyền </a>
                                                @else
                                                    <button type="button" class="btn btn-info" disabled>Trao quyền</button>
                                                @endif

                                                @if (Auth::user()->hasPermission('Group_update'))
                                                    <a href="{{ route('group.edit', $group->id) }}" class='btn btn-warning'>
                                                        Sửa </a>
                                                @else
                                                <i data-bs-toggle="tooltip" data-bs-placement="top" title="Bạn không có quyền làm điều này!">
                                                    <button type="button" class="btn btn-warning" disabled>Sửa</button>
                                                </i>
                                                @endif

                                                @if (Auth::user()->hasPermission('Group_delete'))
                                                    <button
                                                        onclick="return confirm('Bạn có chắc muốn đưa danh mục này vào thùng rác không?');"
                                                        class='btn btn-danger' type="submit">Xóa</button>
                                                @else
                                                <i data-bs-toggle="tooltip" data-bs-placement="top" title="Bạn không có quyền làm điều này!">
                                                    <button type="button" class="btn btn-danger" disabled>Xóa</button>
                                                </i>
                                                @endif

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
