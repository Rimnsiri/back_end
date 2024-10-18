{{-- resources/views/skills/create.blade.php --}}
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="text-2xl py-4 px-6 bg-gray-300 text-white text-center font-bold uppercase">Add New Skill
                    </div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('skills.store') }}" enctype="multipart/form-data"
                            class="py-4 px-6">
                            @csrf

                            <div class="mb-4">
                                <label for="name" class="block text-gray-700 font-bold mb-2">Skill Name</label>
                                <input type="text"
                                    class="pl-4 pr-12 py-3.5 bg-white text-[#333] w-full text-sm border-2 border-gray-300 focus:border-[#333] rounded outline-none"
                                    id="name" name="name" required>
                            </div>
                            <div class="mb-4">
                                <label for="issearchable" class="mb-2 text-sm text-black block">Consultable</label>
                                <input type="checkbox" class="w-4" id="issearchable" name="issearchable" value="1">
                            </div>
                            <div class="mb-4">
                                <label for="image" class="mb-2 text-sm text-black block">Skill Image</label>
                                <input type="file"
                                    class="block w-full text-sm text-slate-500
            file:mr-4 file:py-2 file:px-4
            file:rounded-full file:border-0
            file:text-sm file:font-semibold
            file:bg-violet-50 file:text-blue-700
            hover:file:bg-violet-100
          "
                                    id="image" name="image" required>
                            </div>



                            <div class="mt-4">
                                <button type="submit"
                                    class="!mt-8 px-8 py-2.5 bg-blue-500 text-sm text-white hover:bg-blue-600 rounded-sm">Add
                                    Skill</button>
                                <a href="{{ route('skills.index') }}"
                                    class="!mt-8 px-8 py-2.5 bg-gray-500 text-sm text-white hover:bg-gray-600 rounded-sm">Cancel</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
