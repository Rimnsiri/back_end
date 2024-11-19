<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CV {{ $dev->name }} {{ $dev->firstname }}</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha384-qPjH1LxeO+nyoNTr3YP3UQFZ+NN5R5wB/Ig4O4yyg27jI7IpoTXRZmt6ZB91IV85" crossorigin="anonymous"
        referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="path/to/font-awesome/css/all.min.css" />
    <link rel="stylesheet" href="{{ public_path('font-awesome/css/all.min.css') }}">

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap');

        .text-gray-800 {
            color: #2d3748;
        }

        .bg-gray-100 {
            background-color: #f7fafc;
        }

        .font-semibold {
            font-weight: 600;
        }

       

        
    </style>

    </style>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <div class="container">
        <div class="bg-white ">
            <div class="sm:p-6">
                <table style="width: 100%; border-collapse: collapse; margin-bottom: 20px;">
                    <tr>
                        <!-- Logo à gauche -->
                        <td style="width: 150px; text-align: left; vertical-align: middle;">
                            <img src="data:image/png;base64,{{ base64_encode(file_get_contents($logoUrl)) }}" alt="Logo DevFactory" style="width: 200px; height: auto;">
                        </td>
                
                        <!-- Informations du développeur à droite -->
                        <td style="text-align: right; vertical-align: middle;">
                            <h2 style="font-size: 20px; font-weight: 600; margin: 0;">
                                {{ $dev->name }} {{ substr($dev->firstname, 0, 1) }}.
                            </h2>
                            <p style="margin: 0;">Contact: <a href="mailto:ralph@devfactory.cc">ralph@devfactory.cc</a></p>
                        </td>
                    </tr>
                </table>
                
                
                
                
                
                
                <div class="mt-4" style="margin-bottom: 30px">
                    <div style="display: flex; flex-direction: column; align-items: center; text-align: center;">
                        <!-- Nom et Prénom -->
                        
                        
                        <!-- Titre -->
                        <p style="font-size: 25px; color: #000080; font-weight: 500; margin-bottom:0px">
                            {{ $dev->title }}
                        </p>
                        
                        <!-- Contact -->
                        <div style=" font-weight: 400;">
                            <h5 style="display: inline; margin: 0; color:#000080; font-size: 24px; font-weight: 400;">{{ $dev->niveau }}</h5> |
                            @foreach ($topSkills->slice(0, 3) as $skill)
                                <span  style="display: inline; color:#585a5f;">
                                    {{ $skill->name }}
                                    @if (!$loop->last)
                                        <span>,</span>
                                    @endif
                                </span>
                            @endforeach
                        </div>
                        
                    </div>
                </div>
                <div class="mt-4">
                    <h3 class="mb-4" style="color: #8e8e8e; font-size: 35px; font-weight: 400;margin-bottom:5px;">
                        Expériences

                    </h3>
                    
                        <hr class="mb-6" style="border-top: 1px solid #8e8e8e; margin-bottom:28px;">
                    @foreach ($dev->experiences as $experience)
                        <div class="mb-6 mt-7" style="margin-bottom: 1.5rem;">
                            <div
                                style="justify-content: space-between; gap: 0.5rem; width: 100%; flex-wrap: wrap; display: flex;">
                                <span style="font-weight: 700; color:#000080; font-size:20px">{{ $experience->title }}</span> |<span style="color: #020202">
                                    {{ $experience->entreprisename }}</span>
                                <p>
                                    
                                    <span style="color: #000080; margin-top:0px;">
                                        De {{ \Carbon\Carbon::parse($experience->startdate)->format('Y') }} à 
                                        {{ $experience->enddate ? \Carbon\Carbon::parse($experience->enddate)->format('Y') : 'Présent' }}
                                        @if($experience->enddate)
                                            ({{ \Carbon\Carbon::parse($experience->startdate)->diffInYears(\Carbon\Carbon::parse($experience->enddate)) }} ans)
                                        @else
                                            @php
                                                $years = \Carbon\Carbon::parse($experience->startdate)->diffInYears(now());
                                                $months = \Carbon\Carbon::parse($experience->startdate)->diffInMonths(now()) % 12;
                                            @endphp
                                            ({{ $years > 0 ? $years . ' ans ' : '' }}{{ $months > 0 ? $months . ' mois' : '' }})
                                        @endif
                                    </span>
                                    
                                    
                                </p>
                            </div>
                            <p class="mt-2">
                                {!! $experience->description !!}
                            </p>
                            <div class="ml-8" style="display: flex; align-items: center; ">
                                <h5 style=" display: inline; font-weight: 400; font-family: 'Helvetica Neue', Arial, sans-serif;  margin-right: 0.5rem; font-size: 16px;">Environnement :</h5>
                                @if ($experience->skills->isNotEmpty())
                                    <span style="display: inline; font-family: 'Helvetica Neue', Arial, sans-serif;  ">
                                        @foreach ($experience->skills as $index => $skill)
                                            <span>{{ $skill->name }}</span>
                                            @if ($index < $experience->skills->count() - 1)
                                                <span>,</span>
                                            @endif
                                        @endforeach
                                    </span>
                                @else
                                    <span>Aucune technologie spécifiée pour cette expérience.</span>
                                @endif
                            </div>
                            
                            

                        </div>
                    @endforeach

                </div>
                
               
                
                <div class="mt-4">
                    <h3 style="color: #8e8e8e; font-size: 35px; font-weight: 400; margin-bottom:5px;">Compétences et Formation</h3>
                    <hr class="my-6 " style="border-top: 1px solid #8e8e8e;">
                    <div class="mt-4 " style="margin-bottom: 50px">
                        <h3 class="text-lg font-semibold  mb-2" style="color: #000080">FORMATION UNIVERSITAIRE</h3>
                        @foreach ($dev->educations as $education)
                        <div style="display: flex; align-items: baseline; gap: 0.5rem;">
                            <h5  style="display: inline;   font-size: 1rem; color: #374151;">
                                {{ \Carbon\Carbon::parse($education->startdate)->format('Y') }}
                            </h5>
                            <h4 class=" mr-10" style="display: inline; font-weight: 600; font-size: 1rem; color: #000080; margin-left: 32px;">
                                {{ $education->diplome }}
                            </h4>
                            <p style="display: inline; margin: 0; font-size: 1rem;">
                                ({{ $education->école }})
                            </p>
                            <p style="margin-top: 1px; font-size: 1rem; color: #374151; ">
                                {!! $education->description !!}
                            </p>
                        </div>
                        
                        
                        @endforeach
    
                    </div>
                    <!-- Compétences principales -->
                    <h3 class="text-lg font-semibold mb-2" style="color: #000080">COMPÉTENCES CLEF  </h3>
                    <div class="flex flex-wrap gap-8 items-start">
                        <!-- Compétences principales -->
                        <div style="display:flex; font-family: 'Helvetica Neue', Arial, sans-serif; margin-bottom:8px">
                            <h4 style="display: inline; font-weight: 600; font-size:18px;" class=" text-md mb-2">Compétences principales:</h4>
                            <div style="display: inline; font-size: font-size:18px ; line-height: 1; " class=" list-disc list-inside">
                                @foreach ($mainSkills as $skill)
                                    <span class="skill-item mb-0">
                                        {{ $skill->name }}
                                        @if ($index < count($mainSkills) - 1)
                                       <span >,</span>
                                        @endif
                                    </span>
                                @endforeach
                            </div>
                        </div>
                    
                        <!-- Autres compétences -->
                        <div style="display:flex; font-family: 'Helvetica Neue', Arial, sans-serif; ">
                            <h4 style="display: inline; font-weight: 600; font-size:18px" class="text-md mb-2">Autres compétences:</h4>
                            <div style="display: inline; font-size:18px ;  line-height: 1px; line-height: 1; " class="skills-grid list-disc list-inside">
                                @foreach ($otherSkills as $skill)
                                    <span class="skill-item mb-0">
                                        {{ $skill->name }}
                                        @if ($index < count($otherSkills) - 1)
                                           <span>,</span>
                                        @endif
                                    </span>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    
                </div>
                
                
                
                
              

            </div>
        </div>

    </div>
</body>

</html>
