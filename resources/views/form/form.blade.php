<form action="{{ route('upload-without-saving') }}" method="POST" enctype="multipart/form-data">
    <div>
        <input type="file" name="upload">
    </div>

    @csrf
    <button type="submit">Upload</button>
</form>