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
                                <a href="{{route('admin.post.add')}}"><button style="border: none">Elave et</button></a>
                            </div>
                <form action="" method="get">
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

                <div class="card-body px-0 pt-0 pb-0">
                    <div class="table-responsive p-">
                        <table class="table align-items-center mb-0">
                            <thead>
                            <tr>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                   catagory Id
                                </th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                   text
                                </th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                   author
                                </th>

                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    Created At

                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    Delete
                                </th>

                            </tr>
                            </thead>
                            <tbody>
                            @foreach($posts as $post)
                                <tr >
                                    <td>
                                        <p style="margin-left: 100px">{{ $post->id }}</p>
                                    </td>
                                    <td class="">
                                        <p>{{ $post->text }}</p>
                                    </td>
                                    <td class="">
                                        <p>{{ $post->author }}</p>
                                    </td>
                                    <td class="">
                                        <p>{{ $post->category_id }}</p>
                                    </td>  <td class="">
                                        <p>{{ $post->created_at }}</p>
                                    </td>
                                    <td class="">
                                        <p>{{ $post->img}}</p>
                                    </td>  <td class="">
                                        <p style="margin-left: 200px">{{ $post->created_at?$post->created_at->format('Y/m/d'):'' }}</p>
                                    <td class="">
                                        <a href="{{route('admin.post.delete', ['id'=>$post->id])}}"style="margin-left: 25px"><i class="fa-sharp fa-solid fa-trash"></i></a>
                                    </td>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <div>
                            {{$posts->links('pagination::bootstrap-5') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
