{{-- resources/views/backend/skills/index.blade.php --}}
@extends('layouts.app')


@section('content')
    <div class="container">
        <div class="row">
            <div class="mt-4 col-md-12">
                
                @if (session('success'))
                    <div class="flex items-center max-sm:mb-2 alert" id="success-alert">
                        <!-- component -->
                        <!-- Global notification live region, render this permanently at the end of the document -->
                        <div aria-live="assertive"
                            class="fixed inset-0 flex items-end px-4 py-6 pointer-events-none sm:items-start sm:p-6">
                            <div class="flex flex-col items-center w-full space-y-4 sm:items-end">
                                <div
                                    class="w-full max-w-sm overflow-hidden bg-white rounded-lg shadow-lg pointer-events-auto ring-1 ring-black ring-opacity-5">
                                    <div class="p-4">
                                        <div class="flex items-start">
                                            <div class="flex-shrink-0">
                                                <svg class="w-6 h-6 text-green-400" fill="none" viewBox="0 0 24 24"
                                                    stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                </svg>
                                            </div>
                                            <div class="ml-3 w-0 flex-1 pt-0.5">
                                                <p class="text-sm font-medium text-gray-900">Mise à jour réussie !</p>
                                            </div>
                                            <div class="flex flex-shrink-0 ml-4">
                                                <button type="button"
                                                    class="inline-flex text-gray-400 bg-white rounded-md hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                                                    <span class="sr-only">Close</span>
                                                    <svg class="w-5 h-5" viewBox="0 0 20 20" fill="currentColor"
                                                        aria-hidden="true">
                                                        <path
                                                            d="M6.28 5.22a.75.75 0 00-1.06 1.06L8.94 10l-3.72 3.72a.75.75 0 101.06 1.06L10 11.06l3.72 3.72a.75.75 0 101.06-1.06L11.06 10l3.72-3.72a.75.75 0 00-1.06-1.06L10 8.94 6.28 5.22z" />
                                                    </svg>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <script type="text/javascript">
                        setTimeout(function() {
                            $('#success-alert').fadeOut('slow');
                        }, 3000); // 3 secondes
                    </script>
                @endif
                <div class="p-0 bg-white block sm:flex items-center justify-between border-b border-gray-200 lg:mt-1.5">
                    <div class="w-full mb-1">
                        <div class="mb-4">
                            <nav class="flex mb-5" aria-label="Breadcrumb">
                                <ol class="inline-flex items-center space-x-1 md:space-x-2">
                                    <li class="inline-flex items-center">
                                        <a href="/dashboard"
                                            class="inline-flex items-center text-gray-700 hover:text-gray-900">
                                            <svg class="w-5 h-5 mr-2.5" fill="currentColor" viewBox="0 0 20 20"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z">
                                                </path>
                                            </svg>
                                            Home
                                        </a>
                                    </li>
                                    <li>
                                        <div class="flex items-center">
                                            <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd"
                                                    d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                                    clip-rule="evenodd"></path>
                                            </svg>
                                            <a href="#"
                                                class="ml-1 text-sm font-medium text-gray-700 hover:text-gray-900 md:ml-2">compétences</a>
                                        </div>
                                    </li>
                                </ol>
                            </nav>
                        </div>
                        <div class="items-center sm:flex">
                            <div class="items-center hidden mt-2 mb-3 sm:flex sm:divide-x sm:divide-gray-100 sm:mb-0">
                                    <label for="users-search" class="sr-only">Recherche</label>
                                    <div class="relative mt-1 lg:w-64 xl:w-96">
                                        <input type="text" id="skills-search" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5" placeholder="Recherche de compétences" onkeyup="filterSkills()">

                                    </div>
                            </div>
                            <script>
                                document.addEventListener("DOMContentLoaded", function() {
                                    const input = document.getElementById('skills-search');
                                    const table = document.getElementById('skills-tbody');
                            
                                    input.addEventListener('keyup', function() {
                                        const filter = input.value.toLowerCase();
                                        const rows = table.getElementsByTagName('tr');
                            
                                        for (let i = 0; i < rows.length; i++) {
                                            const cells = rows[i].getElementsByTagName('td');
                                            let found = false;
                            
                                            for (let j = 0; j < cells.length; j++) {
                                                if (cells[j]) {
                                                    const textValue = cells[j].textContent || cells[j].innerText;
                                                    if (textValue.toLowerCase().indexOf(filter) > -1) {
                                                        found = true;
                                                        break;
                                                    }
                                                }
                                            }
                            
                                            rows[i].style.display = found ? "" : "none";
                                        }
                                    });
                                });
                            </script>
                            
                            

                            <div class="flex items-center mt-1 ml-auto space-x-2 sm:space-x-3">
                                <a href="{{ route('skills.create') }}"
                                    class="px-8 py-2.5 bg-blue-500 text-sm text-white hover:bg-blue-600 rounded-sm"
                                    data-bs-toggle="modal" data-bs-target="#skillModal">
                                    Ajouter une compétence
                                </a>
                            </div>
                        </div>

                    </div>
                </div>
                
                <div class="overflow-x-auto font-sans">
                    <table class="min-w-full divide-y divide-gray-200"id="skills-table">
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
                        <tbody class="bg-white divide-y divide-gray-200 whitespace-nowrap" id="skills-tbody">
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
                                            style="display: inline-block;" id="delete-form-{{ $skill->id }}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button" class="text-red-600"
                                                onclick="confirmDelete({{ $skill->id }})">
                                                <i class="fa-solid fa-trash"></i>
                                            </button>
                                        </form>

                                    </td>
                                    <script>
                                        function confirmDelete(skillId) {
                                            Swal.fire({
                                                title: "Êtes-vous sûr?",
                                                text: "Vous ne pourrez pas revenir en arrière!",
                                                icon: "warning",
                                                showCancelButton: true,
                                                confirmButtonColor: "#3085d6",
                                                cancelButtonColor: "#d33",
                                                confirmButtonText: "Oui, supprimer!",
                                                cancelButtonText: "Annuler",
                                            }).then((result) => {
                                                if (result.isConfirmed) {
                                                    document.getElementById("delete-form-" + skillId).submit();
                                                }
                                            });
                                        }
                                    </script>
                                </tr>
                                <!-- Modal -->
                                <div class="modal fade" id="editSkillModal{{ $skill->id }}" tabindex="-1"
                                    aria-labelledby="editSkillModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="text-xl font-bold text-gray-900 dark:text-white"
                                                    id="editSkillModalLabel">Modifier la compétence:
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
                                                        <label for="name"
                                                            class="block mb-2 font-bold text-gray-700">Nom</label>
                                                        <input type="text"
                                                            class="pl-4 pr-12 py-3.5 bg-white text-[#333] w-full text-sm border-2 border-gray-300 focus:border-[#333] rounded outline-none"
                                                            id="name" name="name" value="{{ $skill->name }}"
                                                            required>
                                                    </div>
                                                    <div class="mb-4">
                                                        <label for="issearchable"
                                                            class="block mb-2 font-bold text-gray-700">Searchable</label>
                                                        <input type="checkbox" id="issearchable" name="issearchable"
                                                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
                                                            value="1" {{ $skill->issearchable ? 'checked' : '' }}>
                                                    </div>
                                                    <div class="mb-4">
                                                        <label for="image"
                                                            class="block mb-2 font-bold text-gray-700">Image</label>
                                                        <div>
                                                            <img src="{{ Storage::url($skill->image) }}" height="50"
                                                                width="100" class="h-auto max-w-lg rounded-lg " />
                                                        </div>
                                                        <input type="file"
                                                            class="block w-full text-sm text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-violet-50 file:text-blue-700 hover:file:bg-violet-100"
                                                            id="image" name="image">
                                                    </div>
                                                    <button type="submit"
                                                        class="!mt-8 px-8 py-2.5 bg-blue-500 text-sm text-white hover:bg-blue-600 rounded-sm">Modifier</button>
                                                    <button type="button"
                                                        class="!mt-8 px-8 py-2.5 bg-gray-500 text-sm text-white hover:bg-gray-600 rounded-sm"
                                                        data-bs-dismiss="modal">Annuler</button>
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
                                    une nouvelle compétence:</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form method="POST" action="{{ route('skills.store') }}" enctype="multipart/form-data">
                                    @csrf

                                    <div class="mb-4">
                                        <label for="name" class="block mb-2 font-bold text-gray-700">Nom</label>
                                        <input type="text"
                                            class="pl-4 pr-12 py-3.5 bg-white text-[#333] w-full text-sm border-2 border-gray-300 focus:border-[#333] rounded outline-none"
                                            id="name" name="name" required>
                                    </div>
                                    <div class="mb-4">
                                        <label for="issearchable"
                                            class="block mb-2 font-bold text-gray-700">Searchable</label>
                                        <input type="checkbox"
                                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
                                            id="issearchable" name="issearchable" value="1">
                                    </div>
                                    <div class="mb-4">
                                        <label for="image" class="block mb-2 font-bold text-gray-700">
                                            Image</label>
                                        <input type="file"
                                            class="block w-full text-sm text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-violet-50 file:text-blue-700 hover:file:bg-violet-100"
                                            id="image" name="image" required>
                                    </div>

                                    <div class="mt-4">
                                        <button type="submit"
                                            class="!mt-8 px-8 py-2.5 bg-blue-500 text-sm text-white hover:bg-blue-600 rounded-sm">Ajouter
                                        </button>
                                        <button type="button"
                                            class="!mt-8 px-8 py-2.5 bg-gray-500 text-sm text-white hover:bg-gray-600 rounded-sm"
                                            data-bs-dismiss="modal">Annuler</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>





            </div>
        </div>
    </div>
@endsection
@section('scripts')
<script>
  window.onload = function() {
    document.getElementById('skills-search').onkeyup = filterSkills;
};  
</script>



    
@endsection
