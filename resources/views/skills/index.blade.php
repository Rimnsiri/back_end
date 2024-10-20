{{-- resources/views/backend/skills/index.blade.php --}}
@extends('layouts.app')


@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="p-4"><a href="{{ route('skills.create') }}" type="button"
                        class="!mt-8 px-8 py-2.5 bg-blue-500 text-sm text-white hover:bg-blue-600 rounded-sm"
                        data-bs-toggle="modal" data-bs-target="#skillModal">Ajouter un Skill</a>
                </div>
                @if (session('success'))
                    <div class="alert alert-success" id="success-alert">
                        {{ session('success') }}
                    </div>

                    <script type="text/javascript">
                        setTimeout(function() {
                            $('#success-alert').fadeOut('slow');
                        }, 3000); // 3 secondes
                    </script>
                @endif
                <div class="overflow-x-auto font-sans">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-300 whitespace-nowrap">
                            <tr>
                                <th
                                    class="px-4 py-4 text-xs font-semibold tracking-wider text-left text-gray-500 uppercase">
                                    Name</th>
                                <th
                                    class="px-4 py-4 text-xs font-semibold tracking-wider text-left text-gray-500 uppercase">
                                    Searchable</th>
                                <th
                                    class="px-4 py-4 text-xs font-semibold tracking-wider text-left text-gray-500 uppercase">
                                    Image</th>
                                <th
                                    class="px-4 py-4 text-xs font-semibold tracking-wider text-left text-gray-500 uppercase">
                                    Actions</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200 whitespace-nowrap">
                            @foreach ($skills as $skill)
                                <tr>
                                    <td class="px-4 py-4 text-sm text-gray-800">{{ $skill->name }}</td>
                                    <td class="px-4 py-4 text-sm text-gray-800">{{ $skill->issearchable }}</td>
                                    <td class="px-4 py-4 text-sm text-gray-800">
                                        @if ($skill->image)
                                            <img src="{{ Storage::url($skill->image) }}" width="50" height="50"
                                                class="img-fluid" alt="Skill Image">
                                        @else
                                            N/A
                                        @endif
                                    </td>
                                    <td class="px-4 py-4 text-sm text-gray-800">
                                        <!-- Bouton pour ouvrir le modal -->
                                        <a href="#" class="mr-4 text-blue-600" data-bs-toggle="modal"
                                            data-bs-target="#editSkillModal{{ $skill->id }}">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                        </a>





                                        <form action="{{ route('skills.destroy', $skill->id) }}" method="POST"
                                            style="display: inline-block;" id="delete-form">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button" class="text-red-600" onclick="confirmDelete()"><i
                                                    class="fa-solid fa-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
                                <!-- Modal -->
                                <div class="modal fade" id="editSkillModal{{ $skill->id }}" tabindex="-1"
                                    aria-labelledby="editSkillModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="text-xl font-bold text-gray-900 dark:text-white" id="editSkillModalLabel">Edit Skill:
                                                    </h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form method="POST" action="{{ route('skills.update', $skill->id) }}"
                                                    enctype="multipart/form-data">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="mb-4">
                                                        <label for="name" class="block mb-2 font-bold text-gray-700">Skill Name</label>
                                                        <input type="text" class="pl-4 pr-12 py-3.5 bg-white text-[#333] w-full text-sm border-2 border-gray-300 focus:border-[#333] rounded outline-none" id="name"
                                                            name="name" value="{{ $skill->name }}" required>
                                                    </div>
                                                    <div class="mb-4">
                                                        <label for="issearchable" class="block mb-2 font-bold text-gray-700">Consultable</label>
                                                        <input type="checkbox" id="issearchable" name="issearchable" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
                                                            value="1" {{ $skill->issearchable ? 'checked' : '' }}>
                                                    </div>
                                                    <div class="mb-4">
                                                        <label for="image" class="block mb-2 font-bold text-gray-700">Skill Image</label>
                                                        <div>
                                                            <img src="{{ Storage::url($skill->image) }}" height="50"
                                                                width="100" class="h-auto max-w-lg rounded-lg " />
                                                        </div>
                                                        <input type="file" class="block w-full text-sm text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-violet-50 file:text-blue-700 hover:file:bg-violet-100" id="image"
                                                            name="image">
                                                    </div>
                                                    <button type="submit" class="!mt-8 px-8 py-2.5 bg-blue-500 text-sm text-white hover:bg-blue-600 rounded-sm">Update Skill</button>
                                                    <button type="button"  class="!mt-8 px-8 py-2.5 bg-gray-500 text-sm text-white hover:bg-gray-600 rounded-sm"
                                                        data-bs-dismiss="modal">Cancel</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                        </tbody>
                    </table>
                    <div class="mt-4">
                        {{ $skills->links() }}
                    </div>
                </div>

                <!-- Modal create  -->
                <div class="modal fade" id="skillModal" tabindex="-1" aria-labelledby="skillModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="text-xl font-bold text-gray-900 dark:text-white" id="skillModalLabel">Ajouter
                                    un nouveau Skill</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form method="POST" action="{{ route('skills.store') }}" enctype="multipart/form-data">
                                    @csrf

                                    <div class="mb-4">
                                        <label for="name" class="block mb-2 font-bold text-gray-700">Skill
                                            Name</label>
                                        <input type="text"
                                            class="pl-4 pr-12 py-3.5 bg-white text-[#333] w-full text-sm border-2 border-gray-300 focus:border-[#333] rounded outline-none"
                                            id="name" name="name" required>
                                    </div>
                                    <div class="mb-4">
                                        <label for="issearchable"
                                            class="block mb-2 font-bold text-gray-700">Consultable</label>
                                        <input type="checkbox"
                                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
                                            id="issearchable" name="issearchable" value="1">
                                    </div>
                                    <div class="mb-4">
                                        <label for="image" class="block mb-2 font-bold text-gray-700">Skill
                                            Image</label>
                                        <input type="file"
                                            class="block w-full text-sm text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-violet-50 file:text-blue-700 hover:file:bg-violet-100"
                                            id="image" name="image" required>
                                    </div>

                                    <div class="mt-4">
                                        <button type="submit"
                                            class="!mt-8 px-8 py-2.5 bg-blue-500 text-sm text-white hover:bg-blue-600 rounded-sm">Add
                                            Skill</button>
                                        <button type="button"
                                            class="!mt-8 px-8 py-2.5 bg-gray-500 text-sm text-white hover:bg-gray-600 rounded-sm"
                                            data-bs-dismiss="modal">Cancel</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
               




            </div>
        </div>
    </div>
@section('scripts')
    <script>
        function confirmDelete() {
            Swal.fire({
                title: 'Êtes-vous sûr?',
                text: "Vous ne pourrez pas revenir en arrière!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Oui, supprimer!',
                cancelButtonText: 'Annuler'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('delete-form').submit();
                }
            });
        }
    </script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
@endsection
@endsection
