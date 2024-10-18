<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::table('skills')->insert([
            ['name' => 'Java', 'image' => 'public/photos/ybEioGLqawmmAhE5s8ZuTUh4C3Eq4c5jR7hdFy6h.png'],
            ['name' => 'J2EE', 'image' => 'photos/j2ee.png'],
            ['name' => 'Spring MVC', 'image' => 'photos/spring_mvc.png'],
            ['name' => 'Hibernate', 'image' => 'photos/hibernate.png'],
            ['name' => 'Node.js', 'image' => 'photos/nodejs.png'],
            ['name' => 'Express', 'image' => 'photos/express.png'],
            ['name' => 'MongoDB', 'image' => 'photos/mongodb.png'],
            ['name' => 'MySQL', 'image' => 'photos/mysql.png'],
            ['name' => 'Blockchain', 'image' => 'photos/blockchain.png'],
            ['name' => 'Ethereum', 'image' => 'photos/ethereum.png'],
            ['name' => 'ERC20', 'image' => 'photos/erc20.png'],
            ['name' => 'GraphQL', 'image' => 'photos/graphql.png'],
            ['name' => 'Angular (13 et Universal)', 'image' => 'photos/angular.png'], 
            ['name' => 'CSS Flex', 'image' => 'photos/css_flex.png'], 
            ['name' => 'Bootstrap', 'image' => 'photos/bootstrap.png'], 
            ['name' => 'Web3.js', 'image' => 'photos/web3.png'], 
            ['name' => 'Figma', 'image' => 'photos/figma.png'], 
            ['name' => 'Adobe Suite (Ai, Psd, Id, Adobe Type Kit)', 'image' => 'photos/adobe_suite.png'],
                ['name' => 'Symfony', 'image' => 'photos/symfony.png'],
                ['name' => 'Vue.js', 'image' => 'photos/vuejs.png'],
                ['name' => 'JavaScript', 'image' => 'photos/javascript.png'],
                ['name' => 'Jenfi', 'image' => 'photos/jenfi.png'],
                ['name' => 'Docker', 'image' => 'photos/docker.png'],
                ['name' => 'Codeigniter', 'image' => 'photos/codeigniter.png'],
                ['name' => 'jQuery', 'image' => 'storage/photos/jquery.png'],
                ['name' => 'Ajax', 'image' => 'storage/photos/ajax.png'],
                ['name' => 'BalsamiqMockups', 'image' => 'storage/photos/balsamiq.png'],
                ['name' => 'KnockoutJS', 'image' => 'storage/photos/knockoutjs.png'],
                ['name' => 'Material Design', 'image' => 'storage/photos/material_design.png'],
                ['name' => 'Web SQL', 'image' => 'storage/photos/web_sql.png'],
                ['name' => 'HTML5', 'image' => 'storage/photos/html5.png'],
                ['name' => 'CSS3', 'image' => 'storage/photos/css3.png'],
                ['name' => 'Trello', 'image' => 'storage/photos/trello.png'],
                ['name' => 'Git', 'image' => 'storage/photos/git.png'],
                ['name' => 'JWT', 'image' => 'storage/photos/jwt.png'],
                ['name' => 'Socket.io', 'image' => 'storage/photos/socketio.png'],
                ['name' => 'REST API', 'image' => 'storage/photos/rest_api.png'],
                ['name' => 'Twig', 'image' => 'storage/photos/twig.png'],
                ['name' => 'Scrum', 'image' => 'storage/photos/scrum.png'],
                ['name' => 'UX', 'image' => 'storage/photos/ux.png'],
                ['name' => 'TortoiseGit', 'image' => 'storage/photos/tortoisegit.png'],
                ['name' => 'Jenkins', 'image' => 'storage/photos/jenkins.png'],
                ['name' => 'Sublime Text', 'image' => 'photos/sublime_text.png'],
                ['name' => 'Brackets', 'image' => 'photos/brackets.png'],
                ['name' => 'IntelliJ IDE', 'image' => 'photos/intellij.png'],
                ['name' => 'Sass', 'image' => 'photos/sass.png'],
                ['name' => 'Laravel', 'image' => 'photos/laravel.png'],
                ['name' => 'Microsoft SQL Server (MSSQL)', 'image' => 'photos/mssql.png'],
                ['name' => 'PostgreSQL', 'image' => 'photos/postgresql.png'],
                ['name' => 'Django', 'image' => 'photos/django.png'],
                ['name' => 'Python', 'image' => 'photos/python.png'],
                ['name' => 'Shell Script', 'image' => 'photos/shell_script.png'],
                ['name' => 'Odoo 14 et 15', 'image' => 'photos/odoo14.png'],
                ['name' => 'Odoo ', 'image' => 'photos/odoo15.png'],
                ['name' => 'TypeScript', 'image' => 'photos/typescript.png'],
                ['name' => 'GitLab', 'image' => 'photos/gitlab.png'],
                ['name' => 'GitHub', 'image' => 'photos/github.png'],
                ['name' => 'Windows OS', 'image' => 'photos/windows_os.png'],
                ['name' => 'Linux OS', 'image' => 'photos/linux_os.png'],
                ['name' => 'Agile', 'image' => 'photos/agile.png'],
                ['name' => 'Jira', 'image' => 'photos/jira.png'],
                ['name' => 'Angular Universal', 'image' => 'photos/angular_universal.png'],
                ['name' => 'AngularJS', 'image' => 'photos/angularjs.png'],
                ['name' => 'Angular 6,7,8', 'image' => 'photos/angular6.png'],
                ['name' => 'Angular', 'image' => 'photos/angular7.png'],
                ['name' => 'Angular 8', 'image' => 'photos/angular8.png'],
                ['name' => 'WordPress', 'image' => 'photos/wordpress.png'],
                ['name' => ' Ngrx', 'image' => 'photos/ Ngrx.png'], 
                ['name' => ' Maven', 'image' => 'photos/ Maven.png'],
                ['name' => ' Postgress', 'image' => 'photos/ Postgress.png'],
                ['name' => ' PHP', 'image' => 'photos/ PHP.png'],
                ['name' => ' Conception graphique et maquettage', 'image' => 'photos/ Conception_graphique_et_maquettage.png'],
            
        ]);
        DB::table('devs')->insert([
            [
                'name' => 'Liam',
                'firstname' => 'Bahroun',
                'presentation' => 'Développeur web avec une expérience en Laravel et Angular.',
                'email' => 'liam@silog.io',
                'phone' => '00000000',
                'address' => '******',
                'photo' => 'storage/photos/john_doe.png',
                'comptedev_id' => null, 
            ],
            [
                'name' => 'Wael',
                'firstname' => 'Gabriel',
                'presentation' => 'Développeuse front-end spécialisée en React.',
                'email' => 'gabriel@silog.io',
                'phone' => '00000000',
                'address' => '*******',
                'photo' => 'storage/photos/jane_smith.png',
                'comptedev_id' => null, 
            ],
            [
            
                'name' => 'Rami',
                'firstname' => 'Rabeb',
                'presentation' => 'Développeuse Web ',
                'email' => ' rami@silog.io',
                'phone' => '+33 4 79 19 45 15',
                'address' => '*******',
                'photo' => 'storage/photos/jane_smith.png',
                'comptedev_id' => null, 
            ],
        ]);
        DB::table('cvs')->insert([
            [
                'dev_id' => 1, 
                'name' => 'Liam',
                'firstname' => 'Bahroun',
                'email' => 'liam@silog.io',
                'phone' => '00000000',
                'address' => '******',
                'photo' => 'storage/photos/john_doe.png',
                'title' => 'Développeur FullStack PHP, Symfony & Vue.Js',
                'description' => 'Développeur web expérimenté avec une forte compétence en Laravel et Angular.',
                'tjm' => 000, 
                'niveau' => 'Senior',
                'french_level' => 'B2',
                'english_level' => 'B2',
                'ispublic' => 1,
            ],
            [
                'dev_id' => 2, 
                'name' => 'Wael',
                'firstname' => 'Gabriel',
                'email' => 'gabriel@silog.io',
                'phone' => '00000000',
                'address' => '*******',
                'photo' => 'storage/photos/jane_smith.png',
                'title' => 'Développeur Full Stack ',
                'description' => 'Développeur Full Stack ',
                'tjm' => 000,
                'niveau' => '****',
                'french_level' => 'B2',
                'english_level' => 'B2',
                'ispublic' => 1,
            ],
            [
                'dev_id' => 3, 
                'name' => 'Rami',
                'firstname' => 'Rabeb',
                'email' => ' rami@silog.io',
                'phone' => '+33 4 79 19 45 15',
                'address' => '*******',
                'photo' => 'storage/photos/jane_smith.png',
                'title' => 'Développeuse Web',
                'description' => 'Développeuse Web.',
                'tjm' => 000,
                'niveau' => 'Senior',
                'french_level' => 'B1',
                'english_level' => 'A1',
                'ispublic' => 1,
            ],
        ]);
        DB::table('education')->insert([
            [
                'cv_id' => 1, 
                'diplome' => 'Diplôme d\'ingénieur Génie Logiciel',
                'école' => 'Université de Tunis',
                'startdate' => '2012-09-15',
                'enddate' => '2015-06-30',
                'is_current' => false,
                'description' => 'Spécialisation en développement web et systèmes d\'information.',
            ],
            [
                'cv_id' => 2, 
                'diplome' => 'License en Science informatique',
                'école' => 'Université de Tunis',
                'startdate' => '2010-09-15',
                'enddate' => '2015-06-30',
                'is_current' => false,
                'description' => 'Spécification en Sciences de l\'Informatique',
            ],
            [
                'cv_id' => 3, 
                'diplome' => 'License en Science informatique',
                'école' => 'Université de Tunis',
                'startdate' => '2016-09-15',
                'enddate' => '2019-06-30',
                'is_current' => false,
                'description' => 'Spécification en Sciences de l\'Informatique.',
            ]
        ]);
        DB::table('experiences')->insert([
          
          
          
        
            [
                'cv_id' => 1, // CV ID correspondant liam
                'title' => ' Ingénieur d’études et Développement JAVA, Symfony & Angular',
                'entreprisename' => 'OBG',
                'startdate' => '2020-01-01',
                'enddate' => '2024-01-01',
                'is_current' => false,
                'description' =>"Conception et développement d'applications
                                  Intégration de l'equipe pour le poste (Analyse + traitement des bugs)
                                  Déploiment et monté en version pour les projets
                                  Projet 1 : Syncronisation des produits entre industriels et acteurs de la distrubution (gestion des produits , suivi des echanges, operation commercial , appeld'offre).
                                  Projet 2 : Alimenter le referentiel produit avec les informations et tarifs des fiches produits de leur fornisseur via les canals.
                                  Equipe : 1 Tech Lead, 2 Développeurs ",
            ],
            [
                'cv_id' => 1, // CV ID correspondant liam
                'title' => ' Ingénieur d’études et développement PHP',
                'entreprisename' => '  E2Business Consultin',
                'startdate' => '2019-01-01',
                'enddate' => '2020-01-01',
                'is_current' => false,
                'description' =>"Projet : Conception et développement d'applications
                                Participation à la planification des sprints, aux réunions quotidiennes et à la rétrospectivede chaque sprint.
                                Création des maquettes.
                                Développement des interfaces graphiques responsives.
                                Développement des modules gestion des field officers / gestion des ventes /gestion de stock / gestion de présence.
                                Développement des tableaux de bord de suivi de réalisation des ventes par rapport aux objectifs visés.
                                Assurer une bonne qualité de code et suivre les meilleures pratiques de développement.
                                Rédaction des documentations.
                                Fixation des bugs.
                                Equipe : 1 Tech Lead et 4 Développeurs ",
            ],
            [
                'cv_id' => 1, // CV ID correspondant liam
                'title' => ' Ingénieur d’Études et Développement Angular',
                'entreprisename' => '  MG Software Solutions',
                'startdate' => '2019-01-01',
                'enddate' => '2020-01-01',
                'is_current' => false,
                'description' => ' Projet : Conception et Développement d’une application de gestion de congé .
                Développement de la partie backend pour les différents modules de refonte du site enresponsive et intégration des nouveau design.
                 Mise en place d’une solution de conteneurisation Docker.
                 Build des images via dockerfile.
                 Participation à la création de la nouvelle architecture frontend.
                 Mise en application de la méthode Agile pour la gestion de projet.
                 Equipe : 1 Tech Lead et 2 Développeurs ',
            ],
            [
                'cv_id' => 1, // CV ID correspondant liam
                'title' => 'Ingénieur d’Etude et Développement Nodejs',
                'entreprisename' => ' AS Agency',
                'startdate' => '2018-01-01',
                'enddate' => '2019-01-01',
                'is_current' => false,
                'description' => ' Projet : Développement d’une plateforme de gaming avec Nodejset Vuejs Participation à la planification des sprints, aux réunions quotidiennes et à la rétrospective de chaque sprint.
                                   Développement de la partie Back end pour les différents modules de plateforme degaming.
                                   Assurer une bonne qualité de code et suivre les meilleures pratiques de développement front-end et back end.
                                   Equipe : 1 Tech Lead et 4 Développeurs',
            ],
            [
                'cv_id' => 1, // CV ID correspondant à liam
                'title' => ' Développeur PHP & Symfony',
                'entreprisename' => 'Edonec',
                'startdate' => '2016-01-01',
                'enddate' => '2017-12-31',
                'is_current' => false,
                'description' => ' Projet : Développement d’un CRM pour un centre centre d’appel Création des nouvelles campagnes, la gestion des scripts,le paramétrage des appels Gestion des fichiers tel que l’élimination des doublons, la consultation des appels émis via un historique détaillé, un système d’agenda pour vous permettre de gérer la prise de vos rendez-vous en tenant compte de l’agenda de vos conseillers.
                                   Outils de communication entre les différents types d\'utilisateurs de notre solution.
                                    Le paramétrage de la méthode d’appel en choisissant entre le prédictif et le manuel.
                                    Equipe : 1 Tech Lead, 2 Développeurs,',
            ],
            [
                'cv_id' => 2, // CV ID correspondant à Wael
                'title' => 'Lead Dév Angular & Node.Js',
                'entreprisename' => '  R-WAN Solutions',
                'startdate' => '2021-01-01',
                'enddate' => '2024-01-01', // En cours
                'is_current' => true,
                'description' => "Projet 1: Développement de modules sur une plateforme en ligne
                                  Utilisation d'Angular pour les interfaces réactives.
                                 Utilisation de Figma, CSS Flex et Bootstrap pour la conception et le style.
                                 Implémentation de fonctionnalités avec Node.js, Express et MongoDB pour le back-end. 
                                 Intégration des blockchains Ethereum ERC20 et Binance Smart Chain BEP20 avec Web3.js.
                                 Projet 2: Développement d'une la plateforme scolaire
                                  Utilisation d'Angular et Ngrx pour l'interface utilisateur dynamique.
                                 Utilisation de Figma, CSS Flex et Bootstrap pour la conception et la mise en page. 
                                  Intégration de fonctionnalités avec Node.js et Express pour le back-end.
                                 Projet 3: Développement de l'interface utilisateur de crypto
                                  Utilisation d'Angular pour l'interface utilisateur réactive.
                                 Intégration de la blockchain avec GraphQL pour les transactions sécurisées.
                                 Projet 4: Développement d'un système de vote basé sur un site d'art de la musique
                                  Utilisation d'Angular pour l'interface utilisateur du système de vote.
                                 Utilisation de GraphQL pour la communication avec le serveur de vote.
                                 Mise en place d'un système de gestion d'état avancé avec NGRx.
                                  Déploiement et configuration du système de vote sur la blockchain Ethereum.
                                  Equipe : 1 Lead Dév chargé de 15 Développeur",
            ],
            [
                'cv_id' => 2, // CV ID correspondant à Wael
                'title' => 'Ingénieur Support et Intégration',
                'entreprisename' => ' ComeTel',
                'startdate' => '2019-01-01',
                'enddate' => '2021-01-01', // En cours
                'is_current' => false,
                'description' => "Tâches de développement pour l\'ingénieur VAS :
                                  Développer les fonctionnalités VAS
                                  Assurer l'interopérabilité technique des services VAS avec les autres systèmes.
                                  Effectuer une veille technologique pour proposer des améliorations et des fonctionnalités innovantes.
                                  Tester, déboguer et résoudre les problèmes techniques lors du développement des services VAS.
                                  Installer, configurer et fournir un support technique pour la solution VAS
                                  Tâches de Customer Support Engineer :
                                  Installation et configuration de la solution chez les clients
                                  Assurer le dépannage et la résolution des problèmes rencontrés par les clients
                                  Supervision et maintenance de la solution afin de garantir la disponibilité et la stabilité du système
                                  Fournir un support technique de niveau 1 et 2 aux clients pour résoudre les problèmes rencontrés
                                  Equipe : 3 Développeurs.",
            ],
            
          
            [
                'cv_id' => 3, // CV ID correspondant à Rami
                'title' => ' Développeuse Web',
                'entreprisename' => 'DevNet',
                'startdate' => '2022-01-01',
                'enddate' => '2023-01-01', 
                'is_current' => false,
                'description' => 'Projet 1 : Système de Gestion de Santé
                                 Conception et développement d\'une application web afin de faciliter la gestion des patients, des rendez-vous et des dossiers médicaux.
                                 Amélioration de la communication et de la collaboration entre les différents services et le personnel médical.
                                 Projet 2 : E-learning Web Application
                                 Analyse des besoins et évaluation des objectifs pédagogiques.
                                 Suivi, évaluation et rétroaction des apprenants.
                                 Projet 3 : Développement de Modules Personnalisés
                                 Personnalisation et création de rapports Qweb.
                                 Intégration et configuration générale.
                                 Développement et mise en œuvre de modules.
                                 Mise à jour des versions de modules.',
            ],
            [
                'cv_id' => 3, // CV ID correspondant à Rami
                'title' => ' Développeuse Web',
                'entreprisename' => '  DevMix',
                'startdate' => '2020-01-01',
                'enddate' => '2021-01-01', 
                'is_current' => false,
                'description' => 'Projet : Application de Gestion de Laboratoire
                                 Développement d\'une application de pointe répondant aux besoins croissants des laboratoires en matière de qualité et de traitement de l\'information.
                                 Réduction des erreurs et amélioration de la gestion des données.
                                 Equipe : 1 Tech Lead et 2 Développeur',
            ],
            
            [
                'cv_id' => 3, // CV ID correspondant à Rami
                'title' => ' Développeuse Web',
                'entreprisename' => ' Zetabox',
                'startdate' => '2019-01-01',
                'enddate' => '2020-01-01', 
                'is_current' => false,
                'description' => 'Projet : Application d\'analyse de livraison
                                  Création d\'un logiciel intelligent de planification d\'itinéraires pour les services de livraison.
                                  Equipe : 1 Tech Lead et 3 Développeur',
            ],
         
        ]);
        DB::table('cv_skills')->insert([
            [
                'cv_id' => 1, 
                'skill_id' => 1, 
                'nbrmonth' => 12, 
                'isprincipal' => true, 
            ],
            [
                'cv_id' => 1, 
                'skill_id' => 5, 
                'nbrmonth' => 12, 
                'isprincipal' => true, 
            ],
            [
                'cv_id' => 1, 
                'skill_id' => 71, //php
                'nbrmonth' => 12, 
                'isprincipal' => true, 
            ],
            [
                'cv_id' => 1, 
                'skill_id' => 19, //symfony
                'nbrmonth' => 12, 
                'isprincipal' => true, 
            ],
            [
                'cv_id' => 1, 
                'skill_id' => 47, //laravel 
                'nbrmonth' => 12, 
                'isprincipal' => true, 
            ],
            [
                'cv_id' => 1, 
                'skill_id' => 8,//mysql 
                'nbrmonth' => 12, 
                'isprincipal' => true, 
            ],
            [
                'cv_id' => 1, 
                'skill_id' => 48, // Microsoft SQL Server
                'nbrmonth' => 12, 
                'isprincipal' => true, 
            ],
            [
                'cv_id' => 1, 
                'skill_id' => 49, //postgresql 
                'nbrmonth' => 12, 
                'isprincipal' => true, 
            ],
            [
                'cv_id' => 1, 
                'skill_id' => 7,//mongo 
                'nbrmonth' => 12, 
                'isprincipal' => true, 
            ],
            [
                'cv_id' => 1, 
                'skill_id' => 31, //html
                'nbrmonth' => 12, 
                'isprincipal' => true, 
            ],
            [
                'cv_id' => 1, 
                'skill_id' => 32,//css 
                'nbrmonth' => 12, 
                'isprincipal' => true, 
            ],
            [
                'cv_id' => 1, 
                'skill_id' => 46,//sass 
                'nbrmonth' => 12, 
                'isprincipal' => true, 
            ],
            [
                'cv_id' => 1, 
                'skill_id' => 21, 
                'nbrmonth' => 3, //javascript 
                'isprincipal' => true, 
            ],
            [
                'cv_id' => 1, 
                'skill_id' => 63,//angular.js 
                'nbrmonth' => 12, 
                'isprincipal' => true, 
            ],
            [
                'cv_id' => 1, 
                'skill_id' => 64, //angular 6 ,7,8
                'nbrmonth' => 12, 
                'isprincipal' => true, 
            ],
            [
                'cv_id' => 1, 
                'skill_id' => 20,//vue.js 
                'nbrmonth' => 12, 
                'isprincipal' => true, 
            ],
            [
                'cv_id' => 1, 
                'skill_id' => 28, 
                'nbrmonth' => 28, //knockoutjs
                'isprincipal' => true, 
            ],
            [
                'cv_id' => 1, 
                'skill_id' =>  15, 
                'nbrmonth' => 15,//boststrap 
                'isprincipal' => true, 
            ],
            [
                'cv_id' => 1, 
                'skill_id' => 67,//wordpress 
                'nbrmonth' => 12, 
                'isprincipal' => true, 
            ],
            [
                'cv_id' => 1, 
                'skill_id' => 59,//linux 
                'nbrmonth' => 12, 
                'isprincipal' => false, 
            ],
            [
                'cv_id' => 1, 
                'skill_id' => 39,//Scrumm
                'nbrmonth' => 12, 
                'isprincipal' => false, 
            ],
            [
                'cv_id' => 1, 
                'skill_id' => 40,//Ux
                'nbrmonth' => 12, 
                'isprincipal' => false, 
            ],
            [
                'cv_id' => 1, 
                'skill_id' => 34,//git
                'nbrmonth' => 12, 
                'isprincipal' => false, 
            ],
            [
                'cv_id' => 1, 
                'skill_id' => 41,//TortoiseGit
                'nbrmonth' => 12, 
                'isprincipal' => false, 
            ],
            [
                'cv_id' => 1, 
                'skill_id' => 42,//jenkins
                'nbrmonth' => 12, 
                'isprincipal' => false, 
            ],
            [
                'cv_id' => 1, 
                'skill_id' => 43,//Sublime Text
                'nbrmonth' => 12, 
                'isprincipal' => false, 
            ],
            [
                'cv_id' => 1, 
                'skill_id' => 44,//Brackets
                'nbrmonth' => 12, 
                'isprincipal' => false, 
            ],
            [
                'cv_id' => 1, 
                'skill_id' => 45,//Brackets
                'nbrmonth' => 12, 
                'isprincipal' => false, 
            ],
            //cv de wael gablriel
            [
                'cv_id' => 2,
                'skill_id' => 1,
                'nbrmonth' => 24,
                'isprincipal' => true,
            ],
            [
                'cv_id' => 2,
                'skill_id' => 2,//j2ee
                'nbrmonth' => 24,
                'isprincipal' => true,
            ],
            [
                'cv_id' => 2,
                'skill_id' => 3,//springmvc
                'nbrmonth' => 24,
                'isprincipal' => true,
            ],
            [
                'cv_id' => 2,
                'skill_id' => 4,// Hibernate
                'nbrmonth' => 24,
                'isprincipal' => true,
            ],
            [
                'cv_id' => 2,
                'skill_id' => 5,//nodejs
                'nbrmonth' => 24,
                'isprincipal' => true,
            ],
            [
                'cv_id' => 2,
                'skill_id' => 6,//express
                'nbrmonth' => 24,
                'isprincipal' => true,
            ],
            [
                'cv_id' => 2,
                'skill_id' => 7,//mongo
                'nbrmonth' => 24,
                'isprincipal' => true,
            ],
            [
                'cv_id' => 2,
                'skill_id' => 8,//mysql
                'nbrmonth' => 24,
                'isprincipal' => true,
            ],
            [
                'cv_id' => 2,
                'skill_id' => 9,//blockchain
                'nbrmonth' => 24,
                'isprincipal' => true,
            ],
            [
                'cv_id' => 2,
                'skill_id' => 10,//Ethereum
                'nbrmonth' => 24,
                'isprincipal' => true,
            ],
            [
                'cv_id' => 2,
                'skill_id' => 11,//	ERC20
                'nbrmonth' => 24,
                'isprincipal' => true,
            ],
            [
                'cv_id' => 2,
                'skill_id' => 12,//	GraphQL
                'nbrmonth' => 24,
                'isprincipal' => true,
            ],
            [
                'cv_id' => 2,
                'skill_id' => 13,//graphql
                'nbrmonth' => 24,
                'isprincipal' => true,
            ],
            [
                'cv_id' => 2,
                'skill_id' => 14,//angular
                'nbrmonth' => 24,
                'isprincipal' => true,
            ],
            [
                'cv_id' => 2,
                'skill_id' => 15,//css flex
                'nbrmonth' => 24,
                'isprincipal' => true,
            ],
            [
                'cv_id' => 2,
                'skill_id' => 16,//web3.js
                'nbrmonth' => 24,
                'isprincipal' => true,
            ],
            [
                'cv_id' => 2,
                'skill_id' => 17,//figma
                'nbrmonth' => 24,
                'isprincipal' => true,
            ],
            [
                'cv_id' => 2,
                'skill_id' => 18,//adobe suite
                'nbrmonth' => 24,
                'isprincipal' => true,
            ],
            [
                'cv_id' => 2,
                'skill_id' => 72,//Conception graphique et maquettage
                'nbrmonth' => 24,
                'isprincipal' => false,
            ],
           
            
            //cv de rami rabeb
            [
                'cv_id' => 3, 
                'skill_id' => 50,//django
                'nbrmonth' => 6,
                'isprincipal' => true,
            ],
            [
                'cv_id' => 3, 
                'skill_id' => 51, //python
                'nbrmonth' => 6,
                'isprincipal' => true,
            ],
            [
                'cv_id' => 3, 
                'skill_id' => 1,//java
                'nbrmonth' => 6,
                'isprincipal' => true,
            ],
            [
                'cv_id' => 3, 
                'skill_id' => 52,//shellscript
                'nbrmonth' => 6,
                'isprincipal' => true,
            ],
            [
                'cv_id' => 3, 
                'skill_id' => 53,//odoo 14,15
                'nbrmonth' => 6,
                'isprincipal' => true,
            ],
            [
                'cv_id' => 3, 
                'skill_id' => 49,//PostgreSQL
                'nbrmonth' => 6,
                'isprincipal' => true,
            ],
            [
                'cv_id' => 3, 
                'skill_id' => 8,//mysql
                'nbrmonth' => 6,
                'isprincipal' => true,
            ],
            [
                'cv_id' => 3, 
                'skill_id' => 64,//angular
                'nbrmonth' => 6,
                'isprincipal' => true,
            ],
            [
                'cv_id' => 3, 
                'skill_id' => 25,//JQuery
                'nbrmonth' => 6,
                'isprincipal' => true,
            ],
            [
                'cv_id' => 3, 
                'skill_id' => 15,//bootstrap
                'nbrmonth' => 6,
                'isprincipal' => true,
            ],
            [
                'cv_id' => 3, 
                'skill_id' => 55,//typescript
                'nbrmonth' => 6,
                'isprincipal' => true,
            ],
            [
                'cv_id' => 3, 
                'skill_id' => 56,//gitlab
                'nbrmonth' => 6,
                'isprincipal' => false,
            ],
            [
                'cv_id' => 3, 
                'skill_id' => 57,//github
                'nbrmonth' => 6,
                'isprincipal' => false,
            ],
            [
                'cv_id' => 3, 
                'skill_id' => 34,//git
                'nbrmonth' => 6,
                'isprincipal' => false,
            ],
            [
                'cv_id' => 3, 
                'skill_id' => 58,//win
                'nbrmonth' => 6,
                'isprincipal' => false,
            ],
            [
                'cv_id' => 3, 
                'skill_id' => 60,//agile
                'nbrmonth' => 6,
                'isprincipal' => false,
            ],
            [
                'cv_id' => 3, 
                'skill_id' => 61,//jira
                'nbrmonth' => 6,
                'isprincipal' => false,
            ],
            [
                'cv_id' => 3, 
                'skill_id' => 42,//jenkins
                'nbrmonth' => 6,
                'isprincipal' => false,
            ],
            
            
            
        ]);
        
        DB::table('experience_skill')->insert([
            [
                'experience_id' => 1, 
                'skill_id' => 19, 
            ],
            [
                'experience_id' => 1, 
                'skill_id' => 20, 
            ],
            [
                'experience_id' => 1, 
                'skill_id' => 21, 
            ],
            [
                'experience_id' => 1, 
                'skill_id' => 22, 
            ],
            [
                'experience_id' => 1, 
                'skill_id' => 1, 
            ],
            [
                'experience_id' => 1, 
                'skill_id' => 23, 
            ],
            [
                'experience_id' => 2, 
                'skill_id' => 24, 
            ],
            [
                'experience_id' => 2, 
                'skill_id' => 25, 
            ],
            [
                'experience_id' => 2, 
                'skill_id' => 26, 
            ],
            [
                'experience_id' => 2, 
                'skill_id' => 31, 
            ],
            [
                'experience_id' => 2, 
                'skill_id' => 32, 
            ],
            [
                'experience_id' => 2, 
                'skill_id' => 15, 
            ],
            [
                'experience_id' => 2, 
                'skill_id' => 8, 
            ],
            [
                'experience_id' => 2, 
                'skill_id' => 27, 
            ],
            [
                'experience_id' => 2, 
                'skill_id' => 39, 
            ],
            [
                'experience_id' => 3, 
                'skill_id' => 28,
            ],
            [
                'experience_id' => 3, 
                'skill_id' => 29,
            ],
            [
                'experience_id' => 3, 
                'skill_id' => 30,
            ],
            [
                'experience_id' => 3, 
                'skill_id' => 31,
            ],
            [
                'experience_id' => 3, 
                'skill_id' => 32,
            ],
            [
                'experience_id' => 3, 
                'skill_id' => 33,
            ],
            [
                'experience_id' => 3, 
                'skill_id' => 34,
            ],
            [
                'experience_id' => 4, 
                'skill_id' => 5, //nodejs
            ],
            [
                'experience_id' => 4, 
                'skill_id' => 20, //vuejs
            ],
            [
                'experience_id' => 4, 
                'skill_id' => 21, 
            ],
            [
                'experience_id' => 4, 
                'skill_id' => 35, 
            ],
            [
                'experience_id' => 4, 
                'skill_id' => 36, //,socket
            ],
            [
                'experience_id' => 4, 
                'skill_id' => 7, //,Mongod
            ],
            [
                'experience_id' => 4, 
                'skill_id' => 37, 
            ],
            [
                'experience_id' => 4, 
                'skill_id' => 34, 
            ],
            [
                'experience_id' => 5, 
                'skill_id' => 19, 
            ],
            [
                'experience_id' => 5, 
                'skill_id' => 38, 
            ],
            [
                'experience_id' => 5, 
                'skill_id' => 8, 
            ],
            [
                'experience_id' => 5, 
                'skill_id' => 31, 
            ],
            [
                'experience_id' => 5, 
                'skill_id' => 32, 
            ],
            [
                'experience_id' => 5, 
                'skill_id' => 15, 
            ],
            [
                'experience_id' => 6, 
                'skill_id' => 13, // Angular 13
            ],
            
            [
                'experience_id' => 6, 
                'skill_id' => 17, //figma
            ],
            [
                'experience_id' => 6, 
                'skill_id' => 14, //css flex
            ],
            [
                'experience_id' => 6, 
                'skill_id' => 15, //bootstrap
            ],
            [
                'experience_id' => 6, 
                'skill_id' => 5, //node.js
            ],
            [
                'experience_id' => 6, 
                'skill_id' => 6, //express
            ],
            [
                'experience_id' => 6, 
                'skill_id' => 7, //MongoDB
            ],
            [
                'experience_id' => 6, 
                'skill_id' => 16, //Web3.js
            ],
            [
                'experience_id' => 6, 
                'skill_id' => 68, // Ngrx
            ],
            [
                'experience_id' => 6, 
                'skill_id' => 12, //GraphQL
            ],
            [
                'experience_id' => 7, 
                'skill_id' => 1, //java
            ],
            [
                'experience_id' => 7, 
                'skill_id' => 2, //J2EE
            ],
            [
                'experience_id' => 7, 
                'skill_id' => 3,// Spring MVc 
            ],
            [
                'experience_id' => 7, 
                'skill_id' => 4, //Hibernate
            ],
            [
                'experience_id' => 7, 
                'skill_id' => 69, // Maven
            ],
            [
                'experience_id' => 7, 
                'skill_id' => 8, //mysql
            ],
            [
                'experience_id' => 9, 
                'skill_id' => 65, //angular 
            ],
            [
                'experience_id' => 9, 
                'skill_id' => 55,// TypeScript 
            ],
            [
                'experience_id' => 9, 
                'skill_id' => 50, // Django 
            ],
            [
                'experience_id' => 9, 
                'skill_id' => 51, // Python
            ],
            [
                'experience_id' => 9, 
                'skill_id' => 70, // Postgress
            ],
            [
                'experience_id' => 9, 
                'skill_id' => 56, // Gitlab
            ],
            [
                'experience_id' => 10, 
                'skill_id' => 51, // Python 
            ],
            [
                'experience_id' => 10, 
                'skill_id' => 50, // Django
            ],
            [
                'experience_id' => 10, 
                'skill_id' => 37, //rest api
            ],
            [
                'experience_id' => 10, 
                'skill_id' => 65, //angular 
            ],
            [
                'experience_id' => 10, 
                'skill_id' => 55,// TypeScript 
            ],
        ]);
       
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
