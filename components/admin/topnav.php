<header
    class="fixed top-0 left-0 right-0 h-16 bg-white/80 backdrop-blur-md shadow-sm z-30 flex items-center justify-between px-4 lg:px-8 lg:ml-64">
    <div class="flex items-center gap-4">
        <button id="toggleSidebar" class="p-2 rounded-lg hover:bg-gray-100 lg:hidden text-brandNavy">
            <i data-lucide="menu" class="w-6 h-6"></i>
        </button>
        <h1 class="text-lg font-bold text-brandNavy hidden sm:block">Hospital Consult</h1>
    </div>

    <div class="flex items-center gap-3 sm:gap-6">
        <button class="relative p-2 text-gray-400 hover:text-brandCyan transition-colors">
            <i data-lucide="bell" class="w-5 h-5"></i>
            <span
                class="absolute top-1 right-1 bg-red-500 text-white text-[10px] w-4 h-4 flex items-center justify-center rounded-full border-2 border-white">3</span>
        </button>

        <div class="flex items-center gap-3 border-l pl-4 sm:pl-6 border-gray-100">
            <div class="text-right hidden sm:block">
                <p class="text-xs font-bold text-brandNavy">Dr. Admin</p>
                <p class="text-[10px] text-gray-400 uppercase tracking-tighter">Chief Surgeon</p>
            </div>
            <div
                class="w-10 h-10 rounded-xl bg-brandNavy flex items-center justify-center text-brandCyan font-bold shadow-inner">
                AD
            </div>
        </div>
    </div>
</header>