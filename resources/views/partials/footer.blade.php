@php($company = \App\Support\SiteData::company())
@php($services = array_slice(\App\Support\SiteData::services(), 0, 6))
<footer class="bg-navy-dark text-slate-300 mt-24">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-16 pb-10">
        <div class="grid gap-10 lg:grid-cols-12">
            <div class="lg:col-span-4">
                <div class="flex items-center gap-2">
                    <span class="w-9 h-9 rounded-xl bg-white/10 text-accent grid place-items-center font-extrabold">C</span>
                    <span class="font-extrabold text-white">Click<span class="text-accent">Software</span>GH</span>
                </div>
                <p class="mt-4 text-sm leading-relaxed text-slate-400">
                    {{ $company['tagline'] }}. We design and build websites, mobile apps and business systems that help organizations work smarter.
                </p>
                <div class="mt-5 flex items-center gap-3">
                    <a href="{{ $company['social']['facebook'] }}" class="w-9 h-9 grid place-items-center rounded-full bg-white/5 hover:bg-accent hover:text-navy transition" aria-label="Facebook"><i class="fa-brands fa-facebook-f"></i></a>
                    <a href="{{ $company['social']['twitter'] }}" class="w-9 h-9 grid place-items-center rounded-full bg-white/5 hover:bg-accent hover:text-navy transition" aria-label="Twitter"><i class="fa-brands fa-x-twitter"></i></a>
                    <a href="{{ $company['social']['linkedin'] }}" class="w-9 h-9 grid place-items-center rounded-full bg-white/5 hover:bg-accent hover:text-navy transition" aria-label="LinkedIn"><i class="fa-brands fa-linkedin-in"></i></a>
                    <a href="{{ $company['social']['instagram'] }}" class="w-9 h-9 grid place-items-center rounded-full bg-white/5 hover:bg-accent hover:text-navy transition" aria-label="Instagram"><i class="fa-brands fa-instagram"></i></a>
                </div>
            </div>

            <div class="lg:col-span-2">
                <h4 class="text-white font-semibold mb-4">Company</h4>
                <ul class="space-y-2 text-sm">
                    <li><a href="{{ route('home') }}" class="hover:text-accent">Home</a></li>
                    <li><a href="{{ route('about') }}" class="hover:text-accent">About Us</a></li>
                    <li><a href="{{ route('services') }}" class="hover:text-accent">Services</a></li>
                    <li><a href="{{ route('projects.index') }}" class="hover:text-accent">Projects</a></li>
                    <li><a href="{{ route('blog.index') }}" class="hover:text-accent">Blog</a></li>
                    <li><a href="{{ route('contact') }}" class="hover:text-accent">Contact</a></li>
                </ul>
            </div>

            <div class="lg:col-span-3">
                <h4 class="text-white font-semibold mb-4">Services</h4>
                <ul class="space-y-2 text-sm">
                    @foreach ($services as $svc)
                        <li><a href="{{ route('services') }}#{{ $svc['slug'] }}" class="hover:text-accent">{{ $svc['title'] }}</a></li>
                    @endforeach
                </ul>
            </div>

            <div class="lg:col-span-3">
                <h4 class="text-white font-semibold mb-4">Get in Touch</h4>
                <ul class="space-y-3 text-sm">
                    <li class="flex gap-3"><i class="fa-solid fa-location-dot text-accent mt-1"></i><span>{{ $company['address'] }}</span></li>
                    <li class="flex gap-3"><i class="fa-solid fa-envelope text-accent mt-1"></i><a href="mailto:{{ $company['email'] }}" class="hover:text-accent">{{ $company['email'] }}</a></li>
                    @foreach ($company['phones'] as $phone)
                        <li class="flex gap-3"><i class="fa-solid fa-phone text-accent mt-1"></i><a href="tel:{{ preg_replace('/\s+/', '', $phone) }}" class="hover:text-accent">{{ $phone }}</a></li>
                    @endforeach
                </ul>
            </div>
        </div>

        <div class="mt-12 pt-6 border-t border-white/10 flex flex-col md:flex-row items-center justify-between gap-3 text-xs text-slate-400">
            <p>&copy; {{ date('Y') }} Click Software GH. All rights reserved.</p>
            <div class="flex items-center gap-5">
                <a href="{{ route('privacy') }}" class="hover:text-accent">Privacy Policy</a>
                <a href="{{ route('terms') }}" class="hover:text-accent">Terms &amp; Conditions</a>
            </div>
        </div>
    </div>
</footer>
