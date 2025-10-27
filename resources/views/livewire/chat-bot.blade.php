<div class="fixed bottom-5 right-5 z-50" x-data="{ open: @entangle('open') }">
    <!-- Toggle Button -->
    <button @click="open = !open" class="bg-blue-600 text-white p-4 rounded-full shadow-lg hover:bg-blue-700 transition">
        <i class="ri-chat-1-line text-2xl"></i>
    </button>

    <!-- Chat Window -->
    <div x-show="open" x-transition class="w-80 max-w-full bg-white rounded-xl shadow-xl mt-2 overflow-hidden flex flex-col">
        <!-- Header -->
        <div class="bg-blue-600 text-white p-4 font-semibold flex justify-between items-center">
            ChatBot eLapor
            <div class="flex space-x-2">
                <button wire:click="clearChat" class="text-white text-sm px-2 py-1 bg-red-500 rounded hover:bg-red-600">Clear</button>
                <button @click="open = false" class="text-white text-xl">&times;</button>
            </div>
        </div>

        <!-- Messages -->
        <div class="p-4 h-64 overflow-y-auto space-y-3 flex-1">
            @foreach($messages as $msg)
                @if($msg['user'])
                    <div class="text-right">
                        <span class="inline-block bg-blue-600 text-white px-3 py-2 rounded-xl">{{ $msg['text'] }}</span>
                    </div>
                @else
                    <div class="text-left">
                        <span class="inline-block bg-gray-100 px-3 py-2 rounded-xl">{{ $msg['text'] }}</span>
                    </div>
                @endif
            @endforeach
        </div>

        <!-- Input -->
        <form wire:submit.prevent="sendMessage" class="flex border-t border-gray-200">
            <input type="text" wire:model.defer="input" placeholder="Tanya sesuatu..." class="flex-1 px-4 py-2 focus:outline-none">
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 hover:bg-blue-700 transition">
                <i class="ri-send-plane-fill"></i>
            </button>
        </form>
    </div>
</div>
