<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>

function deleteEle(link,afterDeletelink){
    Swal.fire({
    title: "@lang('app.sure')",
    text: "@lang('app.revert')",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: "@lang('app.yes')"

    }).then((result) => {
        if (result.isConfirmed) {
        $.post(link,{'_token':'{{csrf_token()}}'},(response)=>{
            if(response == true){ Swal.fire("@lang('app.deleted')","@lang('app.has been deleted')",'success').then(()=>{ location.replace(afterDeletelink); }); }
        })
        }
    })
}

</script>

<script>

    function makeError(nameInput,errorInput,oldValue){
        let div = document.createElement('div');
        div.classList = 'invalid-feedback'
        div.textContent = errorInput

         $('[name='+nameInput+']').addClass("removeError is-invalid")
         $('[name='+nameInput+']').val(oldValue)

         $('[name='+nameInput+']').after(div)

    }
    </script>


@if($errors->any())
    @foreach($errors->getMessages() as $key => $error)
        <script> makeError('{{$key}}','{{$error[0]}}','{{old($key)}}') </script>
    @endforeach
@endif
