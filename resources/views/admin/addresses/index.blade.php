@extends('admin.common.layout')
@section('content')
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">目的地列表</h3>
        </div>
        <div class="box-body">
            <div class="row">
                <div class="col-sm-10">
                    <table id="example2" class="table table-bordered table-hover dataTable" role="grid" >
                        <thead>
                            <tr role="row">
                                <th class="sorting" tabindex="0"  rowspan="1" colspan="1">
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input name="" type="checkbox" value="" style="margin-top:20px;">
                                </th>
                                <th class="sorting" tabindex="0"  rowspan="1" colspan="1">
                                    <form class="form-inline" action="{{route('admin.teach.addresses.index')}}" method="get">
                                      <div class="box-body">
                                          <div class="form-group">
                                             <a class="btn btn-info" id='link'>删除选中</a>
                                          </div>&nbsp;&nbsp;
                                          <div class="form-group">
                                               <a href="{{route('admin.teach.addresses.create')}}" class="btn btn-info">增加目的地</a>
                                            </div>&nbsp;&nbsp;
                                          <div class="form-group">
                                              <input type="text" class="form-control" name="name" placeholder="搜索" value="">
                                          </div>&nbsp;&nbsp;
                                          <div class="form-group">
                                              <select name="status" id="status" class="form-control">
                                                  <option value="">全部</option>
                                                  <option value="pause" >暂停</option>
                                                  <option value="wait" >等待</option>
                                                  <option value="doing" >正在注入</option>
                                              </select>
                                          </div>&nbsp;&nbsp;
                                          <button class="btn btn-info"><i class="fa fa-search"></i></button>
                                      </div>
                                  </form>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($addresses as $key => $address)
                                <tr @if($key%2 == 0) style="background:#F0F8FF;" @endif role="row">
                                    <td class="" align="center" valign="middle"><input style="margin-top:60px;" name="input" type="checkbox" value="{{$address->id}}"></td>
                                    <td class="">
                                        <div class="row">
                                            <div class="col-xs-6 col-md-2">
                                                <img src="/{{$address->cover_picture}}" width="120px;" height="120px;">
                                            </div>
                                            <div class="col-xs-6 col-md-8">
                                                <div>
                                                    <span style="font-size:20px;"><B>{{$address->name}}</B></span>
                                                </div>
                                                <div style="margin-top:15px;">
                                                    <h4 class="box-title">分类:{{$address->name}}</h3>
                                                </div>
                                                <div style="margin-top:15px;">
                                                    <h4 class="box-title">地址:{{$address->address}}</h3>
                                                </div>
                                                <div style="margin-top:15px;">
                                                    <h4 class="box-title">电话:{{$address->telephone}}</h3>
                                                </div>
                                            </div>
                                            <div class="col-xs-6 col-md-2">
                                                <div style="margin-top:10px;">
                                                    @if($address->status == 'ACTIVE')
                                                        <span class="badge bg-green">状态:已上架</span>
                                                    @endif
                                                    @if(in_array($address->status,['INACTIVE','APPROVALED']))
                                                        <span class="badge bg-red">状态:未上架</span>
                                                    @endif
                                                    @if($address->status == 'NO_APPROVAL')
                                                        <span class="badge bg-yellow">状态:未审批</span>
                                                    @endif
                                                </div>
                                                <div style="margin-top:10px;">
                                                    @if($address->status == 'ACTIVE')
                                                        <a class="badge bg-aqua" id='link'>下线</a>
                                                    @endif
                                                    @if(in_array($address->status,['INACTIVE','APPROVALED']))
                                                        <a class="badge bg-aqua" id='link'>上线</a>
                                                    @endif
                                                    @if($address->status == 'NO_APPROVAL')
                                                        <span class="badge">上线</span>
                                                    @endif

                                                 </div>
                                                 <div style="margin-top:10px;">
                                                    <a href="{{route('admin.teach.addresses.show',$address->id)}}" class="badge bg-aqua" id='link'>详情</a>
                                                 </div>
                                                 <div style="margin-top:10px;">
                                                    <a href="{{route('admin.teach.addresses.destory',$address->id)}}" data-method='delete' data-confirm="你确定要删除吗？"  class="badge bg-aqua" id='link'>删除</a>
                                                 </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-5"></div>
                <div class="col-sm-7">
                    <div class="dataTables_paginate paging_simple_numbers" id="example1_paginate">
                        {!! $addresses->render() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="/js/jquery.min.js" type="text/javascript"></script>
    <script src="/js/form.js" type="text/javascript"></script>
    <script src="/js/checkbox.js" type="text/javascript"></script>
    <script type="text/javascript">
    require(['jquery'], function($) {
    $("#link").on('click',function(){
        ids = getCheckboxValue();
        if (ids == "") {
            alert("请先选择一条数据！");
        }else{
            data = [
                {
                    'name':'id',
                    'value':ids,
                },
            ];
            buildForm('put','',data);
        }
    });
});
    </script>
@endsection
