<aside id="sidebar"
    class="fixed top-0 left-0 h-screen w-64 bg-brandNavy text-white z-50 transition-transform -translate-x-full lg:translate-x-0 shadow-2xl">
    <div class="h-16 flex items-center gap-3 px-6 bg-black/10 border-b border-white/10">
        <i data-lucide="shield-check" class="text-brandCyan w-8 h-8"></i>
        <span class="text-lg font-bold tracking-tight">Admin<span class="text-brandCyan">Panel</span></span>
    </div>

    <nav class="mt-6 px-4">
        <ul class="space-y-1 text-sm font-medium">
            <li>
                <a href="/admin/dashboard.php"
                    class="flex items-center gap-3 px-4 py-3 rounded-xl bg-brandCyan text-brandNavy shadow-lg shadow-brandCyan/20">
                    <i data-lucide="layout-dashboard" class="w-5 h-5"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li>
                <a href="/admin/users.php"
                    class="flex items-center gap-3 px-4 py-3 rounded-xl hover:bg-white/10 transition-all text-white/80 hover:text-white group">
                    <i data-lucide="users" class="w-5 h-5 group-hover:scale-110 transition-transform"></i>
                    <span>Users</span>
                </a>
            </li>
            <li>
                <a href="/admin/doctors.php"
                    class="flex items-center gap-3 px-4 py-3 rounded-xl hover:bg-white/10 transition-all text-white/80 hover:text-white group">
                    <i data-lucide="stethoscope" class="w-5 h-5 group-hover:scale-110 transition-transform"></i>
                    <span>Doctors</span>
                </a>
            </li>
            <li>
                <a href="/admin/appointments.php"
                    class="flex items-center gap-3 px-4 py-3 rounded-xl hover:bg-white/10 transition-all text-white/80 hover:text-white group">
                    <i data-lucide="calendar" class="w-5 h-5 group-hover:scale-110 transition-transform"></i>
                    <span>Appointments</span>
                </a>
            </li>
            <li class="pt-6 mt-6 border-t border-white/10">
                <a href="/admin/logout.php"
                    class="flex items-center gap-3 px-4 py-3 rounded-xl hover:bg-red-500 transition-all text-red-200 hover:text-white group">
                    <i data-lucide="log-out" class="w-5 h-5 group-hover:translate-x-1 transition-transform"></i>
                    <span>Logout</span>
                </a>
            </li>
        </ul>
    </nav>
</aside>

<div id="sidebarOverlay" class="fixed inset-0 bg-black/50 z-40 hidden lg:hidden backdrop-blur-sm"></div>