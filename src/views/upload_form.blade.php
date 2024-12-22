<form id="uploadForm" action="{{ route('imageupload.upload') }}" method="post" enctype="multipart/form-data">
    @csrf
    <input type="file" name="images[]" multiple>
    <button type="submit">Submit</button>
</form>
