@extends('admin.layouts.app')

@section('main')
    <div class="box box-primary">
        <div class="box-header">
            <h5 class="box-title">权限管理</h5>
            <a class="btn btn-primary" href="{{ route('admin.permissions.create') }}"><i class="fa fa-plus"></i>添加</a>
        </div>
        <div class="box-body">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>编号</th>
                    <th>名称</th>
                    <th>Slug</th>
                    <th>描述</th>
                    <th>添加时间</th>
                    <th>更新时间</th>
                    <th width="200px">操作</th>
                </tr>
                </thead>
                <tbody>
                @foreach($permissions as $permission)
                    <tr>
                        <td>
                            <label>
                                <input type="checkbox" value="{{ $permission->id }}" class="table-check">
                                {{ $permission->id }}
                            </label>
                        </td>
                        <td>
                            <a href="{{ route('admin.permissions.edit',['permission' => $permission->id]) }}">{{ $permission->alias }}</a>
                        </td>
                        <td>{{ $permission->name }}</td>
                        <td>{{ $permission->describe }}</td>
                        <td>{{ hommization($permission->created_at) }}</td>
                        <td>{{ hommization($permission->updated_at) }}</td>
                        <td>
                            <a class="btn btn-success"
                               href="{{ route('admin.permissions.edit',['permission' => $permission->id]) }}">
                                <i class="fa fa-pencil-square-o"></i> 编辑
                            </a>
                            <form action="{{ route('admin.permissions.destroy',['permission' => $permission->id]) }}"
                                  class="destroy">
                                <button type="submit" class="btn btn-danger">
                                    <i class="fa fa-trash-o"></i>
                                    删除
                                </button>
                                {{ method_field('DELETE') }}
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="box-footer clearfix">
            <button class="btn btn-primary select-all"><i class="fa fa-check"></i> 全选/反选</button>
            <button class="btn btn-danger btn-batch" batch-url="{{ route('admin.permissions.batch') }}"><i class="fa fa-trash-o"></i> 删除选中</button>
            {{ $permissions->links() }}
            <p class="total">共计 {{ $permissions->total() }} 条数据，每页显示 10 条。</p>
        </div>
    </div>
@stop