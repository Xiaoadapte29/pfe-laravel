

<?php $__env->startSection('content'); ?>
<div class="bg-gray-100 min-h-screen" x-data="{ activeTab: 'overview' }">

  <!-- Header -->
  <header class="bg-white shadow-sm border-b">
    <div class="container mx-auto px-6 py-6 flex justify-between items-center">
      <div class="flex items-center space-x-5">
        <div class="w-16 h-16 bg-blue-600 rounded-full flex items-center justify-center text-white text-3xl font-extrabold select-none">
          <?php echo e(strtoupper(substr($professionalData['name'], 0, 1))); ?>

        </div>
        <div>
          <h1 class="text-3xl font-semibold text-gray-900">Bienvenue, <?php echo e($professionalData['name']); ?> !</h1>
          <div class="flex items-center space-x-4 mt-2">
            <span class="inline-block bg-green-100 text-green-800 text-xs font-semibold px-3 py-1 rounded-full uppercase tracking-wide">
              <?php echo e($professionalData['status'] === 'verified' ? 'Professionnel vérifié' : 'Vérification en attente'); ?>

            </span>
            <span class="flex items-center text-gray-700 text-sm font-medium select-none">
              <svg class="w-5 h-5 text-yellow-400 mr-1" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.29 3.966a1 1 0 00.95.69h4.178c.969 0 1.371 1.24.588 1.81l-3.39 2.462a1 1 0 00-.364 1.118l1.29 3.967c.3.921-.755 1.688-1.54 1.118L10 13.348l-3.39 2.462c-.784.57-1.838-.197-1.54-1.118l1.29-3.967a1 1 0 00-.364-1.118L3.606 9.393c-.783-.57-.38-1.81.588-1.81h4.178a1 1 0 00.95-.69l1.29-3.966z"/></svg>
              <?php echo e($professionalData['rating']); ?>

            </span>
          </div>
        </div>
      </div>
      <div class="flex space-x-3">

      </div>
    </div>
  </header>

  <!-- Tabs Navigation -->
  <nav class="bg-white shadow-sm sticky top-0 z-10 border-b">
    <div class="container mx-auto px-6">
      <div class="flex space-x-8 text-gray-600">
        <button @click="activeTab = 'overview'"
                :class="activeTab === 'overview' ? 'border-b-4 border-blue-600 text-blue-600 font-semibold' : 'hover:text-blue-600'"
                class="py-4 px-1 text-sm tracking-wide transition">
          Vue d’ensemble
        </button>
        <button @click="activeTab = 'bookings'"
                :class="activeTab === 'bookings' ? 'border-b-4 border-blue-600 text-blue-600 font-semibold' : 'hover:text-blue-600'"
                class="py-4 px-1 text-sm tracking-wide transition">
          Réservations
        </button>
        <button @click="activeTab = 'reviews'"
                :class="activeTab === 'reviews' ? 'border-b-4 border-blue-600 text-blue-600 font-semibold' : 'hover:text-blue-600'"
                class="py-4 px-1 text-sm tracking-wide transition">
          Avis
        </button>
        <button @click="activeTab = 'settings'"
                :class="activeTab === 'settings' ? 'border-b-4 border-blue-600 text-blue-600 font-semibold' : 'hover:text-blue-600'"
                class="py-4 px-1 text-sm tracking-wide transition">
          Paramètres
        </button>
      </div>
    </div>
  </nav>

  <main class="container mx-auto px-6 py-8 space-y-10">

    <!-- Overview Tab -->
    <section x-show="activeTab === 'overview'" x-cloak>
      <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
        <?php $__currentLoopData = [
          ['title' => 'Nombre total de travaux', 'value' => $professionalData['totalJobs']],
          ['title' => 'Vues du profil', 'value' => $professionalData['profileViews']],
          ['title' => 'Revenus totaux', 'value' => '$'.number_format($professionalData['earnings'])],
          ['title' => 'Note', 'value' => $professionalData['rating']],
        ]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $stat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <div class="bg-white p-6 rounded-lg shadow hover:shadow-lg transition">
            <p class="text-gray-500 font-semibold mb-2"><?php echo e($stat['title']); ?></p>
            <p class="text-3xl font-bold text-gray-900"><?php echo e($stat['value']); ?></p>
          </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </div>

      <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-8">
        <!-- Recent Bookings -->
        <div class="bg-white rounded-lg shadow p-6">
          <h2 class="text-xl font-semibold text-gray-900 mb-6">Réservations récentes</h2>
          <div class="space-y-4 max-h-96 overflow-y-auto">
            <?php $__currentLoopData = $bookings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $booking): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <div class="flex justify-between items-center bg-gray-50 rounded p-4 hover:bg-gray-100 transition">
                <div>
                  <p class="font-semibold text-gray-800"><?php echo e($booking['client']); ?></p>
                  <p class="text-gray-600 text-sm"><?php echo e($booking['service']); ?></p>
                </div>
                <div class="text-right">
                  <p class="font-semibold text-gray-900">$<?php echo e($booking['price']); ?></p>
                  <p class="text-gray-500 text-sm"><?php echo e($booking['date']); ?></p>
                </div>
              </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </div>
          <button @click="activeTab = 'bookings'" class="mt-4 w-full text-blue-600 font-semibold hover:underline text-center text-sm">
            Voir toutes les réservations
          </button>
        </div>

        <!-- Profile Completion -->
        <div class="bg-white rounded-lg shadow p-6">
          <h2 class="text-xl font-semibold text-gray-900 mb-6">Complétion du profil</h2>
          <div>
            <div class="flex justify-between mb-2 font-semibold text-gray-700">
              <span>Progression</span>
              <span><?php echo e($professionalData['profileCompletion']); ?>%</span>
            </div>
            <div class="w-full bg-gray-200 rounded-full h-3 mb-6">
              <div class="bg-blue-600 h-3 rounded-full" style="width: <?php echo e($professionalData['profileCompletion']); ?>%"></div>
            </div>
            <ul class="space-y-3 text-gray-700 text-sm">
              <li class="flex items-center">
                <svg class="w-5 h-5 text-green-600 mr-2" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"><path d="M5 13l4 4L19 7"/></svg>
                Informations de base complétées
              </li>
              <li class="flex items-center">
                <svg class="w-5 h-5 text-green-600 mr-2" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"><path d="M5 13l4 4L19 7"/></svg>
                Photo de profil téléchargée
              </li>
              <li class="flex items-center text-gray-400">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"><path d="M19 7l-7 7-3-3"/></svg>
                Ajouter des images du portfolio
              </li>
            </ul>
          </div>
        </div>
      </div>
    </section>

    <!-- Reviews Tab -->
    <section x-show="activeTab === 'reviews'" x-cloak>
      <div class="bg-white rounded-lg shadow p-6 max-w-4xl mx-auto space-y-6">
        <h2 class="text-2xl font-semibold mb-6">Avis des clients</h2>

        <?php $__empty_1 = true; $__currentLoopData = $reviews; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $review): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
          <article class="border-b pb-6 last:border-none">
            <div class="flex items-center space-x-4 mb-3">
              <div class="w-12 h-12 bg-gray-300 rounded-full flex items-center justify-center text-white text-lg font-semibold select-none">
                <?php echo e(strtoupper(substr($review->client->name, 0, 1))); ?>

              </div>
              <div>
                <h3 class="font-semibold text-gray-900"><?php echo e($review->client->name); ?></h3>
                <div class="flex items-center space-x-1">
                  <?php for($i = 1; $i <= 5; $i++): ?>
                    <?php if($i <= $review->rating): ?>
                      <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.29 3.966a1 1 0 00.95.69h4.178c.969 0 1.371 1.24.588 1.81l-3.39 2.462a1 1 0 00-.364 1.118l1.29 3.967c.3.921-.755 1.688-1.54 1.118L10 13.348l-3.39 2.462c-.784.57-1.838-.197-1.54-1.118l1.29-3.967a1 1 0 00-.364-1.118L3.606 9.393c-.783-.57-.38-1.81.588-1.81h4.178a1 1 0 00.95-.69l1.29-3.966z"/></svg>
                    <?php else: ?>
                      <svg class="w-5 h-5 text-gray-300" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.29 3.966a1 1 0 00.95.69h4.178c.969 0 1.371 1.24.588 1.81l-3.39 2.462a1 1 0 00-.364 1.118l1.29 3.967c.3.921-.755 1.688-1.54 1.118L10 13.348l-3.39 2.462c-.784.57-1.838-.197-1.54-1.118l1.29-3.967a1 1 0 00-.364-1.118L3.606 9.393c-.783-.57-.38-1.81.588-1.81h4.178a1 1 0 00.95-.69l1.29-3.966z"/></svg>
                    <?php endif; ?>
                  <?php endfor; ?>
                </div>
              </div>
            </div>
            <p class="text-gray-700"><?php echo e($review->comment); ?></p>
          </article>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
          <p class="text-gray-600 text-center">Aucun avis disponible.</p>
        <?php endif; ?>
      </div>
    </section>

    <!-- Bookings Tab -->
    <section x-show="activeTab === 'bookings'" x-cloak>
      <div class="bg-white rounded-lg shadow overflow-hidden">
        <div class="px-6 py-4 border-b flex justify-between items-center">
          <h2 class="text-xl font-semibold text-gray-900">Mes réservations</h2>
          <div class="flex space-x-2">
            
          </div>
        </div>
        <div class="overflow-x-auto">
          <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
              <tr>
                <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Client</th>
                <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Service</th>
                <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Date & Heure</th>
                <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Statut</th>
                <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Prix</th>
                <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Actions</th>
              </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
              <?php $__currentLoopData = $bookings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $booking): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                  <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900"><?php echo e($booking['client']); ?></td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700"><?php echo e($booking['service']); ?></td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700"><?php echo e($booking['date']); ?> <?php echo e($booking['time']); ?></td>
                 <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700 space-x-2">
  <?php if($booking['status'] === 'pending'): ?>
    <form action="<?php echo e(route('bookings.acceptRefuse', ['booking' => $booking['id'], 'action' => 'accept'])); ?>" method="POST" class="inline">
      <?php echo csrf_field(); ?>
      <button type="submit" class="bg-green-600 hover:bg-green-700 text-white px-3 py-1 rounded transition">Accepter</button>
    </form>
    <form action="<?php echo e(route('bookings.acceptRefuse', ['booking' => $booking['id'], 'action' => 'refuse'])); ?>" method="POST" class="inline ml-2">
      <?php echo csrf_field(); ?>
      <button type="submit" class="bg-red-600 hover:bg-red-700 text-white px-3 py-1 rounded transition">Refuser</button>
    </form>
  <?php else: ?>
    <span class="capitalize font-semibold text-gray-700"><?php echo e($booking['status']); ?></span>
  <?php endif; ?>
</td>

                  <td class="px-6 py-4 whitespace-nowrap text-sm font-semibold text-gray-900">$<?php echo e($booking['price']); ?></td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700 space-x-2">
                    <!-- Example: Edit / Cancel buttons (customize if needed) -->
                    <a href="#" class="text-blue-600 hover:underline">Détails</a>
                  </td>
                </tr>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
          </table>
        </div>
        <div class="px-6 py-4 border-t flex justify-between items-center text-sm text-gray-500">
          <div>
            Affichage de <span class="font-semibold">1</span> à <span class="font-semibold"><?php echo e(count($bookings)); ?></span> sur <span class="font-semibold"><?php echo e(count($bookings)); ?></span> résultats
          </div>
          <div class="space-x-2">
            <button class="px-3 py-1 border rounded-md hover:bg-gray-50">Précédent</button>
            <button class="px-3 py-1 border rounded-md hover:bg-gray-50">Suivant</button>
          </div>
        </div>
      </div>
    </section>

  <!-- Settings Tab -->
<section x-show="activeTab === 'settings'" x-cloak>
  <div class="space-y-6">
    <h2 class="text-2xl font-bold text-gray-900">Account Settings</h2>
    
    <div class="grid gap-6">
      <!-- Profile Information Card -->
      <div class="bg-white rounded-lg shadow p-6">
        <div class="flex justify-between items-center mb-6">
          <h3 class="text-lg font-semibold">Profile Information</h3>
          <button class="text-fixhome-primary hover:text-fixhome-primary-dark">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
              <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
            </svg>
          </button>
        </div>
        
        <form class="space-y-4">
          <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
              <label for="first_name" class="block text-sm font-medium text-gray-700">First Name</label>
              <input type="text" id="first_name" name="first_name" value="<?php echo e(auth()->user()->first_name); ?>" 
                     class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-fixhome-primary focus:ring-fixhome-primary sm:text-sm">
            </div>
            <div>
              <label for="last_name" class="block text-sm font-medium text-gray-700">Last Name</label>
              <input type="text" id="last_name" name="last_name" value="<?php echo e(auth()->user()->last_name); ?>" 
                     class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-fixhome-primary focus:ring-fixhome-primary sm:text-sm">
            </div>
          </div>
          
          <div>
            <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
            <input type="email" id="email" name="email" value="<?php echo e(auth()->user()->email); ?>" 
                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-fixhome-primary focus:ring-fixhome-primary sm:text-sm">
          </div>
          
          <div>
            <label for="phone" class="block text-sm font-medium text-gray-700">Phone Number</label>
            <input type="tel" id="phone" name="phone" value="<?php echo e(auth()->user()->phone); ?>" 
                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-fixhome-primary focus:ring-fixhome-primary sm:text-sm">
          </div>
          
          <div>
            <label for="specialty" class="block text-sm font-medium text-gray-700">Specialty</label>
            <select id="specialty" name="specialty" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-fixhome-primary focus:ring-fixhome-primary sm:text-sm">
              <option value="plumbing" <?php echo e(auth()->user()->specialty === 'plumbing' ? 'selected' : ''); ?>>Plumbing</option>
              <option value="electrical" <?php echo e(auth()->user()->specialty === 'electrical' ? 'selected' : ''); ?>>Electrical</option>
              <option value="carpentry" <?php echo e(auth()->user()->specialty === 'carpentry' ? 'selected' : ''); ?>>Carpentry</option>
              <option value="painting" <?php echo e(auth()->user()->specialty === 'painting' ? 'selected' : ''); ?>>Painting</option>
            </select>
          </div>
          
          <div class="pt-4">
            <button type="submit" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-fixhome-primary hover:bg-fixhome-primary-dark focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-fixhome-primary">
              Save Changes
            </button>
          </div>
        </form>
      </div>
      
      <!-- Notification Preferences Card -->
      <div class="bg-white rounded-lg shadow p-6">
        <div class="flex justify-between items-center mb-6">
          <h3 class="text-lg font-semibold">Notification Preferences</h3>
        </div>
        
        <form class="space-y-4">
          <div class="flex items-start">
            <div class="flex items-center h-5">
              <input id="email_notifications" name="email_notifications" type="checkbox" 
                     class="focus:ring-fixhome-primary h-4 w-4 text-fixhome-primary border-gray-300 rounded" checked>
            </div>
            <div class="ml-3 text-sm">
              <label for="email_notifications" class="font-medium text-gray-700">Email Notifications</label>
              <p class="text-gray-500">Receive important updates via email</p>
            </div>
          </div>
          
          <div class="flex items-start">
            <div class="flex items-center h-5">
              <input id="sms_notifications" name="sms_notifications" type="checkbox" 
                     class="focus:ring-fixhome-primary h-4 w-4 text-fixhome-primary border-gray-300 rounded" checked>
            </div>
            <div class="ml-3 text-sm">
              <label for="sms_notifications" class="font-medium text-gray-700">SMS Notifications</label>
              <p class="text-gray-500">Receive text message alerts</p>
            </div>
          </div>
          
          <div class="flex items-start">
            <div class="flex items-center h-5">
              <input id="promotional_emails" name="promotional_emails" type="checkbox" 
                     class="focus:ring-fixhome-primary h-4 w-4 text-fixhome-primary border-gray-300 rounded">
            </div>
            <div class="ml-3 text-sm">
              <label for="promotional_emails" class="font-medium text-gray-700">Promotional Emails</label>
              <p class="text-gray-500">Receive offers and promotions</p>
            </div>
          </div>
          
          <div class="pt-4">
            <button type="submit" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-fixhome-primary hover:bg-fixhome-primary-dark focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-fixhome-primary">
              Update Preferences
            </button>
          </div>
        </form>
      </div>
      
      <!-- Pricing & Services Card -->
      <div class="bg-white rounded-lg shadow p-6">
        <div class="flex justify-between items-center mb-6">
          <h3 class="text-lg font-semibold">Pricing & Services</h3>
          <button class="text-fixhome-primary hover:text-fixhome-primary-dark">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
              <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-11a1 1 0 10-2 0v2H7a1 1 0 100 2h2v2a1 1 0 102 0v-2h2a1 1 0 100-2h-2V7z" clip-rule="evenodd" />
            </svg>
          </button>
        </div>
        
        <div class="space-y-4">
          <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
              <thead class="bg-gray-50">
                <tr>
                  <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Service</th>
                  <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Description</th>
                  <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Price</th>
                  <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                </tr>
              </thead>
              <tbody class="bg-white divide-y divide-gray-200">
                <tr>
                  <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">Plumbing Repair</td>
                  <td class="px-6 py-4 text-sm text-gray-500">Basic plumbing repair services</td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">$120</td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                    <a href="#" class="text-fixhome-primary hover:text-fixhome-primary-dark mr-3">Edit</a>
                    <a href="#" class="text-red-600 hover:text-red-900">Delete</a>
                  </td>
                </tr>
                <tr>
                  <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">Pipe Installation</td>
                  <td class="px-6 py-4 text-sm text-gray-500">New pipe installation</td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">$250</td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                    <a href="#" class="text-fixhome-primary hover:text-fixhome-primary-dark mr-3">Edit</a>
                    <a href="#" class="text-red-600 hover:text-red-900">Delete</a>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
          
          <div class="pt-4">
            <button type="button" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-fixhome-primary hover:bg-fixhome-primary-dark focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-fixhome-primary">
              Add New Service
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

  </main>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\fixhome-laravel\resources\views/professionals/dashboard.blade.php ENDPATH**/ ?>