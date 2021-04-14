<div
    class="toast align-items-center text-white bg-danger bg-gradient border-0"
    role="alert"
    aria-live="assertive"
    aria-atomic="true"
    data-bs-autohide="true"
    data-bs-animation="true"
    data-bs-delay="2000"
>
    <div class="d-flex">
        <div class="toast-body">
            {{ session("error") }}
        </div>
    </div>
</div>