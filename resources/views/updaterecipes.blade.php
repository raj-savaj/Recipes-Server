<@extends('layout.app')
@section('title','Update Recipe')

@push('css')
<style>
.main-content {
    padding-top: 25px !important;
    min-height: 100vh;
}

.ck.ck-editor__main>.ck-editor__editable {
    background: var(--ck-color-base-background);
    height: 200px !important;
    border-radius: 0;
}
</style>
@endpush

@section('content')
    <div class="section__content section__content--p20">
        <div class="container-fluid">
            <div class="row ">
                <div class="col-md-12 col-sm-12 ">
                    <div class="card">
                        <div class="card-header">Update Recipe</div>
                            <div class="card-body">
                                <div class="card-title">
                                    <h3 class="text-center title-2">Recipe</h3>
                                </div>
                                <hr>
                                <form  action="{{ url('updatesubmenu') }}" method="post" enctype="multipart/form-data">
                                    <input type="hidden" name="id" value="{{$recipe['id']}}">
                                    <div class="row">
                                        <div class="col-md-6">
                                        <div class="form-group">
                                        <label>Menu</label>
                                        <select name = "drpmenu" id="league" class="form-control">
                                            @foreach ($data as $Menu)
                                                <option value="{{  $Menu->id }}" <?php if ($Menu->id==$recipe['mid']) {
                                                    echo "selected";
                                                } ?> >{{ $Menu->name_English }}</option>
                                              @endforeach
                                        </select>

                                        </div>
                                        </div>
                                       
                                         <div class="col-md-6">
                                         <div class="form-group">
                                            <label for="name" class="control-label mb-1">Recipes-Gujrati-Name</label>
                                            <input id="name" name="subname" value="{{$recipe['name_Gujrati']}}" type="text" class="form-control">
                                        </div>
                                        </div>

                                         <div class="col-md-6">
                                         <div class="form-group">
                                            <label for="name" class="control-label mb-1">Recipes-Hindi-Name</label>
                                            <input id="rechindi" name="hindirecipy" value="{{$recipe['name_Hindi']}}" type="text" class="form-control">
                                        </div>
                                        </div>

                                         <div class="col-md-6">
                                         <div class="form-group">
                                            <label for="name" class="control-label mb-1">Recipes-English-Name</label>
                                            <input id="receng" name="englishrecipy" value="{{$recipe['name_English']}}" type="text" class="form-control">
                                        </div>
                                        </div>

                                         <div class="col-md-12">
                                        <div class="form-group">
                                            <div class="col col-md-6">
                                                <label for="file-input" class=" form-control-label">Image</label>
                                                <input type="file" id="file-input" name="simg" class="form-control-file">
                                            </div>
                                        </div>
                                        </div>
                                 
                                                                             
                                        <div class="form-group col-md-12">
                                             <label class="control-label"><b>Gujrati</b></label>
                                            <textarea class="form-control ht" id="ckeditor" name="disgujrati">
                                             <?php echo $recipe['discription_Gujrati']; ?>
                                            </textarea>
                                        </div>

                                           <div class="form-group col-md-12">
                                            <label for="name" class="control-label"><b>Hindi</b></label>
                                            <textarea class="form-control ht" id="ckeditor1" name="dishindi">

                                             <?php echo $recipe['discription_Hindi']; ?>
                                             </textarea>
                                        </div>

                                         <div class="form-group col-md-12">
                                            <label for="name" class="control-label mb-1"><b>English</b></label>
                                            <textarea class="form-control ht" id="ckeditor2" name="disenglish">

                                             <?php echo $recipe['discription_English']; ?>
                                             </textarea>
                                        </div>
                                        <div class="form-group offset-md-4 col-md-4">
                                            <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block"><span id="payment-button-amount">Update Recipe</span>
                                                <span id="payment-button-sending" style="display:none;">Sending…</span>
                                            </button>
                                        </div>

                                         <div>
                                            {{ csrf_field() }}
                                                
                                        </div>
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

    <script src="https://cdn.ckeditor.com/4.10.1/full-all/ckeditor.js"></script>
    <script>
            CKEDITOR.replace( 'disgujrati' );
            CKEDITOR.replace( 'dishindi' );
            CKEDITOR.replace( 'disenglish' );
    </script>
@endpush
