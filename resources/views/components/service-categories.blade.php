<section class="py-16 bg-gray-50">
  <div class="container mx-auto px-4">
    <div class="text-center max-w-2xl mx-auto mb-12">
      <h2 class="text-3xl font-bold mb-4">Nos catégories de services</h2>
      <p class="text-gray-600">
        Parcourez notre large gamme de services professionnels à domicile et trouvez exactement ce dont vous avez besoin
      </p>
    </div>
    
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
      <a href="{{ url('/services') }}?category=plomberie" class="bg-white p-6 rounded-lg shadow-md hover:shadow-lg transition-all hover:-translate-y-1 group">
        <div class="flex flex-col items-center text-center">
          <div class="p-4 rounded-full bg-blue-50 text-fixhome-primary mb-4 group-hover:bg-fixhome-primary group-hover:text-white transition-colors">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/>
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
            </svg>
          </div>
          <h3 class="text-lg font-medium mb-2">Plomberie</h3>
          <p class="text-gray-500 text-sm">Robinet qui fuit, installation de tuyaux, et plus</p>
        </div>
      </a>

      <a href="{{ url('/services') }}?category=électricité" class="bg-white p-6 rounded-lg shadow-md hover:shadow-lg transition-all hover:-translate-y-1 group">
        <div class="flex flex-col items-center text-center">
          <div class="p-4 rounded-full bg-blue-50 text-fixhome-primary mb-4 group-hover:bg-fixhome-primary group-hover:text-white transition-colors">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
            </svg>
          </div>
          <h3 class="text-lg font-medium mb-2">Électricité</h3>
          <p class="text-gray-500 text-sm">Câblage, installations, et réparations électriques</p>
        </div>
      </a>

      <a href="{{ url('/services') }}?category=peinture" class="bg-white p-6 rounded-lg shadow-md hover:shadow-lg transition-all hover:-translate-y-1 group">
        <div class="flex flex-col items-center text-center">
          <div class="p-4 rounded-full bg-blue-50 text-fixhome-primary mb-4 group-hover:bg-fixhome-primary group-hover:text-white transition-colors">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zm0 0h12a2 2 0 002-2v-4a2 2 0 00-2-2h-2.343M11 7.343l1.657-1.657a2 2 0 012.828 0l2.829 2.829a2 2 0 010 2.828l-8.486 8.485M7 17h.01"/>
            </svg>
          </div>
          <h3 class="text-lg font-medium mb-2">Peinture</h3>
          <p class="text-gray-500 text-sm">Services de peinture intérieure et extérieure</p>
        </div>
      </a>

      <a href="{{ url('/services') }}?category=déménagement" class="bg-white p-6 rounded-lg shadow-md hover:shadow-lg transition-all hover:-translate-y-1 group">
        <div class="flex flex-col items-center text-center">
          <div class="p-4 rounded-full bg-blue-50 text-fixhome-primary mb-4 group-hover:bg-fixhome-primary group-hover:text-white transition-colors">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4"/>
            </svg>
          </div>
          <h3 class="text-lg font-medium mb-2">Déménagement</h3>
          <p class="text-gray-500 text-sm">Services professionnels de déménagement et d'emballage</p>
        </div>
      </a>

      <a href="{{ url('/services') }}?category=menuiserie" class="bg-white p-6 rounded-lg shadow-md hover:shadow-lg transition-all hover:-translate-y-1 group">
        <div class="flex flex-col items-center text-center">
          <div class="p-4 rounded-full bg-blue-50 text-fixhome-primary mb-4 group-hover:bg-fixhome-primary group-hover:text-white transition-colors">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
            </svg>
          </div>
          <h3 class="text-lg font-medium mb-2">Menuiserie</h3>
          <p class="text-gray-500 text-sm">Meubles sur mesure et réparations en bois</p>
        </div>
      </a>

      <a href="{{ url('/services') }}?category=jardinage" class="bg-white p-6 rounded-lg shadow-md hover:shadow-lg transition-all hover:-translate-y-1 group">
        <div class="flex flex-col items-center text-center">
          <div class="p-4 rounded-full bg-blue-50 text-fixhome-primary mb-4 group-hover:bg-fixhome-primary group-hover:text-white transition-colors">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zm0 0h12a2 2 0 002-2v-4a2 2 0 00-2-2h-2.343M11 7.343l1.657-1.657a2 2 0 012.828 0l2.829 2.829a2 2 0 010 2.828l-8.486 8.485M7 17h.01"/>
            </svg>
          </div>
          <h3 class="text-lg font-medium mb-2">Jardinage</h3>
          <p class="text-gray-500 text-sm">Aménagement paysager et entretien de jardins</p>
        </div>
      </a>

      <a href="{{ url('/services') }}?category=nettoyage" class="bg-white p-6 rounded-lg shadow-md hover:shadow-lg transition-all hover:-translate-y-1 group">
        <div class="flex flex-col items-center text-center">
          <div class="p-4 rounded-full bg-blue-50 text-fixhome-primary mb-4 group-hover:bg-fixhome-primary group-hover:text-white transition-colors">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/>
            </svg>
          </div>
          <h3 class="text-lg font-medium mb-2">Nettoyage</h3>
          <p class="text-gray-500 text-sm">Nettoyage en profondeur et entretien régulier</p>
        </div>
      </a>

      <a href="{{ url('/services') }}?category=sécurité" class="bg-white p-6 rounded-lg shadow-md hover:shadow-lg transition-all hover:-translate-y-1 group">
        <div class="flex flex-col items-center text-center">
          <div class="p-4 rounded-full bg-blue-50 text-fixhome-primary mb-4 group-hover:bg-fixhome-primary group-hover:text-white transition-colors">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
            </svg>
          </div>
          <h3 class="text-lg font-medium mb-2">Sécurité</h3>
          <p class="text-gray-500 text-sm">Installation de systèmes de sécurité pour la maison</p>
        </div>
      </a>
    </div>
    
    <div class="text-center mt-12">
      <a href="/services" class="text-fixhome-primary hover:text-fixhome-primary/80 font-medium inline-flex items-center">
        Voir tous les services
        <span class="ml-2">→</span>
      </a>
    </div>
  </div>
</section>
