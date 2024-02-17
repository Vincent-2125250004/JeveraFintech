<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-md text-gray-800 leading-tight dark:text-white">
            {{ __('Delivery Order/Data Delivery Order/Tambah Delivery Order') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex justify-end m-2 p-2">
                <a href="{{ route('pencatatan.do.index') }}"
                    class="inline-flex items-center px-4 py-2 bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-500 rounded-md font-semibold text-xs text-gray-700 dark:text-gray-300 uppercase tracking-widest shadow-sm hover:bg-gray-50 dark:hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 disabled:opacity-25 transition ease-in-out duration-150">
                    Data Delivery Order
                </a>
            </div>

            <div class="relative overflow-x-auto">
                <div class="bg-white dark:bg-gray-700 rounded shadow-lg p-4 px-4 md:p-8 mb-6">
                    <div class="grid gap-4 gap-y-2 text-sm grid-cols-1 lg:grid-cols-3">
                        <div class="text-black dark:text-white">
                            <p class="font-medium text-lg">Tambah Delivery Order</p>
                            <p>Mohon pastikan semua form telah terisi dengan lengkap.</p>
                        </div>

                        <div class="lg:col-span-2">
                            <form method="POST" action="{{ route('pencatatan.do.store') }}">
                                @csrf
                                <div class="grid gap-4 gap-y-2 text-sm grid-cols-1 md:grid-cols-6">
                                    <div class="md:col-span-3">
                                        <label for="no_do" class="text-black dark:text-white">Nomor Delivery Order</label>
                                        <input type="text" name="no_do" id="no_do"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-400 focus:border-primary-400 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-200 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" value="" required="" placeholder="Nomor Delivery Order"/>
                                        @error('no_do')
                                            <div class="text-sm text-red-400">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="md:col-span-3">
                                        <label for="tanggal_do" class="text-black dark:text-white">Tanggal</label>
                                        <input type="date" name="tanggal_do" id="tanggal_do"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-400 focus:border-primary-400 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-200 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" value="" required="" 
                                            placeholder="" />
                                        @error('tanggal_do')
                                            <div class="text-sm text-red-400">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="md:col-span-3">
                                        <label for="nomor_polisi" class="text-black dark:text-white">Nomor Polisi</label>
                                        <select id="nomor_polisi" name="nomor_polisi"
                                            class="bg-gray-50 border border-gray-200 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-200 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 mt-1" 
                                            onchange="updateNomorLambung(this)">
                                            <option value="" disabled selected>Silahkan dipilih</option>
                                            @foreach ($mobil as $mobils)
                                                <option value="{{ $mobils->Nomor_Polisi }}"
                                                    data-nomor-lambung="{{ $mobils->Nomor_Lambung }}">
                                                    {{ $mobils->Nomor_Polisi }}</option>
                                            @endforeach
                                        </select>
                                        @error('nomor_polisi')
                                            <div class="text-sm text-red-400">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="md:col-span-3">
                                        <label for="nomor_lambung" class="text-black dark:text-white">Nomor Lambung</label>
                                        <input type="text" name="nomor_lambung" id="nomor_lambung"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-400 focus:border-primary-400 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-200 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" value="" required="" placeholder="Nomor Lambung"
                                            placeholder="" readonly />
                                        @error('nomor_lambung')
                                            <div class="text-sm text-red-400">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="md:col-span-3">
                                        <label for="sjb_muat" class="text-black dark:text-white">SJB Muat</label>
                                        <input type="text" name="sjb_muat" id="sjb_muat"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-400 focus:border-primary-400 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-200 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" value="" required="" placeholder="SJB Muat"
                                            placeholder="" />
                                        @error('sjb_muat')
                                            <div class="text-sm text-red-400">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="md:col-span-3">
                                        <label for="sjb_bongkar" class="text-black dark:text-white">SJB Bongkar</label>
                                        <input type="text" name="sjb_bongkar" id="sjb_bongkar"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-400 focus:border-primary-400 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-200 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" value="" required="" placeholder="SJB Bongkar"
                                            placeholder="" />
                                        @error('sjb_bongkar')
                                            <div class="text-sm text-red-400">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="md:col-span-3">
                                        <label for="rute" class="text-black dark:text-white">Rute</label>
                                        <select id="rute" name="rute"
                                            class="bg-gray-50 border border-gray-200 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-200 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 mt-1">
                                            <option value="" disabled selected>Silahkan dipilih</option>
                                            @foreach ($rute as $rutes)
                                                <option value="{{ $rutes->id }}">
                                                    {{ $rutes->id }} ::
                                                    {{ $rutes->Asal_Rute }} - {{ $rutes->Tujuan_Rute }}</option>
                                            @endforeach
                                        </select>
                                        @error('rute')
                                            <div class="text-sm text-red-400">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="md:col-span-3">
                                        <label for="tonase" class="text-black dark:text-white">Tonase</label>
                                        <input type="text" name="tonase" id="tonase"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-400 focus:border-primary-400 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-200 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" value="" required="" placeholder="Tonase"
                                            placeholder="" />
                                        @error('tonase')
                                            <div class="text-sm text-red-400">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="md:col-span-3">
                                        <label for="status" class="text-black dark:text-white">Status</label>
                                        <select id="status" name="status"
                                            class="bg-gray-50 border border-gray-200 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-200 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                            @foreach (App\Enums\StatusDO::cases() as $status)
                                                <option value="{{ $status->value }}">
                                                    {{ $status->value }}</option>
                                            @endforeach
                                        </select>
                                        @error('tonase')
                                            <div class="text-sm text-red-400">{{ $message }}</div>
                                        @enderror
                                    </div>



                                    <div class="md:col-span-6 text-right mt-10">
                                        <div class="inline-flex items-end">
                                            <button type="submit"
                                                class="inline-flex items-center px-4 py-2 bg-sky-500 dark:bg-sky-500 border border-gray-300 dark:border-gray-500 rounded-md font-semibold text-xs text-white dark:text-white uppercase tracking-widest shadow-sm hover:bg-emerald-600 dark:hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 disabled:opacity-25 transition ease-in-out duration-150">Submit</button>
                                        </div>
                                    </div>

                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <script>
        function updateNomorLambung(selectElement) {
            const selectedOption = selectElement.options[selectElement.selectedIndex];
            const nomorLambungInput = document.getElementById('nomor_lambung');
            nomorLambungInput.value = selectedOption.getAttribute('data-nomor-lambung');
        }
    </script>

</x-app-layout>
