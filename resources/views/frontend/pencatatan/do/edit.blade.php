<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-md text-gray-800 leading-tight text-white">
            {{ __('Delivery Order/Data Delivery Order/Edit Delivery Order') }}
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
                <div class="bg-gray-700 rounded shadow-lg p-4 px-4 md:p-8 mb-6">
                    <div class="grid gap-4 gap-y-2 text-sm grid-cols-1 lg:grid-cols-3">
                        <div class="text-gray-100">
                            <p class="font-medium text-lg">Edit Delivery Order</p>
                            <p>Mohon pastikan semua form telah terisi dengan lengkap.</p>
                        </div>

                        <div class="lg:col-span-2">
                            <form method="POST" action="{{ route('pencatatan.do.update', $do->id) }}">
                                @method('PUT')
                                @csrf
                                <div class="grid gap-4 gap-y-2 text-sm grid-cols-1 md:grid-cols-6">
                                    <div class="md:col-span-3">
                                        <label for="no_do" class="text-gray-100">Nomor Delivery Order</label>
                                        <input type="text" name="no_do" id="no_do"
                                            class="h-10 border mt-1 rounded px-4 w-full bg-gray-100"
                                            value="{{ $do->NO_Do }}" readonly />
                                        @error('no_do')
                                            <div class="text-sm text-red-400">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="md:col-span-3">
                                        <label for="tanggal_do" class="text-gray-100">Tanggal</label>
                                        <input type="date" name="tanggal_do" id="tanggal_do"
                                            class="h-10 border mt-1 rounded px-4 w-full bg-gray-100"
                                            value="{{ $do->Tanggal_Do }}" placeholder="" />
                                        @error('tanggal_do')
                                            <div class="text-sm text-red-400">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="md:col-span-3">
                                        <label for="nomor_polisi" class="text-gray-100">Nomor Polisi</label>
                                        <select id="nomor_polisi" name="nomor_polisi"
                                            class="bg-gray-50 border border-gray-200 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-200 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 mt-1"
                                            onchange="updateNomorLambung(this)">
                                            <option value="" disabled selected>Silahkan dipilih</option>
                                            @foreach ($mobil as $mobils)
                                                <option value="{{ $mobils->Nomor_Polisi }}"
                                                    data-nomor-lambung="{{ $mobils->Nomor_Lambung }}"
                                                    @selected($do->Nomor_Polisi == $mobils->Nomor_Polisi)>
                                                    {{ $mobils->Nomor_Polisi }}</option>
                                            @endforeach
                                        </select>
                                        @error('nomor_polisi')
                                            <div class="text-sm text-red-400">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="md:col-span-3">
                                        <label for="nomor_lambung" class="text-gray-100">Nomor Lambung</label>
                                        <input type="text" name="nomor_lambung" id="nomor_lambung"
                                            class="h-10 border mt-1 rounded px-4 w-full bg-gray-100" value="{{ $do->Nomor_Lambung }}"
                                            placeholder="" readonly />
                                        @error('nomor_lambung')
                                            <div class="text-sm text-red-400">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="md:col-span-3">
                                        <label for="sjb_muat" class="text-gray-100">SJB Muat</label>
                                        <input type="text" name="sjb_muat" id="sjb_muat"
                                            class="h-10 border mt-1 rounded px-4 w-full bg-gray-100"
                                            value="{{ $do->SJB_Muat }}" placeholder="" />
                                        @error('sjb_muat')
                                            <div class="text-sm text-red-400">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="md:col-span-3">
                                        <label for="sjb_bongkar" class="text-gray-100">SJB Bongkar</label>
                                        <input type="text" name="sjb_bongkar" id="sjb_bongkar"
                                            class="h-10 border mt-1 rounded px-4 w-full bg-gray-100"
                                            value="{{ $do->SJB_Bongkar }}" placeholder="" />
                                        @error('sjb_bongkar')
                                            <div class="text-sm text-red-400">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="md:col-span-3">
                                        <label for="rute" class="text-gray-100">Rute</label>
                                        <select id="rute" name="rute"
                                            class="bg-gray-50 border border-gray-200 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-200 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 mt-1">
                                            <option value="" disabled selected>Silahkan dipilih</option>
                                            @foreach ($rute as $rutes)
                                                <option value="{{ $rutes->Asal_Rute }} - {{ $rutes->Tujuan_Rute }}"
                                                    @selected($do->ID_Rute == $rutes->Asal_Rute.' - '.$rutes->Tujuan_Rute)> {{ $rutes->ID_Rute }} ::
                                                    {{ $rutes->Asal_Rute }} - {{ $rutes->Tujuan_Rute }}</option>
                                            @endforeach
                                        </select>
                                        @error('rute')
                                            <div class="text-sm text-red-400">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="md:col-span-3">
                                        <label for="tonase" class="text-gray-100">Tonase</label>
                                        <input type="text" name="tonase" id="tonase"
                                            class="h-10 border mt-1 rounded px-4 w-full bg-gray-100"
                                            value="{{ $do->Tonase }}" placeholder="" />
                                        @error('tonase')
                                            <div class="text-sm text-red-400">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="md:col-span-3">
                                        <label for="status" class="text-gray-100">Status</label>
                                        <select id="status" name="status"
                                            class="bg-gray-50 border border-gray-200 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-200 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                            @foreach (App\Enums\StatusDO::cases() as $status)
                                                <option value="{{ $status->value }}" @selected($do->Status == $status->value)>
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
                                                class="inline-flex items-center px-4 py-2 bg-sky-500 dark:bg-sky-500 border border-gray-300 dark:border-gray-500 rounded-md font-semibold text-xs text-white dark:text-white uppercase tracking-widest shadow-sm hover:bg-emerald-600 dark:hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 disabled:opacity-25 transition ease-in-out duration-150">STORE</button>
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
