<@extends('layout.app')
@section('title','submenu')

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
                        <div class="card-header">Add New SubMenu</div>
                            <div class="card-body">
                                <div class="card-title">
                                    <h3 class="text-center title-2">Sub Menu</h3>
                                </div>
                                <hr>
                                <form  action="{{ url('savesubmenu') }}" method="post" enctype="multipart/form-data">

                                    <div>
                                    <label>Menu</label>
                                    <select name = "drpmenu" id="league" class="form-control">
                                        @foreach ($menues as $Menu)
                                            <option value="{{  $Menu->id }}">{{ $Menu->name }}</option>
                                          @endforeach
                                    </select>

                                    </div>

                                     <div>
                                    <label>SubMenu</label>
                                    <select name = "drpmenu" id="league" class="form-control">
                                      
                                    </select>

                                    </div>
                                   
                                     <div class="form-group">
                                        <label for="name" class="control-label mb-1">SubMenu Name</label>
                                        <input id="name" name="subname" type="text" class="form-control">
                                    </div>

                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="file-input" class=" form-control-label">Image</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="file" id="file-input" name="simg" class="form-control-file">
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
    </script>
@endpush
