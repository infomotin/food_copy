@extends('client.client_dashboard')
@section('client')

<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title">Edit Gallary</h4>

                        <form action="{{route('client.gallery.update', $gallery->id)}}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3 row">
                                <label for="example-email-input" class="col-sm-2 col-form-label">Galary Image</label>
                                <div class="col-sm-10">
                                    <input class="form-control" name="gallery_image[]" type="file" id="multiImg"
                                        multiple>
                                    <div class="m-2 row" id="preview_img">
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <img src="{{asset('upload/gallerys/'.$gallery->gallery_image)}}" alt="" id="showImage"
                                    width="110">
                            </div>

                            <input type="submit" class="btn btn-info waves-effect waves-light" value="Edit Menu">
                        </form>
                    </div>
                </div>
            </div> <!-- end col -->
        </div>

    </div>
</div>
<script>
    $(document).ready(function(){
     $('#multiImg').on('change', function(){ //on file input change
        if (window.File && window.FileReader && window.FileList && window.Blob) //check File API supported browser
        {
            var data = $(this)[0].files; //this file data

            $.each(data, function(index, file){ //loop though each file
                if(/(\.|\/)(gif|jpe?g|png|webp)$/i.test(file.type)){ //check supported file type
                    var fRead = new FileReader(); //new filereader
                    fRead.onload = (function(file){ //trigger function on successful read
                    return function(e) {
                        var img = $('<img/>').addClass('thumb').attr('src', e.target.result) .width(100)
                    .height(80); //create image element
                        $('#preview_img').append(img); //append image to output element
                    };
                    })(file);
                    fRead.readAsDataURL(file); //URL representing the file's data.
                }
            });

        }else{
            alert("Your browser doesn't support File API!"); //if File API is absent
        }
     });
    });

</script>
@endsection
