@extends('Admin.layouts.app')

@section('content')
    <!-- Page Wrapper -->
    <div class="page-wrapper">
        <div class="content">

            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <div class="row align-items-center ">
                            <div class="col-md-4">
                                <h3 class="page-title">Deals Dashboard</h3>
                                <a href="{{ route('admin.send-notification') }}" class="btn btn-primary">Send Notifications</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- /Page Wrapper -->

@endsection
@push('scripts')
<!-- Firebase Compatibility SDKs -->
<!--<script src="https://www.gstatic.com/firebasejs/9.0.0/firebase-app-compat.js"></script>-->
<!--<script src="https://www.gstatic.com/firebasejs/9.0.0/firebase-messaging-compat.js"></script>-->

<!--<script>-->
<!--    var firebaseConfig = {-->
<!--        apiKey: "AIzaSyDDb7Oo-8NgQiVRqLCWPGnnW4jomA04IMw",-->
<!--        authDomain: "fir-notifications-71c20.firebaseapp.com",-->
<!--        projectId: "fir-notifications-71c20",-->
<!--        storageBucket: "fir-notifications-71c20.appspot.com",-->
<!--        messagingSenderId: "96474935880",-->
<!--        appId: "1:96474935880:web:42396121bb953edf611e7d",-->
<!--        measurementId: "G-QJ5YBHHTG7"-->
<!--    };-->

    <!--// Initialize Firebase-->
<!--    firebase.initializeApp(firebaseConfig);-->
<!--    const messaging = firebase.messaging();-->

<!--    function initFirebaseMessagingRegistration() {-->
        <!--// Ask for permission to show notifications-->
<!--        Notification.requestPermission().then(function (permission) {-->
<!--            if (permission === 'granted') {-->
                // Get the token for the device
<!--                messaging.getToken({ vapidKey: 'BAJhy0lbBEF7gupn0BPfIv6IiUHITIRS0QirvHuL_jSzQQoMS8-XXTJP6AnZOHWcKcHQp6ifG8CiQ5A43OqtBe8' }).then(function (token) {-->
                    <!--// Make an AJAX request to save the token-->
<!--                    $.ajaxSetup({-->
<!--                        headers: {-->
<!--                            'X-CSRF-TOKEN': "{{ csrf_token() }}",-->
<!--                        }-->
<!--                    });-->

<!--                    $.ajax({-->
<!--                        url: '{{ route("admin.save-token") }}',-->
<!--                        type: 'POST',-->
<!--                        data: {-->
<!--                            token: token-->
<!--                        },-->
<!--                        dataType: 'JSON',-->
<!--                        success: function (response) {-->
<!--                            console.log('Token saved successfully.');-->
<!--                        },-->
<!--                        error: function (err) {-->
<!--                            console.log('Error saving token:', err);-->
<!--                        },-->
<!--                    });-->

<!--                }).catch(function (error) {-->
<!--                    console.error('Error getting token:', error);-->
<!--                });-->

<!--            } else {-->
<!--                console.error('Notification permission denied.');-->
<!--            }-->
<!--        });-->
<!--    }-->

    <!--// Handle incoming messages-->
<!--    messaging.onMessage(function (payload) {-->
<!--        const noteTitle = payload.notification.title;-->
<!--        const noteOptions = {-->
<!--            body: payload.notification.body,-->
<!--            icon: payload.notification.icon,-->
<!--        };-->
<!--        new Notification(noteTitle, noteOptions);-->
<!--    });-->

    <!--// Initialize registration on document ready-->
<!--    $(document).ready(function () {-->
<!--        initFirebaseMessagingRegistration();-->
<!--    });-->
<!--</script>-->


{{-- <script src="https://www.gstatic.com/firebasejs/9.0.0/firebase-app-compat.js"></script>
<script src="https://www.gstatic.com/firebasejs/9.0.0/firebase-messaging-compat.js"></script> --}}

<!-- <script>
    // Your Firebase configuration
    var firebaseConfig = {
        apiKey: "AIzaSyDDb7Oo-8NgQiVRqLCWPGnnW4jomA04IMw",
        authDomain: "fir-notifications-71c20.firebaseapp.com",
        projectId: "fir-notifications-71c20",
        storageBucket: "fir-notifications-71c20.appspot.com",
        messagingSenderId: "96474935880",
        appId: "1:96474935880:web:42396121bb953edf611e7d",
    };

    // Initialize Firebase
    firebase.initializeApp(firebaseConfig);
    const messaging = firebase.messaging();

    // Register the service worker
    if ('serviceWorker' in navigator) {
        navigator.serviceWorker.register('{{ url('firebase-messaging-sw.js') }}')
            .then(function (registration) {
                console.log('Service Worker registered with scope:', registration.scope);
                return messaging.getToken({
                    vapidKey: 'BAJhy0lbBEF7gupn0BPfIv6IiUHITIRS0QirvHuL_jSzQQoMS8-XXTJP6AnZOHWcKcHQp6ifG8CiQ5A43OqtBe8'
                });
            })
            .then(function (token) {
                console.log('Token received:', token);
                // Send this token to the server to save it
                saveToken(token);
            })
            .catch(function (err) {
                console.error('Error during registration or token retrieval:', err);
            });
    }

    // Save the token using AJAX
    function saveToken(token) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            }
        });

        $.ajax({
            url: '{{ route("admin.save-token") }}',
            type: 'POST',
            data: {
                token: token
            },
            dataType: 'JSON',
            success: function (response) {
                console.log('Token saved successfully.');
            },
            error: function (err) {
                console.log('Error saving token:', err);
            }
        });
    }

    // Handle foreground messages
    messaging.onMessage(function (payload) {
        console.log('Message received:', payload);
        const notificationTitle = payload.notification.title;
        const notificationOptions = {
            body: payload.notification.body,
            icon: payload.notification.icon
        };
        new Notification(notificationTitle, notificationOptions);
    });
</script> -->


@endpush

