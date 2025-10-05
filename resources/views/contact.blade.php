<x-blog-layout>
    <section class="min-h-screen bg-gray-50 flex flex-col justify-center py-20 relative overflow-hidden">
        <!-- Decorative background circles -->
        <div class="absolute top-0 left-0 w-96 h-96 bg-pink-100 rounded-full -translate-x-1/2 -translate-y-1/2 opacity-30"></div>
        <div class="absolute bottom-0 right-0 w-96 h-96 bg-blue-100 rounded-full translate-x-1/2 translate-y-1/2 opacity-30"></div>

        <div class="container mx-auto text-center px-5 relative z-10">
            <h1 class="text-4xl sm:text-5xl font-bold text-gray-800 mb-4">
                Bizimle İletişime Geçin
            </h1>
            <p class="text-gray-600 text-lg sm:text-xl mb-12 max-w-2xl mx-auto">
                Sizi sosyal medya platformlarımızda görmekten mutluluk duyarız. Aşağıdaki bağlantılara tıklayarak bizimle iletişime geçebilirsiniz.
            </p>

            <!-- Social media grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-8">
                <!-- Instagram -->
                <a href="https://www.instagram.com/berlindeyiz.de" target="_blank"
                   class="flex flex-col items-center justify-center bg-white shadow-lg rounded-2xl p-8 hover:scale-105 transform transition-all duration-300">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-14 h-14 text-pink-500 mb-4" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M7.75 2h8.5A5.75 5.75 0 0 1 22 7.75v8.5A5.75 5.75 0 0 1 16.25 22h-8.5A5.75 5.75 0 0 1 2 16.25v-8.5A5.75 5.75 0 0 1 7.75 2zm0 1.5A4.25 4.25 0 0 0 3.5 7.75v8.5A4.25 4.25 0 0 0 7.75 20.5h8.5a4.25 4.25 0 0 0 4.25-4.25v-8.5A4.25 4.25 0 0 0 16.25 3.5h-8.5zm8.75 2a.75.75 0 1 1 0 1.5a.75.75 0 0 1 0-1.5zm-4.25 1.5a5.25 5.25 0 1 1 0 10.5a5.25 5.25 0 0 1 0-10.5zm0 1.5a3.75 3.75 0 1 0 0 7.5a3.75 3.75 0 0 0 0-7.5z"/>
                    </svg>
                    <span class="text-lg font-semibold text-gray-800">Instagram</span>
                </a>

                <!-- YouTube -->
                <a href="https://www.youtube.com/@berlindeyiz" target="_blank"
                   class="flex flex-col items-center justify-center bg-white shadow-lg rounded-2xl p-8 hover:scale-105 transform transition-all duration-300">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-14 h-14 text-red-600 mb-4" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M23.498 6.186a2.994 2.994 0 0 0-2.115-2.117C19.392 3.5 12 3.5 12 3.5s-7.392 0-9.383.569a2.994 2.994 0 0 0-2.115 2.117A31.09 31.09 0 0 0 0 12a31.09 31.09 0 0 0 .502 5.814a2.994 2.994 0 0 0 2.115 2.117c1.991.569 9.383.569 9.383.569s7.392 0 9.383-.569a2.994 2.994 0 0 0 2.115-2.117A31.09 31.09 0 0 0 24 12a31.09 31.09 0 0 0-.502-5.814zM9.75 15.5v-7l6 3.5l-6 3.5z"/>
                    </svg>
                    <span class="text-lg font-semibold text-gray-800">YouTube</span>
                </a>

                <!-- Facebook -->
                <a href="https://www.facebook.com/berlindeyiz" target="_blank"
                   class="flex flex-col items-center justify-center bg-white shadow-lg rounded-2xl p-8 hover:scale-105 transform transition-all duration-300">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-14 h-14 text-blue-600 mb-4" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 5 3.657 9.127 8.438 9.879v-6.987h-2.54V12h2.54V9.797c0-2.507 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.464h-1.26c-1.242 0-1.63.771-1.63 1.562V12h2.773l-.443 2.892h-2.33v6.987C18.343 21.127 22 17 22 12z"/>
                    </svg>
                    <span class="text-lg font-semibold text-gray-800">Facebook</span>
                </a>

                <!-- TikTok -->
                <a href="https://www.tiktok.com/@berlindeyiz.de" target="_blank"
                   class="flex flex-col items-center justify-center bg-white shadow-lg rounded-2xl p-8 hover:scale-105 transform transition-all duration-300">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-14 h-14 text-black mb-4" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M9 2v16.5a4.5 4.5 0 1 0 4.5-4.5V6h4V2H9z"/>
                    </svg>
                    <span class="text-lg font-semibold text-gray-800">TikTok</span>
                </a>
            </div>

            <p class="mt-16 text-gray-500 text-sm max-w-xl mx-auto">
                Tüm sosyal medya hesaplarımızda en güncel haberler ve etkinlikler için bizi takip edin.
            </p>
        </div>
    </section>
</x-blog-layout>
