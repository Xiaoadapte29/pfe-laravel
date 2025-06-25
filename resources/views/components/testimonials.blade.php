<section class="bg-blue-600 py-12 text-white text-center">
    <div class="container mx-auto px-4">
        <h2 class="text-3xl font-bold mb-2">Témoignages Clients</h2>
        <p class="mb-10">Découvrez ce que nos clients satisfaits disent de nos services</p>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="bg-white text-gray-900 rounded-xl p-6 shadow-lg">
                <div class="flex items-center mb-4">
                    <img src="https://i.pravatar.cc/40?img=1" alt="Jennifer" class="w-10 h-10 rounded-full mr-3">
                    <div>
                        <p class="font-bold">Jennifer K.</p>
                        <p class="text-sm text-gray-600">Service de plomberie</p>
                    </div>
                    <div class="ml-auto text-yellow-400">
                        @for ($i = 0; $i < 5; $i++)
                            <i class="fas fa-star"></i>
                        @endfor
                    </div>
                </div>
                <p>"Le plombier était incroyable ! Il a réparé mon évier de cuisine en un rien de temps et a expliqué ce qui s’est passé. Je referai appel à FixHome sans hésiter."</p>
            </div>

            <div class="bg-white text-gray-900 rounded-xl p-6 shadow-lg">
                <div class="flex items-center mb-4">
                    <img src="https://i.pravatar.cc/40?img=2" alt="Michael" class="w-10 h-10 rounded-full mr-3">
                    <div>
                        <p class="font-bold">Michael T.</p>
                        <p class="text-sm text-gray-600">Installation électrique</p>
                    </div>
                    <div class="ml-auto text-yellow-400">
                        @for ($i = 0; $i < 4; $i++)
                            <i class="fas fa-star"></i>
                        @endfor
                    </div>
                </div>
                <p>"Service très professionnel. L’électricien était ponctuel, compétent, et a réparé mes prises en toute sécurité. Excellente expérience !"</p>
            </div>

            <div class="bg-white text-gray-900 rounded-xl p-6 shadow-lg">
                <div class="flex items-center mb-4">
                    <img src="https://i.pravatar.cc/40?img=3" alt="Sophia" class="w-10 h-10 rounded-full mr-3">
                    <div>
                        <p class="font-bold">Sophia R.</p>
                        <p class="text-sm text-gray-600">Nettoyage à domicile</p>
                    </div>
                    <div class="ml-auto text-yellow-400">
                        @for ($i = 0; $i < 5; $i++)
                            <i class="fas fa-star"></i>
                        @endfor
                    </div>
                </div>
                <p>"Service de nettoyage exceptionnel ! Mon appartement n’a jamais été aussi propre. L’attention aux détails était impressionnante. Je recommande vivement !"</p>
            </div>
        </div>

        <div class="mt-8 flex justify-center gap-4">
            <button class="w-10 h-10 rounded-full bg-blue-800 text-white hover:bg-blue-700">
                <i class="fas fa-chevron-left"></i>
            </button>
            <button class="w-10 h-10 rounded-full bg-blue-800 text-white hover:bg-blue-700">
                <i class="fas fa-chevron-right"></i>
            </button>
        </div>
    </div>
</section>
