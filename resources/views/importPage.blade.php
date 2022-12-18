<form action="/import" enctype="multipart/form-data" method="post">
    @csrf
    <input type="file" name="file" id="">
    <button type="submit">Submit</button>
</form>


<a href="/export" class="btn btn-primary">Export Excel</a>