<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <title>Admin Login | Hospital Consult</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        brandNavy: '#1C3E6B',
                        brandCyan: '#06C2C9',
                    }
                }
            }
        }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/gsap.min.js"></script>
    <script src="https://unpkg.com/lucide@latest"></script>

    <style>
        /* Smooth UX: Highlight icons when input is focused */
        .input-group:focus-within i {
            color: #06C2C9;
        }

        /* Better Background Blend */
        .bg-overlay {
            background: linear-gradient(135deg, rgba(28, 62, 107, 0.9) 0%, rgba(28, 62, 107, 0.4) 100%);
        }
    </style>
</head>

<body class="bg-gray-50 min-h-screen flex items-center justify-center p-4 sm:p-6">

    <div id="alert"
        class="fixed top-4 right-4 left-4 sm:left-auto sm:top-6 sm:right-6 hidden z-50 max-w-sm bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-xl shadow-xl flex items-start gap-3">
        <i data-lucide="alert-circle" class="w-5 h-5 mt-0.5 flex-shrink-0"></i>
        <span id="alertMessage" class="text-sm font-medium"></span>
    </div>

    <div class="absolute inset-0 overflow-hidden">
        <div class="absolute inset-0 bg-overlay z-10"></div>
        <img src="https://images.unsplash.com/photo-1586773860418-d37222d8fce3" class="w-full h-full object-cover"
            alt="Hospital Background" />
    </div>

    <div id="loginCard"
        class="relative z-20 bg-white shadow-2xl rounded-2xl w-full max-w-[440px] p-6 sm:p-10 opacity-0 translate-y-6">

        <div class="text-center mb-8">
            <div class="flex justify-center mb-4">
                <div class="p-3 bg-cyan-50 rounded-2xl">
                    <i data-lucide="shield-check" class="w-10 h-10 text-brandCyan"></i>
                </div>
            </div>
            <h1 class="text-2xl font-bold text-brandNavy">Admin Login</h1>
            <p class="text-sm text-gray-500 mt-1">Hospital Consult Management</p>
        </div>

        <form id="loginForm" class="space-y-5">

            <div class="input-group">
                <label class="text-sm font-semibold text-brandNavy ml-1">Email Address</label>
                <div class="relative mt-1.5">
                    <i data-lucide="mail" class="absolute left-4 top-3 w-5 h-5 text-gray-400 transition-colors"></i>
                    <input id="email" name="email" type="email" required autocomplete="username"
                        placeholder="name@hospital.com"
                        class="pl-12 w-full border border-gray-200 rounded-xl py-3 focus:ring-2 focus:ring-brandCyan focus:border-transparent focus:outline-none transition-all placeholder:text-gray-300" />
                </div>
                <p id="emailError" class="hidden text-xs text-red-500 mt-1.5 ml-1"></p>
            </div>

            <div class="input-group">
                <div class="flex justify-between items-center px-1">
                    <label class="text-sm font-semibold text-brandNavy">Password</label>
                    <a href="#" class="text-xs font-medium text-brandCyan hover:text-brandNavy transition-colors">Forgot
                        Password?</a>
                </div>
                <div class="relative mt-1.5">
                    <i data-lucide="lock" class="absolute left-4 top-3 w-5 h-5 text-gray-400 transition-colors"></i>
                    <input id="password" name="password" type="password" required autocomplete="current-password"
                        placeholder="••••••••"
                        class="pl-12 pr-12 w-full border border-gray-200 rounded-xl py-3 focus:ring-2 focus:ring-brandCyan focus:border-transparent focus:outline-none transition-all placeholder:text-gray-300" />

                    <button type="button" id="togglePassword"
                        class="absolute right-4 top-3 text-gray-400 hover:text-brandCyan transition-colors">
                        <i data-lucide="eye" id="eyeIcon" class="w-5 h-5"></i>
                    </button>
                </div>
                <p id="passwordError" class="hidden text-xs text-red-500 mt-1.5 ml-1"></p>
            </div>

            <button id="loginBtn" type="submit"
                class="w-full mt-4 flex items-center justify-center gap-2 bg-brandNavy hover:bg-slate-800 text-white py-3.5 rounded-xl font-bold shadow-lg shadow-blue-900/20 transition-all active:scale-[0.98]">
                <span id="btnText">Sign In to Dashboard</span>
                <span id="spinner"
                    class="hidden w-5 h-5 border-2 border-white border-t-transparent rounded-full animate-spin"></span>
            </button>

        </form>

        <div class="mt-8 pt-6 border-t border-gray-100">
            <p class="text-center text-[10px] uppercase tracking-[0.2em] text-gray-400 font-bold">
                System Security Level: High
            </p>
        </div>
    </div>

    <script>
        lucide.createIcons();

        // GSAP Entrance
        gsap.to("#loginCard", {
            y: 0,
            opacity: 1,
            duration: 1.2,
            ease: "power4.out",
        });

        const form = document.getElementById("loginForm");
        const email = document.getElementById("email");
        const password = document.getElementById("password");
        const togglePassword = document.getElementById("togglePassword");
        const eyeIcon = document.getElementById("eyeIcon");
        const btn = document.getElementById("loginBtn");
        const btnText = document.getElementById("btnText");
        const spinner = document.getElementById("spinner");
        const alertBox = document.getElementById("alert");
        const alertMessage = document.getElementById("alertMessage");

        // UX: Password Toggle
        togglePassword.addEventListener("click", () => {
            const isPassword = password.type === "password";
            password.type = isPassword ? "text" : "password";
            eyeIcon.setAttribute("data-lucide", isPassword ? "eye-off" : "eye");
            lucide.createIcons();
        });

        function showAlert(message) {
            alertMessage.textContent = message;
            alertBox.classList.remove("hidden");

            // Feedback: Shake card
            gsap.to("#loginCard", { x: 8, repeat: 3, yoyo: true, duration: 0.06, onComplete: () => gsap.set("#loginCard", { x: 0 }) });

            gsap.fromTo("#alert", { x: 20, opacity: 0 }, { x: 0, opacity: 1, duration: 0.4 });
            setTimeout(() => {
                gsap.to("#alert", { x: 20, opacity: 0, duration: 0.3, onComplete: () => alertBox.classList.add("hidden") });
            }, 4000);
        }

        function setLoading(state) {
            btn.disabled = state;
            spinner.classList.toggle("hidden", !state);
            btnText.textContent = state ? "Authenticating..." : "Sign In to Dashboard";
            btn.classList.toggle("opacity-90", state);
        }

        form.addEventListener("submit", async (e) => {
            e.preventDefault();
            document.querySelectorAll(".text-red-500").forEach(p => p.classList.add("hidden"));

            let valid = true;
            if (!email.value.includes("@")) {
                document.getElementById("emailError").textContent = "Invalid email format";
                document.getElementById("emailError").classList.remove("hidden");
                valid = false;
            }
            if (password.value.length < 6) {
                document.getElementById("passwordError").textContent = "Password too short";
                document.getElementById("passwordError").classList.remove("hidden");
                valid = false;
            }

            if (!valid) {
                gsap.to("#loginCard", { x: 5, repeat: 3, yoyo: true, duration: 0.05 });
                return;
            }

            setLoading(true);
            try {
                // Simulation of API Call
                await new Promise(r => setTimeout(r, 1500));

                const res = await fetch("/api/auth/admin/login", {
                    method: "POST",
                    headers: { "Content-Type": "application/json" },
                    body: JSON.stringify({ email: email.value, password: password.value }),
                });

                if (!res.ok) throw new Error("Unauthorized Access");
                window.location.href = "/admin/dashboard";
            } catch (err) {
                showAlert(err.message || "Connection error. Please try again.");
            } finally {
                setLoading(false);
            }
        });
    </script>
</body>

</html>