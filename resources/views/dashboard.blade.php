<x-app-layout>
    {{-- <x-slot name="header">
        <h2 class="tw-font-semibold tw-text-xl tw-text-gray-800 tw-leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot> --}}

    <div class="tw-py-12">
        <div class="tw-max-w-7xl tw-mx-auto tw-sm:px-6 tw-lg:px-8">
            <div class="tw-bg-white tw-overflow-hidden tw-shadow-sm tw-sm:rounded-lg">
                <div class="tw-p-6">
                    <div class="tw-mb-3">
                        <label for="exampleFormControlInput1" class="tw-block tw-text-sm tw-font-medium tw-text-gray-700">Email address</label>
                        <input type="email" class="tw-mt-1 tw-block tw-w-full tw-px-3 tw-py-2 tw-border tw-border-gray-300 tw-rounded-md tw-shadow-sm tw-focus:outline-none tw-focus:ring tw-focus:ring-indigo-200 tw-focus:border-indigo-300 sm:tw-text-sm" id="exampleFormControlInput1" placeholder="name@example.com">
                    </div>
                    <div class="tw-mb-3">
                        <label for="exampleFormControlTextarea1" class="tw-block tw-text-sm tw-font-medium tw-text-gray-700">Example textarea</label>
                        <textarea class="tw-mt-1 tw-block tw-w-full tw-px-3 tw-py-2 tw-border tw-border-gray-300 tw-rounded-md tw-shadow-sm tw-focus:outline-none tw-focus:ring tw-focus:ring-indigo-200 tw-focus:border-indigo-300 sm:tw-text-sm" id="exampleFormControlTextarea1" rows="3"></textarea>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

