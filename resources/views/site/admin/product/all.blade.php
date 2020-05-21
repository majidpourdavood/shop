@section('title' , ' | محصول ')
@section('description' , '')
@extends('site.admin.panel')
@section('content')

    <div class="container">
        <div class="row col-12 parent_breadcrumb_panel_top">
            <ul class="list-inline row col-12">
                <li class="list-inline-item col">
                    <nav class="breadcrumb_panel_top" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ route('product.create') }}"
                                   title="اضافه کردن محصول" class="btn btn-info"><i class="fas fa-plus"></i> محصول</a>

                            </li>
                        </ol>
                    </nav>
                </li>

                @include('site.layout.clock-time')


            </ul>
        </div>


        <div class="table-responsive">
            <table class="table table-striped table-hover auto-index" id="myTable">
                <thead class="thead-light">
                <tr>
                    <?php $i = ($products->perPage() * ($products->currentPage() - 1)) + 1;  ?>
                    <th width="5%">ردیف</th>
                    <th width="15%">عنوان</th>
                    <th width="10%">دسته</th>
                    {{--<th width="10%">قیمت</th>--}}
                    <th width="10%">تصویر</th>
                    <th width="10%">وضعیت</th>
                    <th>تاریخ</th>
                    <th width="25%">تنظیمات</th>
                </tr>
                </thead>
                <tbody class="row_position">
                @foreach($products as $product)
                    <tr id="<?php echo $product->id ?>">
                        <td>   {{$i++}}</td>

                        <td>{{ $product->title }}</td>
                        <td>{{ App\Model\Category::find($product->cate_id)->title  }}</td>
{{--                        <td>{{ $product->price }} تومان</td>--}}
                        <td>
                            @if($product->images)
                                <a target="_blank" href="{{ $product->images[0] }}">
                                    <img width="90" height="90" src="{{ $product->images[0] }}" alt=""></a></td>
                        @endif

                        <td>
                            @if ($product->active == '0')
                                غیر فعال
                            @elseif ($product->active == '1')
                                فعال
                            @endif
                        </td>
                        <td>{{ $product->created_at }}</td>

                        <td>


                            <ul class="list-inline">
                                <li class="list-inline-item">
                                    <form action="{{ route('product.active'  , $product->id) }}"
                                          method="post">
                                        {{ method_field('PATCH') }}
                                        {{ csrf_field() }}
                                        <div class="btn-group btn-group-xs">
                                            <button type="submit" class="btn btn-outline-success">
                                                <i class="fas fa-sync-alt"></i></button>

                                        </div>
                                    </form>
                                </li>

                                <li class="list-inline-item">
                                    <form action="{{ route('product.destroy'  , $product->id) }}"
                                          method="post">
                                        {{ method_field('delete') }}
                                        {{ csrf_field() }}
                                        <div class="btn_group ">
                                            <a href="{{ route('product.edit' , $product->id) }}"
                                               class="btn btn-outline-warning">
                                                <i class="fas fa-edit"></i></a>
                                            <button type="submit" class="btn  btn-outline-danger">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>
                                        </div>
                                    </form>
                                </li>

                                <li class="list-inline-item">
                                    <a href="{{ route('addPropertyProduct' , $product->id) }}"
                                       class="btn btn-outline-success">
                                        <i class="fas fa-plus"></i></a>
                                </li>

                            </ul>
                        </td>

                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div style="text-align: center">
            {!! $products->render() !!}
        </div>
    </div>

@endsection

@section('script')
    <script type="text/javascript">
        // $(".row_position").sortable({
        //     delay: 150,
        //     stop: function () {
        //         var selectedData = new Array();
        //         $('.row_position>tr').each(function () {
        //             selectedData.push($(this).attr("id"));
        //         });
        //         updateOrder(selectedData);
        //     }
        // });


        {{--function updateOrder(data) {--}}
        {{--$.ajax({--}}
        {{--url: "{{ action('Admin\\ProductController@sortableProduct') }}",--}}
        {{--type: "POST",--}}
        {{--data: {sort: data, "_token": "{{ csrf_token() }}"}--}}
        {{--}).done(function (data) {--}}
        {{--console.log(data)--}}
        {{--}).fail(function (data) {--}}
        {{--console.log(data)--}}
        {{--});--}}
        {{--}--}}
    </script>
@endsection
