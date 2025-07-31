@extends('frontend.user.layouts.master')

@section('user-content')
    <h2 class="text-2xl font-bold mb-6 text-gray-900 dark:text-white">Messages from Users</h2>

    @if($messages->isEmpty())
        <div class="bg-white dark:bg-gray-800 p-6 rounded shadow text-gray-700 dark:text-gray-300">
            No messages received yet.
        </div>
    @else
        <div class="space-y-6">
            @foreach($messages as $message)
                <div class="bg-white dark:bg-gray-800 p-5 rounded-lg shadow flex flex-col sm:flex-row sm:justify-between sm:items-start gap-4">
                    <div class="space-y-2 flex-1">
                        <h4 class="text-lg font-semibold text-gray-900 dark:text-white">
                            From: {{ $message->sender->name ?? 'Unknown User' }}
                        </h4>
                        <p class="text-sm text-gray-600 dark:text-gray-400">
                            Property: <span class="font-medium">{{ $message->property->title ?? 'N/A' }}</span>
                        </p>
                        <p class="text-sm text-gray-600 dark:text-gray-400">
                            Email:
                            @if(!empty($message->sender->email))
                                <a href="mail:{{ $message->sender->email }}" class="text-blue-600 hover:underline">
                                    <i class="fas fa-email mr-1"></i>{{ $message->sender->email }}
                                </a>
                            @else
                                N/A
                            @endif
                        </p>
                        <p class="text-sm text-gray-600 dark:text-gray-400">
                            Phone:
                            @if(!empty($message->sender->phone))
                                <a href="tel:{{ $message->sender->phone }}" class="text-blue-600 hover:underline">
                                    <i class="fas fa-phone mr-1"></i>{{ $message->sender->phone }}
                                </a>
                            @else
                                N/A
                            @endif
                        </p>
                        <p class="text-sm text-gray-600 dark:text-gray-400">
                            WhatsApp:
                            @if(!empty($message->sender->whatsapp))
                                <a href="https://wa.me/{{ $message->sender->whatsapp }}" target="_blank"
                                    class="text-green-600 hover:underline">
                                    <i class="fab fa-whatsapp mr-1"></i> {{ $message->sender->whatsapp }}
                                </a>
                            @else
                                N/A
                            @endif
                        </p>
                        <p class="text-xs text-gray-500 dark:text-gray-400">
                            {{ $message->created_at->diffForHumans() }}
                        </p>
                    </div>

                    <div class="flex flex-col sm:flex-row sm:items-center gap-2">
                        <!-- View Button -->
                        <button
                            class="bg-blue-600 text-white px-4 py-1.5 rounded hover:bg-blue-700 text-sm"
                            onclick="showMessageModal(`{{ addslashes($message->message) }}`, `{{ $message->sender->name }}`, `{{ $message->property->title }}`)">
                            <i class="fas fa-eye mr-1"></i> View
                        </button>

                        <!-- Delete Button -->
                        <form action="{{ route('messages.destroy', $message->id) }}" method="POST"
                            onsubmit="return confirm('Delete this message?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="bg-red-600 text-white px-4 py-1.5 rounded hover:bg-red-700 text-sm">
                                <i class="fas fa-trash-alt mr-1"></i> Delete
                            </button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    @endif

    <!-- Message Modal -->
    <div id="messageModal"
        class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center z-50 px-4"
        style="display: none;">
        <div class="bg-white dark:bg-gray-800 rounded-lg w-full max-w-lg p-6 relative">
            <h3 class="text-xl font-bold mb-4 text-gray-900 dark:text-white">Message Detail</h3>
            <p class="text-sm mb-2 text-gray-700 dark:text-gray-300"><strong>Sender:</strong> <span id="modalSender"></span></p>
            <p class="text-sm mb-4 text-gray-700 dark:text-gray-300"><strong>Property:</strong> <span id="modalProperty"></span></p>
            <div class="p-4 bg-gray-100 dark:bg-gray-700 rounded text-gray-900 dark:text-gray-100 whitespace-pre-wrap"
                id="modalMessage"></div>
            <button onclick="closeMessageModal()"
                class="absolute top-3 right-3 text-gray-500 hover:text-gray-700 dark:hover:text-white">
                <i class="fas fa-times"></i>
            </button>
        </div>
    </div>
@endsection

@push('main_scripts')
<script>
    function showMessageModal(message, sender, property) {
        document.getElementById('modalMessage').textContent = message;
        document.getElementById('modalSender').textContent = sender;
        document.getElementById('modalProperty').textContent = property;
        document.getElementById('messageModal').style.display = 'flex';
    }

    function closeMessageModal() {
        document.getElementById('messageModal').style.display = 'none';
    }
</script>
@endpush
