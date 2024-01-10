@extends('layouts.admin')

@section('breadcrumb')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-white" href="{{ route('admin.index') }}">Dashboard</a></li>
            <li class="breadcrumb-item text-sm text-white active" aria-current="page">Products</li>
        </ol>
        <h6 class="font-weight-bolder text-white mb-0">Products</h6>
    </nav>
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h6>Products list</h6>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card mb-4">
                            <div class="card-header pb-0">
                                <a href="{{route('admin.products.categoryadd')}}"><button style="border: none">Elave et</button></a>
                            </div>

                    <div class="card-body row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>
                                    User Name:
                                    <input type="text" class="form-control" name="user_name" id="user" placeholder="User name..." value="{{request()->get('user_name')}}">
                                </label>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>
                                    catagory_Name:
                                    <input type="text" class="form-control" name="product" id="product" placeholder="Product_Name" value="{{request()->get('product')}}">
                                </label>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>
                                    StartDate:
                                    <input type="date" class="form-control" name="startDate" id="startDate" placeholder="StartDate..." value="{{request()->get('startDate')}}">
                                </label>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>
                                    EndDate:
                                    <input type="date" class="form-control" name="endDate" id="endDate" placeholder="EndDate..." value="{{request()->get('endDate')}}">
                                </label>
                            </div>
                        </div>
                            <button class="btn" type="submit">Submit</button>
                    </div>

                </form>

                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                            <tr>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    Id
                                </th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                  Catogry name
                                </th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                   Delete
                                </th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    edit
                                </th>

                            </tr>
                            </thead>
                            <tbody>
                            @foreach($products as $product)
                                <tr>
                                    <td>
                                        <p>{{ $product->id }}</p>
                                    </td>
                                    <td class="">
                                        <p>{{ $product->name }}</p>
                                    </td>
                                    <td class="">
                                        <a href="{{route('admin.category.delete', ['id'=>$product->id])}}"style="margin-left: 25px"><i class="fa-sharp fa-solid fa-trash"></i></a>
                                    </td>
{{--                                    <td>--}}
{{--                                        <a href="{{route('admin.category.edit')}}" style="margin-left: 22px"><i class="fa-sharp fa-solid fa-pen-nib"></i></a>--}}
{{--                                    </td>--}}

                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <div>
                            {{ $products->links('pagination::bootstrap-5') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
