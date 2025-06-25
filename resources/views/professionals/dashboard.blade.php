@extends('layouts.app')

@section('content')
<div class="bg-gray-50 min-h-screen" x-data="{ activeTab: 'overview' }">

    <!-- Section d'en-tête -->
    <div class="bg-white shadow-sm border-b">
        <div class="container mx-auto px-4 py-6">
            <div class="flex justify-between items-center">
                <div class="flex items-center space-x-4">
                    <div class="w-16 h-16 bg-blue-600 rounded-full flex items-center justify-center text-white text-xl font-bold">
                        {{ strtoupper(substr($professionalData['name'], 0, 1)) }}
                    </div>
                    <div>
                        <h1 class="text-2xl font-bold text-gray-900">Bienvenue, {{ $professionalData['name'] }} !</h1>
                        <div class="flex items-center space-x-4 mt-1">
                            <span class="px-2 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-800">
                                {{ $professionalData['status'] === 'verified' ? 'Professionnel vérifié' : 'Vérification en attente' }}
                            </span>
                            <span class="text-sm text-gray-600 flex items-center">
                                ⭐ {{ $professionalData['rating'] }} note
                            </span>
                        </div>
                    </div>
                </div>
                <div class="flex space-x-3">
                    <button class="text-sm font-medium text-gray-700 border border-gray-300 rounded-md px-3 py-2 hover:bg-gray-100">Voir le profil public</button>
                    <button class="text-sm font-medium text-white bg-blue-600 px-3 py-2 rounded-md hover:bg-blue-700">Modifier le profil</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Navigation des onglets -->
    <div class="border-b">
        <nav class="flex space-x-8 container mx-auto px-4">
            <button @click="activeTab = 'overview'" 
                    :class="activeTab === 'overview' ? 'border-b-2 border-blue-600 text-blue-600' : 'text-gray-600 hover:text-blue-600'" 
                    class="py-3 text-sm font-medium">
                Vue d’ensemble
            </button>
            <button @click="activeTab = 'bookings'" 
                    :class="activeTab === 'bookings' ? 'border-b-2 border-blue-600 text-blue-600' : 'text-gray-600 hover:text-blue-600'" 
                    class="py-3 text-sm font-medium">
                Réservations
            </button>
            <button @click="activeTab = 'reviews'" 
                    :class="activeTab === 'reviews' ? 'border-b-2 border-blue-600 text-blue-600' : 'text-gray-600 hover:text-blue-600'" 
                    class="py-3 text-sm font-medium">
                Avis
            </button>
            <button @click="activeTab = 'settings'" 
                    :class="activeTab === 'settings' ? 'border-b-2 border-blue-600 text-blue-600' : 'text-gray-600 hover:text-blue-600'" 
                    class="py-3 text-sm font-medium">
                Paramètres
            </button>
        </nav>
    </div>

    <div class="container mx-auto px-4 py-8">
        <!-- Contenu de l’onglet Vue d’ensemble -->
        <div x-show="activeTab === 'overview'" x-cloak>
            <!-- Grille des statistiques -->
            <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-6">
                <div class="bg-white rounded-lg shadow p-6">
                    <p class="text-sm text-gray-600">Nombre total de travaux</p>
                    <p class="text-3xl font-bold text-gray-900">{{ $professionalData['totalJobs'] }}</p>
                </div>
                <div class="bg-white rounded-lg shadow p-6">
                    <p class="text-sm text-gray-600">Vues du profil</p>
                    <p class="text-3xl font-bold text-gray-900">{{ $professionalData['profileViews'] }}</p>
                </div>
                <div class="bg-white rounded-lg shadow p-6">
                    <p class="text-sm text-gray-600">Revenus totaux</p>
                    <p class="text-3xl font-bold text-gray-900">${{ number_format($professionalData['earnings']) }}</p>
                </div>
                <div class="bg-white rounded-lg shadow p-6">
                    <p class="text-sm text-gray-600">Note</p>
                    <p class="text-3xl font-bold text-gray-900">{{ $professionalData['rating'] }}</p>
                </div>
            </div>

            <!-- Réservations récentes et progression du profil -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Réservations récentes -->
                <div class="bg-white rounded-lg shadow">
                    <div class="px-6 py-4 border-b">
                        <h3 class="text-lg font-medium text-gray-900">Réservations récentes</h3>
                    </div>
                    <div class="p-6 space-y-4">
                        @foreach($bookings as $booking)
                            <div class="flex justify-between items-center bg-gray-50 p-3 rounded">
                                <div>
                                    <p class="text-sm font-semibold text-gray-800">{{ $booking['client'] }}</p>
                                    <p class="text-sm text-gray-500">{{ $booking['service'] }}</p>
                                </div>
                                <div class="text-right">
                                    <p class="text-sm font-semibold text-gray-900">${{ $booking['price'] }}</p>
                                    <p class="text-sm text-gray-500">{{ $booking['date'] }}</p>
                                </div>
                            </div>
                        @endforeach
                        <button @click="activeTab = 'bookings'" class="block text-center text-blue-600 hover:underline text-sm mt-4">
                            Voir toutes les réservations
                        </button>
                    </div>
                </div>

                <!-- Progression du profil -->
                <div class="bg-white rounded-lg shadow">
                    <div class="px-6 py-4 border-b">
                        <h3 class="text-lg font-medium text-gray-900">Complétion du profil</h3>
                    </div>
                    <div class="p-6 space-y-4">
                        <div>
                            <div class="flex justify-between mb-1 text-sm font-medium">
                                <span>Progression</span>
                                <span>{{ $professionalData['profileCompletion'] }}%</span>
                            </div>
                            <div class="w-full bg-gray-200 rounded-full h-2.5">
                                <div class="bg-blue-600 h-2.5 rounded-full" style="width: {{ $professionalData['profileCompletion'] }}%"></div>
                            </div>
                        </div>
                        <ul class="space-y-2 text-sm text-gray-700">
                            <li>
                                <span class="text-green-600 font-bold">✓</span> Informations de base complétées
                            </li>
                            <li>
                                <span class="text-green-600 font-bold">✓</span> Photo de profil téléchargée
                            </li>
                            <li>
                                <span class="text-gray-400 font-bold">✗</span> Ajouter des images du portfolio
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <!-- Contenu de l’onglet Réservations -->
        <div x-show="activeTab === 'bookings'" x-cloak>
            <div class="bg-white rounded-lg shadow overflow-hidden">
                <div class="px-6 py-4 border-b flex justify-between items-center">
                    <h3 class="text-lg font-medium text-gray-900">Mes réservations</h3>
                    <div class="flex space-x-2">
                        <button class="text-sm font-medium text-gray-700 border border-gray-300 rounded-md px-3 py-1 hover:bg-gray-100">Filtrer</button>
                        <button class="text-sm font-medium text-white bg-blue-600 px-3 py-1 rounded-md hover:bg-blue-700">Exporter</button>
                    </div>
                </div>
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Client</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Service</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date & Heure</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Statut</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Prix</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach($bookings as $booking)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm font-medium text-gray-900">{{ $booking['client'] }}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-500">{{ $booking['service'] }}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-500">{{ $booking['date'] }}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    @if($booking['status'] === 'confirmed')
                                        <span class="px-2 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-800">Confirmé</span>
                                    @elseif($booking['status'] === 'pending')
                                        <span class="px-2 py-1 text-xs font-semibold rounded-full bg-yellow-100 text-yellow-800">En attente</span>
                                    @elseif($booking['status'] === 'completed')
                                        <span class="px-2 py-1 text-xs font-semibold rounded-full bg-blue-100 text-blue-800">Terminé</span>
                                    @endif
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm font-medium text-gray-900">${{ $booking['price'] }}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                    <a href="#" class="text-blue-600 hover:text-blue-900">Voir les détails</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="px-6 py-4 border-t">
                    <div class="flex justify-between items-center">
                        <div class="text-sm text-gray-500">
                            Affichage de <span class="font-medium">1</span> à <span class="font-medium">{{ count($bookings) }}</span> sur <span class="font-medium">{{ count($bookings) }}</span> résultats
                        </div>
                        <div class="flex space-x-2">
                            <button class="px-3 py-1 border rounded-md text-sm font-medium text-gray-700 bg-white hover:bg-gray-50">Précédent</button>
                            <button class="px-3 py-1 border rounded-md text-sm font-medium text-gray-700 bg-white hover:bg-gray-50">Suivant</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Contenu de l’onglet Avis -->
        <div x-show="activeTab === 'reviews'" x-cloak>
            <div class="bg-white rounded-lg shadow p-6">
                <h2 class="text-xl font-semibold mb-4">Avis des clients</h2>
                <div class="space-y-4">
                    <div class="border-b pb-4">
                        <div class="flex justify-between">
                            <div class="flex items-center">
                                <div class="w-10 h-10 bg-gray-300 rounded-full mr-3"></div>
                                <div>
                                    <p class="font-medium">Sarah Johnson</p>
                                    <div class="flex items-center">
                                        ⭐⭐⭐⭐⭐
                                        <span class="text-gray-500 text-sm ml-2">il y a 2 jours</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <p class="mt-2 text-gray-700">Un travail incroyable pour réparer mon évier de cuisine. Très professionnel et ponctuel !</p>
                    </div>
                    <div class="border-b pb-4">
                        <div class="flex justify-between">
                            <div class="flex items-center">
                                <div class="w-10 h-10 bg-gray-300 rounded-full mr-3"></div>
                                <div>
                                    <p class="font-medium">Mike Wilson</p>
                                    <div class="flex items-center">
                                        ⭐⭐⭐⭐
                                        <span class="text-gray-500 text-sm ml-2">il y a 1 semaine</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <p class="mt-2 text-gray-700">Excellent travail sur la plomberie de la salle de bain. Je ferai appel à nouveau !</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Contenu de l’onglet Paramètres -->
        <div x-show="activeTab === 'settings'" x-cloak>
            <div class="bg-white rounded-lg shadow p-6">
                <h2 class="text-xl font-semibold mb-6">Paramètres du compte</h2>
                
                <div class="space-y-6">
                    <div>
                        <h3 class="text-lg font-medium mb-3">Informations du profil</h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Prénom</label>
                                <input type="text" value="{{ explode(' ', $professionalData['name'])[0] }}" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Nom</label>
                                <input type="text" value="{{ explode(' ', $professionalData['name'])[1] ?? '' }}" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Email</label>
                                <input type="email" value="john.smith@example.com" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Téléphone</label>
                                <input type="tel" value="+1 (555) 123-4567" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                            </div>
                        </div>
                    </div>
                    
                    <div>
                        <h3 class="text-lg font-medium mb-3">Préférences de service</h3>
                        <div class="space-y-2">
                            <label class="inline-flex items-center">
                                <input type="checkbox" checked class="rounded text-blue-600 focus:ring-blue-500">
                                <span class="ml-2">Recevoir les notifications de réservation</span>
                            </label>
                            <br>
                            <label class="inline-flex items-center">
                                <input type="checkbox" checked class="rounded text-blue-600 focus:ring-blue-500">
                                <span class="ml-2">Recevoir les notifications d’avis</span>
                            </label>
                        </div>
                    </div>
                    
                    <div class="pt-4 border-t">
                        <button type="button" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                            Enregistrer les modifications
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
