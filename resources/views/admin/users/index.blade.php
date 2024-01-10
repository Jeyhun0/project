@extends('layouts.admin')

@section('breadcrumb')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm text-white active" aria-current="page">Users</li>
        </ol>
        <h6 class="font-weight-bolder text-white mb-0">Users</h6>
    </nav>
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h6>Users list</h6>
                </div>
                <form action="{{route('admin.users')}}" method="get">
                    <div class="card-body row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>
                                    id:
                                    <input type="text" class="form-control" name="id" placeholder="id..."
                                           value="{{request()->get('id')}}">

                                </label>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group ">
                                <label>
                                    Email:
                                    <input type="text" class="form-control" name="email" placeholder="Email..."
                                           value="{{request()->get('email')}}">
                                </label>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group ">
                                <label>
                                    StartDate:
                                    <input type="date" class="form-control" name="startDate" placeholder="StartDate..."
                                           value="{{request()->get('startDate')}}">
                                </label>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group ">
                                <label>
                                    EndDate:
                                    <input type="date" class="form-control" name="endDate" placeholder="EndDate..."
                                           value="{{request()->get('endDate')}}">
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
                                    Name
                                </th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                    Email
                                </th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    Created At
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <td>
                                        <p>{{ $user->id }}</p>
                                    </td>
                                    <td>
                                        <p>{{ $user->name }}</p>
                                    </td>
                                    <td class="">
                                        <p>{{ $user->email }}</p>
                                    </td>
                                    <td class="">
                                        <p>{{ $user->created_at?$user->created_at->format('Y/m/d'):'' }}</p>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <div>
                            {{ $users->appends(request()->all())->links('pagination::bootstrap-5') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
