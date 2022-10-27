@extends('default')
@section("mywebpage")
<div class="container mt-5">
    <div id="filepreviewOriginal">
        <img src=""><br>
    </div>
    <div id="filepreviewResize">
        <img src=""><br>
    </div>
    <h1 class="mt-3">Resize image</h1>
    <form enctype="multipart/form-data">
        @csrf
        <input type="text" placeholder="add title" required id="title">
        <input type="file" accept="image/*" required id="file">
        <input type="submit">
    </form>
</div>

<script>
    $(document).ready(function(){
        $("form").submit(function(e){
            e.preventDefault();
            var files = $('#file')[0].files;
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }
            });

            var fd = new FormData();
            fd.append('file',files[0]);

            $.ajax({
                url: "/",
                method: 'POST',
                data: fd,
                contentType: false,
                processData: false,
                dataType: 'json',
                success : function(response)
                {
                    console.log(response);
                },
                error : function(error)
                {
                    console.log(error);
                }
            });

        });
    });
</script>
@stop
