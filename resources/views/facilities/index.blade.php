<x-app-layout>
    <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
        <div class="relative z-10" aria-labelledby="modal-title" role="dialog" aria-modal="true">
            <h2>Nova Instalación</h2>
            <form method="POST" action="{{ route('facilities.store') }}">
                @csrf
                <div>
                    <input type="text"
                           name="name"
                           placeholder="{{ __('Nome da instalación') }}"
                           class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                </div>

                <div>
                <textarea
                    name="description"
                    placeholder="{{ __('Descripción da instalación') }}"
                    class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                >{{ old('message') }}</textarea>
                </div>

                <div>
                    <label for="province">Provincia:</label>

                    <select name="province" id="provinces">
                        @foreach($provinces as $province)
                            <option value="{{ $province->id }}">{{ $province->name }}</option>
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
                    <th>Provincia</th>
                </tr>
                <tbody>
                @foreach($facilities as $facility)
                    <tr>
                        <td>{{ $facility->name }}</td>
                        <td>{{ $facility->description }}</td>
                        <td>{{ $facility->province->name }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

    </div>
</x-app-layout>
