<div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">
        <div class="layout-page">
            <div class="container justify-content-center mt-4 mb-3">
                @include('errors.form')
                <form action="{{ route('user.vehicleComment.storeAs', $data->id) }}" method="POST">
                    @csrf
                    @include('forms.vehicle._formVehicleComment.index')
                </form>
            </div>
        </div>
    </div>
</div>