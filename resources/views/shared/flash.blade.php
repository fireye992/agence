@if (session('success'))
<div id="successMessage" class=" m-2 bg-green-500 text-white p-3 rounded">
    {{ session('success') }}
</div>
<script>
    $(document).ready(function() {
        setTimeout(function() {
            $('#successMessage').fadeOut('slow');
        }, 4000); // 5000 ms = 5 s
    });
</script>
@endif

@if ($errors->any())
<div class="m-2 bg-red-600 text-white p-3 rounded">
    <ul class="my-0">
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif