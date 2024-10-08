@extends('Admin.layouts.app')

@section('content')
    <style>
        #userList {
            max-height: 300px;
            /* Limit height */
            overflow-y: auto;
            /* Add scrolling if needed */
            background-color: #fff;
            border: 1px solid #ddd;
        }

        .user-suggestion-item {
            cursor: pointer;
        }

        .user-suggestion-item:hover {
            background-color: #f1f1f1;
        }

        .chat-controls {
            display: flex;
            align-items: center;
        }

        .recording-status {
            display: flex;
            align-items: center;
            justify-content: space-between;
            width: 100%;
        }

        #recordingTimer {
            font-size: 16px;
            color: red;
            margin-right: 20px;
        }

        #cancelRecordingBtn,
        #sendRecordingBtn {
            margin-left: 10px;
        }
    </style>

    <!-- Main Wrapper -->
    <div class="main-wrapper">
        <div class="page-wrapper chat-page-wrapper">
            <div class="content">
                <!-- sidebar group -->
                <div class="sidebar-group left-sidebar chat_sidebar">
                    <!-- Chats sidebar -->
                    <div id="chats" class="left-sidebar-wrap sidebar active slimscroll">
                        <div class="slimscroll-active-sidebar">
                            <!-- Left Chat Title -->
                            <div class="left-chat-title all-chats align-items-center">
                                <div class="setting-title-head">
                                    <h4> All Chats</h4>
                                </div>
                                <div class="card-body mt-3">
                                    <select class="select2 form-control" onchange="getUserChat(this)"
                                        id="select2-placeholder-single">
                                        <option value="" selected>-select-</option>
                                        @if (isset($users) && count($users) > 0)
                                            @foreach ($users as $item)
                                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>
                            <!-- /Left Chat Title -->

                            <div class="sidebar-body chat-body" id="chatsidebar">
                                <ul class="user-list">
                                    <li class="user-list-item">
                                        <a href="javascript:void(0);">
                                            <div class="avatar">
                                                <img src="{{ asset('assets/img/profiles/avatar-03.jpg') }}"
                                                    class="rounded-circle" alt="image">
                                            </div>
                                            <div class="users-list-body">
                                                <div>
                                                    <h5>Horace Keene</h5>
                                                    <p>Have you called them?</p>
                                                </div>
                                                <div class="last-chat-time">
                                                    <div class="new-message-count">11</div>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- / Chats sidebar -->
                </div>
                <!-- /Sidebar group -->

                <!-- Chat -->
                <div class="chat chat-messages" id="middle" style="display: none;">
                    <div class="slimscroll">
                        <div class="chat-header" style="position: fixed;width: 100%;z-index: 1;">
                            <div class="user-details">
                                <div class="d-lg-none">
                                    <ul class="list-inline mt-2 me-2">
                                        <li class="list-inline-item">
                                            <a class="text-muted px-0 left_sides" href="#" data-chat="open">
                                                <i class="fas fa-arrow-left"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <figure class="avatar ms-1">
                                    <img src="{{ asset('assets/img/profiles/avatar-02.jpg') }}" class="rounded-circle"
                                        alt="image">
                                </figure>
                                <div class="mt-1">
                                    <h5 id="UserName"></h5>
                                </div>
                            </div>
                        </div>
                        <div class="chat-body" id="outer">
                            <div class="messages" id="messages" style="margin-top: 59px;">
                                <!-- Messages will be appended here -->
                            </div>
                        </div>
                    </div>
                    <div>
                        {{-- <div class="chat-footer">
                            <form id="chatUserForm" method="POST">
                                @csrf
                                <div class="smile-foot mb-3">
                                    <button onclick="recordingFunction()" type="button"
                                        class="btn btn-primary action-circle"><i class="bx bx-microphone-off"></i></button>
                                </div>
                                <input type="hidden" class="form-control chat_form mb-3" name="receiver_id" id="receiver_id">
                                <input type="hidden" class="form-control chat_form mb-3" name="sender_id"
                                    value="{{ Auth::user()->id }}">
                                <input type="text" class="form-control chat_form mb-3" required name="message"
                                    id="userMessageInput" placeholder="Type a message...">
                                <div class="form-buttons mb-3">
                                    <button class="btn send-btn" type="submit">
                                        <i class="bx bx-paper-plane"></i>
                                    </button>
                                </div>
                            </form>
                        </div> --}}
                        <div class="chat-footer">
                            <form id="chatUserForm" method="POST">
                                @csrf
                                <div class="chat-controls">
                                    <!-- Microphone Button for Recording -->
                                    <button id="recordBtn" type="button" class="btn btn-primary action-circle" style="margin-right: 10px; margin-bottom: 18px;"
                                        onclick="startRecording()">
                                        <i class="bx bx-microphone"></i>
                                    </button>

                                    <!-- Text Input Field for Chat -->
                                    <input type="hidden" class="form-control chat_form mb-3" name="receiver_id"
                                        id="receiver_id">
                                    <input type="hidden" class="form-control chat_form mb-3" name="sender_id"
                                        value="{{ Auth::user()->id }}">
                                    <input type="text" class="form-control chat_form mb-3" name="message"
                                        id="userMessageInput" placeholder="Type a message..." style="width: 745px;">
                                </div>

                                <!-- Recording Controls: Timer, Cancel, and Send -->
                                <div id="recordingControls" style="display: none;">
                                    <div class="recording-status">
                                        <button id="cancelRecordingBtn" type="button" class="btn btn-primary"
                                            onclick="cancelRecording()" style="margin-bottom: 18px;"><i class="ti ti-x"></i></button>
                                        <span id="recordingTimer" style="margin-bottom: 18px; margin-right: 325px; margin-left: 300px;">00:00</span>
                                        <button id="sendRecordingBtn" type="button" class="btn btn-primary"
                                            onclick="stopRecording()" style="margin-bottom: 18px;"><i class="bx bx-paper-plane"></i></button>
                                    </div>
                                </div>

                                <div id="submitButton" class="form-buttons mb-3">
                                    <button class="btn send-btn" type="submit">
                                        <i class="bx bx-paper-plane"></i>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- /Chat -->
            </div>
        </div>
    </div>
    <!-- /Main Wrapper -->
@endsection

@push('scripts')
    <!-- Include Socket.IO -->
    <script src="https://cdn.socket.io/4.0.0/socket.io.min.js"></script>

    <!-- Define URLs based on user role -->
    @if (Auth::guard('admin')->check())
        <script>
            var sendMessageUrl = "{{ route('admin.send-message') }}";
            var getMessageUrl = "{{ route('admin.get-messages') }}";
        </script>
    @else
        <script>
            var sendMessageUrl = "{{ route('employee.send-message') }}";
            var getMessageUrl = "{{ route('employee.get-messages') }}";
        </script>
    @endif

    <script>
        // Initialize Socket.IO
        const socket = io('http://127.0.0.1:3000');
        const userId = "{{ Auth::user()->id }}"; // Current logged-in user

        // Register the user with a unique room
        socket.emit('register', userId);

        // Function to format time (Helper Function)
        function formatTime(date) {
            const hours = date.getHours();
            const minutes = date.getMinutes();
            const ampm = hours >= 12 ? 'PM' : 'AM';
            const formattedHours = hours % 12 || 12;
            const formattedMinutes = minutes < 10 ? '0' + minutes : minutes;
            return `${formattedHours}:${formattedMinutes} ${ampm}`;
        }

        // Function to get user chat (Make it globally accessible)
        window.getUserChat = function(selectElement) {
            const selectedUserId = selectElement.value;
            const userName = selectElement.options[selectElement.selectedIndex].text;

            if (selectedUserId) {
                $('#receiver_id').val(selectedUserId);
                $('#UserName').html(userName);
                $('#middle').show();

                // Load previous chat messages for this user
                loadChatMessages(selectedUserId);
            } else {
                console.log('No user selected');
            }
        };

        // Function to load chat messages
        function loadChatMessages(receiverId) {
            $.ajax({
                url: getMessageUrl,
                method: "GET",
                data: {
                    receiver_id: receiverId
                },
                success: function(messages) {
                    $('#messages').empty();
                    messages.forEach(message => {
                        
                        const messageDiv = document.createElement('div');
                        messageDiv.className = message.sender_id == userId ? 'chats chats-right' :
                            'chats chats-left';

                        // Format time
                        const messageTime = new Date(message.created_at);
                        const hours = messageTime.getHours();
                        const minutes = messageTime.getMinutes();
                        const ampm = hours >= 12 ? 'PM' : 'AM';
                        const formattedHours = hours % 12 || 12;
                        const formattedMinutes = minutes < 10 ? '0' + minutes : minutes;
                        const formattedTime = `${formattedHours}:${formattedMinutes} ${ampm}`;

                        if (message.message === null) {
                            var audioUrl = "{{ asset('') }}" + message.audio;                            
                            messageDiv.innerHTML = `
                                    <div class="chat-content">
                                        <div class="chat-profile-name">
                                            <span style="margin-left:auto">${formattedTime}</span>
                                        </div>
                                        <audio controls src="${audioUrl}"></audio>
                                    </div>
                                `;
                        }else{
                            messageDiv.innerHTML = `
                                <div class="chat-content">
                                    <div class="chat-profile-name">
                                        <span style="margin-left:auto">${formattedTime}</span>
                                    </div>
                                    <div class="message-content">
                                        ${message.message}
                                    </div>
                                </div>
                            `;
                        }
                        $('#messages').append(messageDiv);
                    });

                    // Scroll to the bottom of the chat
                    $('#messages').scrollTop($('#messages')[0].scrollHeight);
                },
                error: function(xhr) {
                    console.log(xhr.responseText);
                }
            });
        }

        // Document Ready Function
        $(document).ready(function() {
            // Sending message
            $("#chatUserForm").on('submit', function(e) {
                e.preventDefault(); // Prevent form submission

                const messageInput = $('#userMessageInput').val().trim();
                const receiverId = $('#receiver_id').val(); // Get the selected receiver ID
                const senderId = userId; // The current user ID

                if (messageInput && receiverId) {
                    // Emit the message to the server
                    socket.emit('sendMessage', {
                        message: messageInput,
                        targetUserId: receiverId,
                        senderId: senderId
                    });

                    // Clear the input after sending
                    $('#userMessageInput').val('');
                    // Optionally send the message to the server for storing
                    $.ajax({
                        url: sendMessageUrl,
                        method: "POST",
                        headers: {
                            'X-CSRF-TOKEN': "{{ csrf_token() }}"
                        },
                        data: {
                            message: messageInput,
                            sender_id: senderId,
                            receiver_id: receiverId
                        },
                        success: function(response) {
                            console.log('Message stored successfully');
                        },
                        error: function(xhr) {
                            console.log(xhr.responseText);
                        }
                    });
                }
            });

            socket.on('receiveMessage', function(data) {
                const { message, from, to, senderSide, audioBlob } = data;
                const currentReceiverId = $('#receiver_id').val(); // Get the receiver ID of the current chat window

                // Only display the message if it's meant for the current chat window
                if ((senderSide && to === currentReceiverId) || (!senderSide && from === currentReceiverId)) {
                    const messageDiv = document.createElement('div');
                    messageDiv.className = senderSide ? 'chats chats-right' : 'chats chats-left'; // Align based on sender/receiver

                    const time = formatTime(new Date()); // Format current time

                    let messageContent = '';

                    // Check if the message contains audio data
                    if (audioBlob) {
                        // Decode base64 into an actual Blob
                        const byteCharacters = atob(audioBlob.split(',')[1]);
                        const byteNumbers = new Array(byteCharacters.length);
                        for (let i = 0; i < byteCharacters.length; i++) {
                            byteNumbers[i] = byteCharacters.charCodeAt(i);
                        }
                        const byteArray = new Uint8Array(byteNumbers);
                        const blob = new Blob([byteArray], { type: 'audio/wav' });

                        // Create an audio element for the received audio message
                        const audioElement = document.createElement('audio');
                        const audioURL = URL.createObjectURL(blob); // Create a Blob URL
                        audioElement.src = audioURL;
                        audioElement.controls = true;
                        messageContent = audioElement.outerHTML; // Add the audio element to the message
                    } else {
                        // Sanitize message content to prevent XSS
                        const sanitizedMessage = $('<div>').text(message).html(); // Escape HTML in the message
                        messageContent = `<div class="message-content">${sanitizedMessage}</div>`;
                    }

                    messageDiv.innerHTML = `
                        <div class="chat-content">
                            <div class="chat-profile-name">
                                <span style="margin-left:auto">${time}</span>
                            </div>
                            ${messageContent}
                        </div>
                    `;

                    // Append the message to the chat
                    $('#messages').append(messageDiv);

                    // Scroll to the bottom of the chat
                    scrollToBottom();
                }
            });


            function scrollToBottom() {
                const chatContainer = document.getElementById('messages');
                chatContainer.scrollTop = chatContainer.scrollHeight;
            }

        });
    </script>
    <script>
        let mediaRecorder;
        let audioChunks = [];
        let recordingStartTime;
        let recordingInterval;

        function startRecording() {
            // Hide the text input and show recording controls
            $('#userMessageInput').hide();
            $('#submitButton').hide();
            $('#recordingControls').show();

            // Request permission to access the microphone
            navigator.mediaDevices.getUserMedia({
                audio: true
            }).then(stream => {
                mediaRecorder = new MediaRecorder(stream);
                mediaRecorder.start();

                // Reset timer and start recording timer
                recordingStartTime = Date.now();
                recordingInterval = setInterval(updateRecordingTimer, 1000);

                mediaRecorder.addEventListener("dataavailable", event => {
                    audioChunks.push(event.data);
                });
            }).catch(error => {
                console.error('Error accessing microphone: ', error);
            });
        }

        function updateRecordingTimer() {
            const elapsedTime = Date.now() - recordingStartTime;
            const minutes = Math.floor(elapsedTime / 60000);
            const seconds = Math.floor((elapsedTime % 60000) / 1000);
            $('#recordingTimer').text(`${padTime(minutes)}:${padTime(seconds)}`);
        }

        function padTime(time) {
            return time < 10 ? `0${time}` : time;
        }

        function stopRecording() {
            // Stop the media recorder and send the audio file
            mediaRecorder.stop();

            mediaRecorder.addEventListener("stop", () => {
                audio: false
                const audioBlob = new Blob(audioChunks);
                sendAudioMessage(audioBlob);

                // Clear the recording data
                clearInterval(recordingInterval);
                audioChunks = [];

                // Reset the UI to show the text input again
                $('#userMessageInput').show();
                $('#submitButton').show();
                $('#recordingControls').hide();
                $('#recordingTimer').text('00:00');
            });
        }

        function cancelRecording() {
            // Stop the media recorder and discard the audio data
            mediaRecorder.stop();

            // Clear the recording data
            clearInterval(recordingInterval);
            audioChunks = [];

            // Reset the UI to show the text input again
            $('#userMessageInput').show();
            $('#submitButton').show();
            $('#recordingControls').hide();
            $('#recordingTimer').text('00:00');
        }
        function sendAudioMessage(audioBlob) {
            const targetUserId = $('#receiver_id').val();
            const senderId = '{{ Auth::user()->id }}';
            
            const reader = new FileReader();
            reader.readAsDataURL(audioBlob); // Convert the Blob to a data URL
            reader.onloadend = function () {
                const base64Audio = reader.result;
                // Emit the audio message via the socket
                socket.emit('sendMessage', {
                    message: '', // No text message, only audio
                    targetUserId,
                    senderId,
                    audioBlob: base64Audio // Send the base64 encoded audio
                });
            };

            // Optionally, send the audio message via AJAX if needed (for database saving)
            const formData = new FormData();
            formData.append('audio_file', audioBlob, 'audioMessage.wav');
            formData.append('sender_id', senderId);
            formData.append('receiver_id', targetUserId);

            $.ajax({
                url: sendMessageUrl, // The appropriate URL for sending the message
                type: 'POST',
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}",
                },
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    console.log('Audio message sent successfully via AJAX');
                },
                error: function(xhr) {
                    console.log('Error sending audio message:', xhr.responseText);
                }
            });
        }

    </script>
@endpush
