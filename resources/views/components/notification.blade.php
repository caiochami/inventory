<div aria-live="assertive" class="fixed inset-0 flex items-end px-4 py-6 pointer-events-none sm:p-6 sm:items-start"
    x-data="{
    open: false,
    type: 'success',
    title: '',
    message: '',
    duration: 0,
    notify(event){
        this.open = true;
        
        const {type, message, title = 'Notification', duration = 5000} = event.detail;

        this.type = type;

        this.title = title;

        this.message = message;

        this.duration = duration;

        setTimeout(() => this.open = false, this.duration);
    }
}" @notify.window="notify($event)">
    <div class="w-full flex flex-col items-center space-y-4 sm:items-end">
        <div class="max-w-sm w-full bg-white shadow-lg rounded-lg pointer-events-auto ring-1 ring-black ring-opacity-5 overflow-hidden"
            x-show="open" x-transition:enter="transform ease-out duration-300 transition"
            x-transition:enter-start="translate-y-2 opacity-0 sm:translate-y-0 sm:translate-x-2"
            x-transition:enter-end="translate-y-0 opacity-100 sm:translate-x-0"
            x-transition:leave="transition ease-in duration-100" x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0">
            <div class="p-4">
                <div class="flex items-start">
                    <div class="flex-shrink-0">
                        <template x-if="type === 'success'">
                            <x-icon name="check-circle" class="h-6 w-6 text-green-500" />
                        </template>

                        <template x-if="type === 'error'">
                            <x-icon name="x-circle" class="h-6 w-6 text-red-500" />
                        </template>

                        <template x-if="type === 'info'">
                            <x-icon name="exclamation-circle" class="h-6 w-6 text-blue-500" />
                        </template>
                    </div>
                    <div class="ml-3 w-0 flex-1 pt-0.5">
                        <p class="text-sm font-medium text-gray-900" x-text="title" />
                        <p class="mt-1 text-sm text-gray-500" x-text="message" />
                    </div>
                    <div class="ml-4 flex-shrink-0 flex">
                        <button @click="open = false"
                            class="bg-white rounded-md inline-flex text-gray-400 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            <span class="sr-only">Close</span>
                            <!-- Heroicon name: solid/x -->
                            <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd"
                                    d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                    clip-rule="evenodd" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
