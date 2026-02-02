@extends('shared.layout.employer')
@section('content')

    <!-- Breadcrumb Area -->
    {{-- <div class="breadcrumb-area">
        <h1>Messages</h1>
        <ol class="breadcrumb">
            <li class="item"><a href="#">Home</a></li>
            <li class="item"><a href="#">Dashboard</a></li>
            <li class="item">Messages</li>
        </ol>
    </div>
    <!-- End Breadcrumb Area -->

    <!-- Start Messages Area -->
    <div class="chat-content-area">
        <div class="sidebar-left">
            <div class="sidebar"> --}}

                

                {{-- <div class="sidebar-content d-flex chat-sidebar" data-simplebar="init"><div class="simplebar-wrapper" style="margin: 0px;"><div class="simplebar-height-auto-observer-wrapper"><div class="simplebar-height-auto-observer"></div></div><div class="simplebar-mask"><div class="simplebar-offset" style="right: -20px; bottom: 0px;"><div class="simplebar-content-wrapper" style="height: 100%; padding-right: 20px; padding-bottom: 0px; overflow: hidden scroll;"><div class="simplebar-content" style="padding: 0px;">
                                        <div class="chat-menu">
                                            <label class="d-block list-group-label mt-0">Chats</label>

                                            <ul class="list-group list-group-user list-unstyled mb-0">
                                                @foreach($messages as $row)
                                                    @if(\Illuminate\Support\Facades\Request::segment(1) === "employer")
                                                        <a href="{{url('/employer/messages'.'/'.$row->identity)}}">
                                                        @elseif(\Illuminate\Support\Facades\Request::segment(1) === "user")
                                                        <a href="{{url('/user/messages'.'/'.$row->identity)}}">
                                                            @else
                                                                <a href="{{url('/admin/secure/user/messages'.'/'.$row->identity)}}">
                                                        @endif

                                                        <li>
                                                            <div class="d-flex align-items-center">
                                                                <div class="avatar me-3" style="margin: 10px;">
                                                                    @if(!empty($row->profile_image))
                                                                        <img src=" {{asset('profile/photo/'.$row->id.'/'.$row->profile_image)}}"  width="30" height="30" class="rounded-circle" alt="image">
                                                                    @else
                                                                        <img src="{{asset('icon_02.jpeg')}}" width="30" height="30" class="rounded-circle" alt="image">
                                                                    @endif
                                                                </div>

                                                                <div class="user-name">
                                                                    <h6>{{$row->full_name}}</h6>
                                                                </div>
                                                            </div>
                                                            <hr />
                                                        </li></a>
                                                @endforeach

                                                @if(\Illuminate\Support\Facades\Request::segment(1) === "admin")
                                                    @else
                                                        @foreach($messages_2 as $rw)
                                                            @if(\Illuminate\Support\Facades\Request::segment(1) === "employer")
                                                                <a href="{{url('/employer/messages'.'/'.$rw->identity)}}">
                                                                    @elseif(\Illuminate\Support\Facades\Request::segment(1) === "user")
                                                                        <a href="{{url('/user/messages'.'/'.$rw->identity)}}">
                                                                            @else
                                                                                <a href="{{url('/admin/secure/user/messages'.'/'.$rw->identity)}}">
                                                                                    @endif

                                                                                    <li>
                                                                                        <div class="d-flex align-items-center">
                                                                                            <div class="avatar me-3" style="margin: 10px;">

                                                                                                @if($rw->receiver_id == 1)
                                                                                                    @if(!empty($rw->profile_image))
                                                                                                        <img src=" {{asset('profile/photo/'.$rw->receiver_id .'/'.$rw->profile_image)}}"  width="30" height="30" class="rounded-circle" alt="image">
                                                                                                    @else
                                                                                                        <img src="{{asset('icon_02.jpeg')}}" width="30" height="30" class="rounded-circle" alt="image">
                                                                                                    @endif
                                                                                                @else
                                                                                                    @if(!empty($rw->profile_image))
                                                                                                        <img src=" {{asset('profile/photo/'.$rw->id.'/'.$rw->profile_image)}}"  width="30" height="30" class="rounded-circle" alt="image">
                                                                                                    @else
                                                                                                        <img src="{{asset('icon_02.jpeg')}}" width="30" height="30" class="rounded-circle" alt="image">
                                                                                                    @endif
                                                                                                @endif
                                                                                            </div>

                                                                                            <div class="user-name">
                                                                                                <h6>{{$rw->full_name}}</h6>
                                                                                            </div>
                                                                                        </div>
                                                                                        <hr />
                                                                                    </li>
                                                                                </a>

                                                        @endforeach
                                                @endif

                                            </ul>


                                        </div>
                                    </div></div></div></div><div class="simplebar-placeholder" style="width: 250px; height: 725px;"></div></div><div class="simplebar-track simplebar-horizontal" style="visibility: hidden;"><div class="simplebar-scrollbar" style="transform: translate3d(0px, 0px, 0px); display: none;"></div></div><div class="simplebar-track simplebar-vertical" style="visibility: visible;"><div class="simplebar-scrollbar" style="height: 25px; transform: translate3d(0px, 0px, 0px); display: block;"></div></div></div>
            </div>
        </div>

        <div class="content-right">
            <div class="chat-area">
                <div class="chat-list-wrapper">
                    <div class="chat-list">
                        <div class="chat-list-header d-flex align-items-center">

                            <div class="header-left d-flex align-items-center">

                                @if(!empty(Auth::user()->profile_image))
                                    <div class="avatar me-3">
                                        <img src="{{asset('profile/photo/'.Auth::user()->id.'/'.Auth::user()->profile_image)}}"  width="70" height="70" class="rounded-circle" alt="image">
                                        <span class="status-online"></span>
                                    </div>
                                @else
                                    <div class="avatar me-3">
                                        <img src="{{asset('icon_02.jpeg')}}"  width="70" height="70" class="rounded-circle" alt="image">
                                        <span class="status-online"></span>
                                    </div>
                                @endif

                            </div>



                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div> --}}
    <!-- Start Messages Area -->

    {{-- <style>
        :root {
            --primary-color: #191820;
            --secondary-color: #818cf8;
            --accent-color: #c7d2fe;
            --light-bg: #f5f7ff;
            --border-color: #e5e7eb;
        }

       
        .file-upload-input {
            display: none !important;
        }

        .file-preview {
            background: var(--light-bg);
            padding: 8px 12px;
            border-radius: 8px;
            font-size: 0.875rem;
            display: flex;
            align-items: center;
            gap: 8px;
            max-width: 200px;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }

        .preview-container {
            position: absolute;
            bottom: 100%;
            left: 0;
            right: 0;
            padding: 10px;
            background: white;
            border-top: 1px solid var(--border-color);
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
        }

        .preview-item {
            position: relative;
            padding: 5px;
            background: var(--light-bg);
            border-radius: 8px;
        }

        .preview-item img {
            max-width: 100px;
            max-height: 100px;
            border-radius: 8px;
        }

        .remove-preview {
            position: absolute;
            top: -8px;
            right: -8px;
            background: #dc3545;
            color: white;
            border-radius: 50%;
            width: 20px;
            height: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            font-size: 12px;
            border: 2px solid white;
        }


        .chat-wrapper {
            height: calc(100vh - 2rem);
            background: #fff;
            border-radius: 20px;
            box-shadow: 0 8px 24px rgba(79, 70, 229, 0.12);
            overflow: hidden;
            max-width: 1400px;
            margin: 1rem auto;
        }

        .contacts-sidebar {
            width: 360px;
            background: var(--light-bg);
            border-right: 1px solid var(--border-color);
            height: 100%;
            overflow-y: auto;
            transition: all 0.3s ease;
        }

        .sidebar-header {
            background: white;
            padding: 1.5rem;
            border-bottom: 1px solid var(--border-color);
        }

        .sidebar-toggle {
            display: none;
            position: fixed;
            bottom: 20px;
            right: 20px;
            z-index: 1000;
            background: var(--primary-color);
            color: white;
            border-radius: 50%;
            width: 50px;
            height: 50px;
            justify-content: center;
            align-items: center;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }

        

        .contact-item {
            cursor: pointer;
            transition: all 0.3s ease;
            border-radius: 12px;
            margin: 0.5rem;
            background: white;
        }

        .contact-item:hover {
            background-color: white;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(0,0,0,0.05);
        }

        .contact-item.active {
            background-color: white;
            box-shadow: 0 4px 12px rgba(0,0,0,0.05);
        }

        .profile-img {
            width: 48px;
            height: 48px;
            object-fit: cover;
            border: 2px solid white;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        }

        .chat-container {
            height: 100%;
            display: flex;
            flex-direction: column;
        }

        .chat-header {
            background: white;
            border-bottom: 1px solid var(--border-color);
            padding: 1rem 1.5rem;
        }

        .chat-messages {
            flex-grow: 1;
            overflow-y: auto;
            padding: 1.5rem;
            background: var(--light-bg);
        }

        .message {
            max-width: 75%;
            margin-bottom: 1.5rem;
        }

        .message-content {
            padding: 1rem;
            border-radius: 18px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.05);
        }

        .received .message-content {
            background: white;
            color: #374151;
        }

        .sent .message-content {
            background: var(--primary-color);
            color: white;
        }

        .chat-input {
            background: white;
            padding: 1rem 1.5rem;
            border-top: 1px solid var(--border-color);
        }

        .input-wrapper {
            background: var(--light-bg);
            border-radius: 15px;
            padding: 0.5rem;
        }

        .form-control {
            border: none;
            background: transparent;
            padding: 0.5rem 1rem;
        }

        .form-control:focus {
            box-shadow: none;
        }

        .input-icons {
            padding: 0.5rem;
        }

        .input-icons i {
            font-size: 1.2rem;
            padding: 0.5rem;
            border-radius: 10px;
            transition: all 0.3s ease;
        }

        .input-icons i:hover {
            background: var(--accent-color);
            color: var(--primary-color);
        }

        .send-button {
            background: var(--primary-color);
            border: none;
            border-radius: 12px;
            padding: 0.7rem 1.5rem;
            transition: all 0.3s ease;
        }

        .send-button:hover {
            background: var(--secondary-color);
            transform: translateY(-2px);
        }

        .search-input {
            background: white;
            border: 1px solid var(--border-color);
            border-radius: 12px;
            padding: 0.8rem 1.2rem;
        }

        .status-indicator {
            width: 12px;
            height: 12px;
            background: #22c55e;
            border-radius: 50%;
            border: 2px solid white;
            position: absolute;
            bottom: 0;
            right: 0;
        }

        .unread-badge {
            background: var(--primary-color);
            color: white;
            border-radius: 12px;
            padding: 0.2rem 0.6rem;
            font-size: 0.75rem;
        }

          /* Responsive Styles */
          @media (max-width: 768px) {
            .chat-wrapper {
                height: 100vh;
                margin: 0;
                border-radius: 0;
            }

            .contacts-sidebar {
                position: fixed;
                left: -360px;
                top: 0;
                bottom: 0;
                z-index: 1000;
            }

            .contacts-sidebar.active {
                left: 0;
            }

            .sidebar-toggle {
                display: flex;
            }

            .message {
                max-width: 85%;
            }

            .preview-item img {
                max-width: 80px;
                max-height: 80px;
            }
        }

        @media (max-width: 576px) {
            .chat-header {
                padding: 0.5rem;
            }

            .chat-messages {
                padding: 1rem;
            }

            .message {
                max-width: 90%;
            }

            .input-wrapper {
                padding: 0.3rem;
            }
        }
    </style>
<link rel="stylesheet" href="{{ asset('asset/css/template.bundle.css') }}">


<div class="col-md-9">
    <div class="chat-wrapper d-flex">
        <!-- Contacts Sidebar -->
        <div class="contacts-sidebar" style="width: 360px;">
            <div class="sidebar-header">
                <h5 class="mb-4">Messages</h5>
                <input type="search" class="form-control search-input" placeholder="Search conversations...">
            </div>
            <!-- Contact List -->
            <div class="contact-list p-3">
                @foreach($messages as $row)
                                @if(Request::segment(1) === "employer")
                                    <a href="{{ url('/employer/messages/'.$row->identity) }}">
                                @elseif(Request::segment(1) === "user")
                                    <a href="{{ url('/user/messages/'.$row->identity) }}">
                                @else
                                    <a href="{{ url('/admin/secure/user/messages/'.$row->identity) }}">
                                @endif
                <div class="contact-item active p-3">
                    <div class="d-flex align-items-center">
                        <div class="position-relative">
                            @if(!empty($row->profile_image))
                            <img src="{{asset('profile/photo/'.$row->id.'/'.$row->profile_image)}}" alt="John Doe" class="rounded-circle profile-img">
                            @else
                            <img src="" alt="">
                            @endif
                            <span class="status-indicator"></span>
                        </div>
                        <div class="ms-3 flex-grow-1">
                            <h6 class="mb-1 text-muted">{{$row->full_name}}</h6>
                            <p class="mb-0 text-muted small">Hey, how are you doing?</p>
                        </div>
                       
                    </div>
                </div>
                @endforeach
            </div>
        </div>



        <!-- Chat Area -->
        
        <div class="chat-container flex-grow-1 d-flex flex-column">
            <!-- Chat Header -->
            <div class="chat-header">
                <div class="d-flex align-items-center">
                   
                    <div class="position-relative">
                        <img src="/api/placeholder/48/48" alt="John Doe" class="rounded-circle profile-img">
                        <span class="status-indicator"></span>
                    </div>
                    <div class="ms-3">
                        @if(\Illuminate\Support\Facades\Request::segment(1) === "admin")
                        @else
                            @foreach($messages_2 as $rw)
                                @if(\Illuminate\Support\Facades\Request::segment(1) === "employer")
                                    <a href="{{url('/employer/messages'.'/'.$rw->identity)}}">
                                        @elseif(\Illuminate\Support\Facades\Request::segment(1) === "user")
                                            <a href="{{url('/user/messages'.'/'.$rw->identity)}}">
                                                @else
                                                    <a href="{{url('/admin/secure/user/messages'.'/'.$rw->identity)}}">
                                                        @endif
                        <h6 class="mb-1">{{$rw->full_name}}</h6>
                        <small class="text-muted">Active now</small>
                    </div>
                </div>
            </div>

            <!-- Chat Messages -->
            <div class="chat-messages">
                <div class="message received">
                    <div class="message-content">
                        <p class="mb-0">Hey, how are you doing?</p>
                    </div>
                    <small class="text-muted mt-2 d-block">10:30 AM</small>
                </div>

                <div class="message sent ms-auto">
                    <div class="message-content">
                        <p class="mb-0">I'm doing great! Thanks for asking. How about you?</p>
                    </div>
                    <small class="text-muted mt-2 d-block">10:31 AM</small>
                </div>
            </div>

            <!-- Chat Input -->
            <div class="chat-input">
                <form id="chat-form" enctype="multipart/form-data">
                    @csrf
                <div class="input-wrapper d-flex align-items-center">
                    <div class="input-icons d-flex align-items-center">
                        <i class="far fa-smile" id="emoji-trigger" title="Emoji"></i>
                        <i class="fas fa-paperclip" id="attachment-trigger" title="Attachment"></i>
                        <i class="far fa-image" id="image-trigger" title="Image"></i>
                        
                        <!-- Hidden file inputs -->
                        <input type="file" id="attachment-input" class="file-upload-input" name="attachment">
                        <input type="file" id="image-input" class="file-upload-input" name="image" accept="image/*">
                    </div>
                    <input type="text" class="form-control" id="message-input"  placeholder="Type your message..." name="message">
                    <button type="submit" class="send-button btn btn-primary ms-2"> <i class="fas fa-paper-plane"></i> </button>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>





<script src="https://cdn.jsdelivr.net/npm/emoji-mart@5.6.0/+esm"></script> 
    <script>
        class ChatApp {
            constructor() {
                this.initialize();
                this.attachEventListeners();
                this.initializeEmojiPicker();
            }

            initialize() {
                this.elements = {
                    chatForm: document.getElementById('chat-form'),
                    messageInput: document.getElementById('message-input'),
                    previewContainer: document.getElementById('preview-container'),
                    attachmentInput: document.getElementById('attachment-input'),
                    imageInput: document.getElementById('image-input'),
                    attachmentTrigger: document.getElementById('attachment-trigger'),
                    imageTrigger: document.getElementById('image-trigger'),
                    emojiTrigger: document.getElementById('emoji-trigger'),
                    sidebarToggle: document.getElementById('sidebarToggle'),
                    contactsSidebar: document.querySelector('.contacts-sidebar'),
                    chatMessages: document.querySelector('.chat-messages')
                };

                this.messageQueue = [];
                this.isUploading = false;
            }

            attachEventListeners() {
                // File upload triggers
                this.elements.attachmentTrigger?.addEventListener('click', () => this.elements.attachmentInput.click());
                this.elements.imageTrigger?.addEventListener('click', () => this.elements.imageInput.click());
                
                // File input change handlers
                this.elements.attachmentInput?.addEventListener('change', (e) => this.handleFileSelect(e, false));
                this.elements.imageInput?.addEventListener('change', (e) => this.handleFileSelect(e, true));

                // Form submission
                this.elements.chatForm?.addEventListener('submit', (e) => this.handleSubmit(e));

                // Mobile sidebar toggle
                this.elements.sidebarToggle?.addEventListener('click', () => this.toggleSidebar());

                // Contact item clicks
                document.querySelectorAll('.contact-item').forEach(item => {
                    item.addEventListener('click', () => this.handleContactSelect(item));
                });

                // Auto-scroll on new messages
                this.setupAutoScroll();
            }

            initializeEmojiPicker() {
                if (this.elements.emojiTrigger) {
                    const picker = new EmojiMart.Picker({
                        onSelect: (emoji) => {
                            const input = this.elements.messageInput;
                            input.value += emoji.native;
                            input.focus();
                        }
                    });

                    let isVisible = false;
                    this.elements.emojiTrigger.addEventListener('click', () => {
                        if (!isVisible) {
                            document.querySelector('.chat-input').appendChild(picker.element);
                            picker.element.style.position = 'absolute';
                            picker.element.style.bottom = '100%';
                            picker.element.style.left = '0';
                        } else {
                            picker.element.remove();
                        }
                        isVisible = !isVisible;
                    });
                }
            }

            handleFileSelect(event, isImage) {
                const file = event.target.files[0];
                if (!file) return;

                const previewItem = document.createElement('div');
                previewItem.className = 'preview-item';

                if (isImage && file.type.startsWith('image/')) {
                    const reader = new FileReader();
                    reader.onload = (e) => {
                        previewItem.innerHTML = `
                            <img src="${e.target.result}" alt="Preview">
                            <span class="remove-preview">&times;</span>
                        `;
                    };
                    reader.readAsDataURL(file);
                } else {
                    previewItem.innerHTML = `
                        <div class="file-name">${file.name}</div>
                        <span class="remove-preview">&times;</span>
                    `;
                }

                previewItem.querySelector('.remove-preview').addEventListener('click', () => {
                    previewItem.remove();
                    event.target.value = '';
                });

                this.elements.previewContainer.appendChild(previewItem);
            }

            async handleSubmit(e) {
                e.preventDefault();
                if (this.isUploading) return;

                this.isUploading = true;
                const formData = new FormData(e.target);

                try {
                    const response = await fetch('/send-message', {
                        method: 'POST',
                        body: formData,
                        headers: {
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                        }
                    });

                    if (response.ok) {
                        this.elements.messageInput.value = '';
                        this.elements.previewContainer.innerHTML = '';
                        await this.loadMessages();
                    }
                } catch (error) {
                    console.error('Error:', error);
                } finally {
                    this.isUploading = false;
                }
            }

            toggleSidebar() {
                this.elements.contactsSidebar.classList.toggle('active');
            }

            handleContactSelect(contactItem) {
                document.querySelectorAll('.contact-item').forEach(item => {
                    item.classList.remove('active');
                });
                contactItem.classList.add('active');
                
                if (window.innerWidth <= 768) {
                    this.toggleSidebar();
                }
            }

            setupAutoScroll() {
                const observer = new MutationObserver(() => {
                    this.elements.chatMessages.scrollTop = this.elements.chatMessages.scrollHeight;
                });

                observer.observe(this.elements.chatMessages, {
                    childList: true,
                    subtree: true
                });
            }

            async loadMessages() {
                try {
                    const response = await fetch('/get-messages');
                    const messages = await response.json();
                    
                    this.elements.chatMessages.innerHTML = messages.map(message => `
                        <div class="message ${message.is_sender ? 'sent ms-auto' : 'received'}">
                            <div class="message-content">
                                <p class="mb-0">${message.content}</p>
                                ${message.attachment ? `<div class="attachment">${message.attachment}</div>` : ''}
                            </div>
                            <small class="text-muted mt-2 d-block">${message.created_at}</small>
                        </div>
                    `).join('');
                } catch (error) {
                    console.error('Error loading messages:', error);
                }
            }
        }

        // Initialize chat app when DOM is loaded
        document.addEventListener('DOMContentLoaded', () => {
            const chatApp = new ChatApp();
            
            // Set up periodic message refresh
            setInterval(() => chatApp.loadMessages(), 5000);
        });
    </script>
--}}

<div class="col-md-9">
    Coming Soon
</div>

@endsection
