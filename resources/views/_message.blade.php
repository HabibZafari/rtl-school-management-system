<div class="clear-both"></div>

@if (!empty(session('success')))
    <div id="successAlert" class="alert alert-success" role="alert">
        {{ session('success') }}
    </div>
@endif

@if (!empty(session('error')))
    <div id="errorAlert" class="alert alert-danger" role="alert">
        {{ session('error') }}
    </div>
@endif

@if (!empty(session('payment-error')))
    <div id="paymentErrorAlert" class="alert alert-danger" role="alert">
        {{ session('payment-error') }}
    </div>
@endif

@if (!empty(session('warning')))
    <div id="warningAlert" class="alert alert-warning" role="alert">
        {{ session('warning') }}
    </div>
@endif

@if (!empty(session('info')))
    <div id="infoAlert" class="alert alert-info" role="alert">
        {{ session('info') }}
    </div>
@endif

@if (!empty(session('primary')))
    <div id="primaryAlert" class="alert alert-primary" role="alert">
        {{ session('primary') }}
    </div>
@endif

@if (!empty(session('secondary')))
    <div id="secondaryAlert" class="alert alert-secondary" role="alert">
        {{ session('secondary') }}
    </div>
@endif

@if (!empty(session('light')))
    <div id="lightAlert" class="alert alert-light" role="alert">
        {{ session('light') }}
    </div>
@endif

@if (!empty(session('dark')))
    <div id="darkAlert" class="alert alert-dark" role="alert">
        {{ session('dark') }}
    </div>
@endif

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // List of alert IDs
        var alertIds = [
            'successAlert',
            'errorAlert',
            'paymentErrorAlert',
            'warningAlert',
            'infoAlert',
            'primaryAlert',
            'secondaryAlert',
            'lightAlert',
            'darkAlert'
        ];

        // Hide alerts after 3 seconds
        alertIds.forEach(function(alertId) {
            var alertElement = document.getElementById(alertId);
            if (alertElement) {
                setTimeout(function() {
                    alertElement.style.display = 'none';
                }, 3000);
            }
        });
    });
</script>




