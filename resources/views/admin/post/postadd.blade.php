@extends('layouts.admin')
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">

                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title ">Kategori Ekle</h4>
                        </div>
                        <div class="card-body">
                            <div style="width:200px; height: 850px;">
                                <form action="{{route('admin.post.create')}}" method="post">
                                    @csrf
                                    <table>
                                        <tr><h4> Id:</h4> <select name="id" id="id" style="width: 600px">
                                                <tr><h4>  img:</h4> <input style=" width: 600px" type="text" name="img" placeholder="img"/></tr>
                                                <tr><h4>  category_id:</h4> <input style=" width: 600px" type="text" name="category_id" placeholder="category_id"/></tr>
                                                <tr><h4>  author:</h4> <input style=" width: 600px" type="text" name="author" placeholder="author"/></tr>
                                                <tr><h4>  text:</h4> <input style=" width: 600px" type="text" name="text" placeholder="created_at"/></tr>
                                                <tr><h4>  updated_at:</h4> <input style=" width: 600px" type="text" name="updated_at" placeholder="updated_at"/></tr>
                                                <tr><button type="submit" style="margin-top:5px;color:#95999c; background-color: #00bbff; width: 150px;">Ekle</button></tr>

                                    </table>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

@endsection
