@if (session()->has('success'))
    <div class="toast-container position-fixed top-0 end-0 p-3">
        <div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header">
                <img src="..." class="rounded me-2" alt="...">
                <strong class="me-auto">Notice</strong>
                <small>Just Now</small>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body">
                {{ session('success') }}
            </div>
        </div>
    </div>

    <script>
        var toastLive = document.getElementById('liveToast')
        var toast = new bootstrap.Toast(toastLive)

        toast.show()
    </script>
@endif

@if (session()->has('error'))
    <div class="toast-container position-fixed top-0 end-0 p-3">
        <div id="liveToastError" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header">
                <img src="" class="rounded me-2" alt="...">
                <strong class="me-auto">Error</strong>
                <small>11 mins ago</small>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body">
                {{ session('error') }}
            </div>
        </div>
    </div>
    <script>
        var toastError = document.getElementById('liveToastError')
        var toast = new bootstrap.Toast(toastError)

        toast.show()
    </script>
@endif

@if ($errors->any())
    <div class="toast-container position-fixed top-0 end-0 p-3">
        <div id="liveToastError" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header">
                <img src="..." class="rounded me-2" alt="...">
                <strong class="me-auto">Error</strong>
                <small>Just now</small>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body">
                @foreach ($errors->all() as $error)
                    {{ $error }}<br>
                @endforeach
            </div>
        </div>
    </div>

    <script>
        var toastError = document.getElementById('liveToastError')
        var toast = new bootstrap.Toast(toastError)
        toast.show()
    </script>
@endif
