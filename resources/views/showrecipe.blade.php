 @extends('layout.app')
@section('title','recipes')
@push('css')
<style>
.main-content
{
    padding-top:30px !important; 
}
</style>
@endpush
@section('content')
 
<div class="row">
    <div class="col-md-12">
        <div class="table-responsive">
            <table class="table table-borderless table-data3">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Menu</th>
                        <th>Name(GUJRATI)</th>
                        <th>Name(HINDI)</th>
                        <th>Name(ENGLISH)</th>
                        <th>Recipes</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($recipe as $r)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$r->ne}}</td>
                        <td>{{$r->name_Gujrati}}</td>
                        <td>{{$r->name_Hindi}}</td>
                        <td>{{$r->name_English}}</td>
                        <td>
                            <div class="table-data-feature">
                                <button class="item" onclick="getRecipe({{$r->id}})"><i class="zmdi zmdi-eye"></i></button>
                            </div>
                        </td>
                        <td>
                            <div class="table-data-feature">
                                <button class="item" data-toggle="tooltip" onclick="upd({{$r->id}})"  data-placement="top" title="" data-original-title="Edit">
                                    <i class="zmdi zmdi-edit"></i>
                                </button>
                                <button class="item" data-toggle="tooltip" onclick="dlt({{$r->id}})" data-placement="top" title="" data-original-title="Delete">
                                    <i class="zmdi zmdi-delete"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="modal fade" id="largeModal" tabindex="-1" role="dialog" aria-labelledby="largeModalLabel" aria-hidden="true" style="display: none;">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h3 class="modal-title" id="largeModalLabel">Recipe</h3>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-12 m-b-25">
                                        <div class="im text-center"></div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="guj"></div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="hindi"></div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="eng"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                            <button type="button" class="btn btn-primary">Confirm</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
    <script>
        function getRecipe(id)
        {
            $.ajax({
                method:"get",
                url:"{{url('')}}/getRecipeContent",
                data:{id:id},
                beforeSend: function() {

                },
                success:function(result){
                var eng='',guj='',hindi='';
                $(".im").html('<img style="height:200px !important;width:400px !important" src="{{ env('BUCKET_URL') }}'+result[0].image+'"/>')
                guj +="<div><b>Menu : </b>"+result[0].ng+"</div>";
                guj +="<div><b>Dish : </b>"+result[0].name_Gujrati+"</div>";
                guj +="<div><b>Description : </b>"+result[0].discription_Gujrati+"</div>";
                hindi +="<div><b>Menu : </b>"+result[0].nh+"</div>";
                hindi +="<div><b>Dish : </b>"+result[0].name_Hindi+"</div>";
                hindi +="<div><b>Description : </b>"+result[0].discription_Hindi+"</div>";
                eng +="<div><b>Menu : </b>"+result[0].ne+"</div>";
                eng +="<div><b>Dish : </b>"+result[0].name_English+"</div>";
                eng +="<div><b>Description : </b>"+result[0].discription_English+"</div>";
                $(".guj").html(guj);
                $(".hindi").html(hindi);
                $(".eng").html(eng);
                $("#largeModal").modal('show');
                }
            });
            $("#largeModal").modal('show');
        }
        function dlt(id){
            if(confirm("Are You Sure Want To Delete ?")){
                location.href="{{ url('/deleterecipe') }}/"+id;
            }

        }
        function upd(id){
            if(confirm("Are You Sure Want To Update ?")){
                location.href="{{ url('/updaterecipes') }}/"+id;
            }

        }
    </script>
@endpush
