<x-layouts.app>
    <div class="flex h-full w-full flex-1 flex-col gap-4 rounded-xl">
        <button
            x-data
            @click="
                new Toast()
                    .title('Danger')
                    .message('Lorem Ipsum is simply dummy text of the printing and typesetting industry.')
                    .variant('danger')
                    .seconds(3)
                    .send();

                new Toast()
                    .title('Info')
                    .message('It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.')
                    .variant('info')
                    .seconds(3)
                    .send();

                new Toast()
                    .title('Success')
                    .message('Lorem Ipsum is simply dummy text of the printing and typesetting industry.')
                    .variant('success')
                    .seconds(3)
                    .send();

                new Toast()
                    .title('Warning')
                    .message('Lorem Ipsum is simply dummy text of the printing and typesetting industry.')
                    .variant('warning')
                    .seconds(3)
                    .send();

                new Toast()
                    .title('Custom Icon')
                    .message('Custom icon example')
                    .icon('video-camera')
                    .variant('info')
                    .seconds(3)
                    .send();
            "
            class="bg-blue-500 text-white font-bold py-2 px-4 rounded"
        >
            Notify
        </button>
        <div class="grid auto-rows-min gap-4 md:grid-cols-3">
            <div class="relative aspect-video overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700">
                <x-placeholder-pattern class="absolute inset-0 size-full stroke-gray-900/20 dark:stroke-neutral-100/20" />
            </div>
            <div class="relative aspect-video overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700">
                <x-placeholder-pattern class="absolute inset-0 size-full stroke-gray-900/20 dark:stroke-neutral-100/20" />
            </div>
            <div class="relative aspect-video overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700">
                <x-placeholder-pattern class="absolute inset-0 size-full stroke-gray-900/20 dark:stroke-neutral-100/20" />
            </div>
        </div>
        <div class="relative h-full flex-1 rounded-xl border border-neutral-200 dark:border-neutral-700">
            <x-placeholder-pattern class="absolute inset-0 size-full stroke-gray-900/20 dark:stroke-neutral-100/20" />
        </div>
    </div>
</x-layouts.app>
