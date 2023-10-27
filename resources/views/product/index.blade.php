<x-app-layout>
    <form action="{{ route('product.upload') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="file" name="image_path" id="image_path" onchange="readURL(this);">
        <button type="submit">Submit</button>
    </form>
    <img id="blah" src="#" alt="your image" />
    <script>
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#blah').attr('src', e.target.result).width(150).height(200);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
</x-app-layout>