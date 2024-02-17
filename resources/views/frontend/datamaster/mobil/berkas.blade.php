<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-md text-gray-800 leading-tight dark:text-white">
            {{ __('Data Master/Data Mobil/Berkas') }}
        </h2>
    </x-slot>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="relative overflow-x-auto">
                <div class="bg-white dark:bg-gray-700 rounded shadow-lg p-4 px-4 md:p-8 mb-6">
                    <div class="grid gap-4 gap-y-2 text-sm grid-cols-1 lg:grid-cols-3">
                        <div class="text-black dark:text-white">
                            <p class="font-medium text-lg">Berkas Mobil : {{ $mobil->Nomor_Lambung }}</p>
                        </div>
                    </div>
                    <div class="lg:col-span-2">
                        <div class="row mt-4">
                            <div class="grid gap-4 gap-y-2 text-sm grid-cols-1 md:grid-cols-6">
                                @foreach ($mobil->berkas as $images)
                                    <div class="col-md-3">
                                        <div class="card text-black dark:text-white bg-secondary mb-3" style="max-width: 20rem;">
                                            <div class="card-body">
                                                <a href="{{ asset("berkas-images/$images->images") }}" target="_blank" data-toggle="modal" data-target="#imageModal">
                                                    <img src="{{ asset("berkas-images/$images->images") }}" class="card-img-top">
                                                </a>
                                                <div class="caption  text-center">{{ $images->images }}</div> 
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                                <div class="md:col-span-6 text-right mt-10">
                                    <div class="inline-flex items-end">
                                        <a href="{{ route('datamaster.mobil.index') }}"
                                            class="inline-flex items-center px-4 py-2 bg-yellow-500 dark:bg-yellow-500 border border-gray-300 dark:border-gray-500 rounded-md font-semibold text-xs text-white dark:text-white uppercase tracking-widest shadow-sm hover:bg-emerald-600 dark:hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 disabled:opacity-25 transition ease-in-out duration-150">
                                            Back to Data Mobil</a>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>



                </div>
            </div>
        </div>


    </div>
</x-app-layout>
