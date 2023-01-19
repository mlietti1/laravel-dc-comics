<form class="delete-form" action="{{route('comics.destroy',$comic)}}" method="POST"
    onsubmit="return confirm('Are you sure you want to delete this item?')"
>
    @csrf
    @method('DELETE')

    <button type="submit" class="btn btn-danger"><i class="fa-solid fa-trash"></i></button>

</form>
