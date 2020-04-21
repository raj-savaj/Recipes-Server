@extends('layout.app')
@section('title','Menu')

@push('css')
<style>
.main-content {
    padding-top: 25px !important;
    min-height: 100vh;
}
</style>
@endpush

@section('content')
    <div class="section__content section__content--p20">
        <div class="container-fluid">
            <div class="row ">
                <div class="offset-md-3 col-md-6 col-sm-12">
                    <div class="card">
                        <div class="card-header">Add New Menu</div>
                            <div class="card-body">
                                <div class="card-title">
                                    <h3 class="text-center title-2">Menu</h3>
                                </div>
                                <hr>
                                <form  action="{{ url('SaveMenu') }}" method="post" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label for="name" class="control-label mb-1">Name(Gujrati)</label>
                                        <input id="ngujrati" name="nameG" type="text" class="form-control">
                                    </div>

                                     <div class="form-group">
                                        <label for="name" class="control-label mb-1">Name(Hindi)</label>
                                        <input id="Nhindi" name="nameH" type="text" class="form-control">
                                    </div>

                                     <div class="form-group">
                                        <label for="name" class="control-label mb-1">Name(Englidh)</label>
                                        <input id="Nenglish" name="nameE" type="text" class="form-control">
                                    </div>

                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="file-input" class=" form-control-label">Image</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="file" id="file-input" name="mimg" class="form-control-file">
                                        </div>
                                    </div>
                                    <div>
                                        {{ csrf_field() }}
                                        <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                                            <span id="payment-button-amount">Add Menu</span>
                                            <span id="payment-button-sending" style="display:none;">Sending…</span>
                                        </button>
                                    </div>
                                </form>
                            </div>
                    </div>
                </div>
            </div>
            <div class="row m-t-30">
                <div class="col-md-12">
                    <div class="table-responsive m-b-40">
                        <table class="table table-borderless table-data3">
                            <thead>

                                <tr>
                                    <th>ID</th>
                                    <th>Name(GUJRATI)</th>
                                    <th>Name(HINDI)</th>
                                    <th>Name(ENGLISH)</th>
                                    <th>Image</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($menues as $Menu)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $Menu->name_Gujrati}}</td>
                                    <td>{{ $Menu->name_Hindi }}</td>
                                    <td>{{ $Menu->name_English }}</td>
                                    <td><img style="width: 150px;height: auto" src="{{ env('BUCKET_URL') }}{{  $Menu->image }}"></td>
                                    <td>
                                        <div class="table-data-feature">
                                            <button class="item" data-toggle="tooltip" onclick="upd({{$Menu->id}})"  data-placement="top" title="" data-original-title="Edit">
                                                <i class="zmdi zmdi-edit"></i>
                                            </button>
                                            <button class="item" data-toggle="tooltip" onclick="dlt({{$Menu->id}})" data-placement="top" title="" data-original-title="Delete">
                                                <i class="zmdi zmdi-delete"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
            function dlt(id){
                if(confirm("Are You Sure Want To Delete ?")){
                    location.href="{{ url('/delete') }}/"+id;
                }

            }
            function upd(id){
                if(confirm("Are You Sure Want To Update ?")){
                    location.href="{{ url('/UpdateMenu') }}/"+id;
                }

            }
    </script>
@endpush
