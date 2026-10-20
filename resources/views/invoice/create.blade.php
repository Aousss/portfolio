<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Generate Invoice') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('invoice.generate') }}" method="POST"
                        x-data="{ items: [{ description: '', quantity: 1, price: 0 }] }">
                        @csrf

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                            <div>
                                <x-input-label for="invoice_number" :value="__('Invoice Number')" />
                                <x-text-input id="invoice_number" name="invoice_number" type="text"
                                    class="mt-1 block w-full" required />
                            </div>
                            <div>
                                <x-input-label for="client_name" :value="__('Client Name')" />
                                <x-text-input id="client_name" name="client_name" type="text" class="mt-1 block w-full"
                                    required />
                            </div>
                            <div>
                                <x-input-label for="client_email" :value="__('Client Email')" />
                                <x-text-input id="client_email" name="client_email" type="email"
                                    class="mt-1 block w-full" required />
                            </div>
                        </div>

                        <div class="mb-6">
                            <h3 class="text-lg font-medium mb-4">Items</h3>
                            <div class="space-y-4">
                                <template x-for="(item, index) in items" :key="index">
                                    <div class="flex flex-wrap gap-4 items-end border-b pb-4">
                                        <div class="flex-1 min-w-[200px]">
                                            <x-input-label x-bind:for="'item_desc_' + index"
                                                :value="__('Description')" />
                                            <x-text-input x-bind:id="'item_desc_' + index"
                                                x-bind:name="'items[' + index + '][description]'" type="text"
                                                class="mt-1 block w-full" required />
                                        </div>
                                        <div class="w-24">
                                            <x-input-label x-bind:for="'item_qty_' + index" :value="__('Qty')" />
                                            <x-text-input x-bind:id="'item_qty_' + index"
                                                x-bind:name="'items[' + index + '][quantity]'" type="number"
                                                class="mt-1 block w-full" required />
                                        </div>
                                        <div class="w-32">
                                            <x-input-label x-bind:for="'item_price_' + index" :value="__('Price')" />
                                            <x-text-input x-bind:id="'item_price_' + index"
                                                x-bind:name="'items[' + index + '][price]'" type="number" step="0.01"
                                                class="mt-1 block w-full" required />
                                        </div>
                                        <button type="button" @click="items.splice(index, 1)"
                                            class="text-red-600 hover:text-red-900 mb-2" x-show="items.length > 1">
                                            Remove
                                        </button>
                                    </div>
                                </template>
                            </div>
                            <button type="button" @click="items.push({ description: '', quantity: 1, price: 0 })"
                                class="mt-4 inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                Add Item
                            </button>
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <x-primary-button>
                                {{ __('Generate PDF') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>