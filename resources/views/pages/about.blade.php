@extends('layouts.app')

@section('content')
    <x-hero-section
        eyebrow="About Click Software GH"
        title="A Ghanaian software company building solutions for the world"
        subtitle="We are a structured team of engineers, designers and consultants based in Kumasi, committed to delivering reliable, modern and efficient IT services."
        :primary="['label' => 'Our Services', 'href' => route('services'), 'icon' => 'fa-briefcase']"
        :secondary="['label' => 'Talk to Us', 'href' => route('contact'), 'icon' => 'fa-phone']"
        :showStats="false"
    />

    {{-- Overview --}}
    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20">
        <div class="grid lg:grid-cols-2 gap-12 items-center">
            <div>
                <span class="text-sm font-semibold text-brand uppercase tracking-widest">Who We Are</span>
                <h2 class="mt-2 text-3xl lg:text-4xl font-extrabold text-navy">Engineering trustworthy software since 2018</h2>
                <p class="mt-4 text-slate-600 leading-relaxed">
                    Click Software GH is a Kumasi-based software development and IT services company. We partner with businesses, schools, hospitals, churches, NGOs, startups and government-related institutions to design and deliver high-impact digital solutions.
                </p>
                <p class="mt-3 text-slate-600 leading-relaxed">
                    Our work is grounded in clean engineering, transparent communication and long-term support — because real digital transformation only works when systems keep working long after launch.
                </p>
            </div>
            <div class="grid grid-cols-2 gap-4">
                <div class="rounded-2xl bg-gradient-to-br from-brand to-accent-dark p-6 text-white">
                    <div class="text-4xl font-extrabold">120+</div>
                    <div class="mt-1 text-sm opacity-90">Projects Delivered</div>
                </div>
                <div class="rounded-2xl bg-navy text-white p-6">
                    <div class="text-4xl font-extrabold">90+</div>
                    <div class="mt-1 text-sm opacity-90">Happy Clients</div>
                </div>
                <div class="rounded-2xl bg-accent text-navy p-6">
                    <div class="text-4xl font-extrabold">8+</div>
                    <div class="mt-1 text-sm">Years of Experience</div>
                </div>
                <div class="rounded-2xl bg-slate-100 p-6">
                    <div class="text-4xl font-extrabold text-navy">24/7</div>
                    <div class="mt-1 text-sm text-slate-600">Support Availability</div>
                </div>
            </div>
        </div>
    </section>

    {{-- Mission / Vision --}}
    <section class="bg-slate-100/60 py-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid md:grid-cols-2 gap-6">
            <div class="bg-white rounded-2xl p-8 border border-slate-100">
                <div class="w-12 h-12 grid place-items-center rounded-xl bg-brand/10 text-brand text-xl"><i class="fa-solid fa-bullseye"></i></div>
                <h3 class="mt-4 text-xl font-bold text-navy">Our Mission</h3>
                <p class="mt-2 text-slate-600">To empower organizations across Africa with dependable, modern software that simplifies operations and unlocks growth.</p>
            </div>
            <div class="bg-white rounded-2xl p-8 border border-slate-100">
                <div class="w-12 h-12 grid place-items-center rounded-xl bg-accent/15 text-accent-dark text-xl"><i class="fa-solid fa-eye"></i></div>
                <h3 class="mt-4 text-xl font-bold text-navy">Our Vision</h3>
                <p class="mt-2 text-slate-600">To be the most trusted multi-technology software partner from Ghana, building world-class platforms for clients near and far.</p>
            </div>
        </div>
    </section>

    {{-- Values --}}
    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20">
        <div class="text-center max-w-2xl mx-auto">
            <span class="text-sm font-semibold text-brand uppercase tracking-widest">Core Values</span>
            <h2 class="mt-2 text-3xl lg:text-4xl font-extrabold text-navy">The principles that guide our work</h2>
        </div>
        <div class="mt-12 grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($values as $v)
                <div class="bg-white rounded-2xl p-6 border border-slate-100 hover:shadow-soft transition">
                    <div class="w-12 h-12 grid place-items-center rounded-xl bg-brand/10 text-brand text-xl"><i class="{{ $v['icon'] }}"></i></div>
                    <h3 class="mt-4 font-bold text-navy">{{ $v['title'] }}</h3>
                    <p class="mt-2 text-sm text-slate-600">{{ $v['text'] }}</p>
                </div>
            @endforeach
        </div>
    </section>

    {{-- Team --}}
    <section class="bg-slate-100/60 py-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-2xl mx-auto">
                <span class="text-sm font-semibold text-brand uppercase tracking-widest">Meet the Team</span>
                <h2 class="mt-2 text-3xl lg:text-4xl font-extrabold text-navy">A small team. Big ideas. Real impact.</h2>
            </div>
            <div class="mt-12 grid sm:grid-cols-2 lg:grid-cols-4 gap-6">
                @foreach ($team as $member)
                    <div class="bg-white rounded-2xl p-6 border border-slate-100 text-center hover:shadow-soft transition">
                        <img src="{{ $member['avatar'] }}" alt="{{ $member['name'] }}" class="w-24 h-24 rounded-full object-cover mx-auto">
                        <h3 class="mt-4 font-bold text-navy">{{ $member['name'] }}</h3>
                        <p class="text-xs uppercase tracking-wider text-slate-500 mt-1">{{ $member['role'] }}</p>
                        <div class="mt-4 flex justify-center gap-3 text-slate-400">
                            <a href="#" class="hover:text-brand"><i class="fa-brands fa-linkedin-in"></i></a>
                            <a href="#" class="hover:text-brand"><i class="fa-brands fa-x-twitter"></i></a>
                            <a href="#" class="hover:text-brand"><i class="fa-solid fa-envelope"></i></a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- Timeline --}}
    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20">
        <div class="text-center max-w-2xl mx-auto">
            <span class="text-sm font-semibold text-brand uppercase tracking-widest">Our Journey</span>
            <h2 class="mt-2 text-3xl lg:text-4xl font-extrabold text-navy">A short history of Click Software GH</h2>
        </div>
        <div class="mt-12 relative">
            <div class="absolute left-4 md:left-1/2 md:-translate-x-1/2 top-0 bottom-0 w-0.5 bg-slate-200"></div>
            <div class="space-y-10">
                @foreach ($timeline as $i => $item)
                    <div class="relative md:grid md:grid-cols-2 md:gap-10 items-center">
                        <div class="absolute left-4 md:left-1/2 md:-translate-x-1/2 w-4 h-4 rounded-full bg-brand ring-4 ring-white"></div>
                        <div class="pl-12 md:pl-0 {{ $i % 2 ? 'md:col-start-2' : 'md:text-right' }}">
                            <div class="inline-block bg-white rounded-2xl p-6 border border-slate-100 shadow-soft">
                                <div class="text-sm font-bold text-accent-dark">{{ $item['year'] }}</div>
                                <h4 class="mt-1 font-bold text-navy">{{ $item['title'] }}</h4>
                                <p class="mt-1 text-sm text-slate-600">{{ $item['text'] }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <x-cta-section
        title="Let's build the next chapter together"
        subtitle="Whether you are starting fresh or modernizing existing systems, our team is ready to help."
    />
@endsection
