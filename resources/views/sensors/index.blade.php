<x-app-layout>
    <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
        <div class="relative z-10" aria-labelledby="modal-title" role="dialog" aria-modal="true">
            <h2>Novo Sensor</h2>
            <form method="POST" action="{{ route('sensors.store') }}">
                @csrf
                <div>
                    <input type="text"
                           name="name"
                           placeholder="{{ __('Nome do Sensor') }}"
                           class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                </div>

                <div>
                <textarea
                    name="description"
                    placeholder="{{ __('Descripción do sensor') }}"
                    class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                >{{ old('description') }}</textarea>
                </div>

                <div>
                    <label for="facility">Instalación:</label>

                    <select name="area" id="areas">
                        @foreach($areas as $area)
                            <option value="{{ $area->id }}">{{ $area->name }}</option>
                        @endforeach
                    </select>
                </div>

                <x-input-error :messages="$errors->get('message')" class="mt-2"/>
                <x-primary-button class="mt-4">{{ __('Gardar') }}</x-primary-button>
            </form>
        </div>

        <br>
        <br>

        <div>
            <h1>Lista de Instalacións</h1>
            <table class="table">
                <tr class="table-header-group">
                    <th>Nome</th>
                    <th>Descripción</th>
                    <th>Instalación</th>
                    <th>Área</th>
                </tr>
                <tbody>
                @foreach($sensors as $sensor)
                    <tr>
                        <td>{{ $sensor->name }}</td>
                        <td>{{ $sensor->description }}</td>
                        <td>{{ $sensor->area->facility->name }}</td>
                        <td>{{ $sensor->area->name }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

    </div>
</x-app-layout>
