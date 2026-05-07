@props(['service'])

<article id="{{ $service['slug'] }}" class="group relative bg-white rounded-2xl p-6 border border-slate-100 hover:border-brand/30 hover:shadow-soft transition flex flex-col">
    <div class="w-12 h-12 grid place-items-center rounded-xl bg-brand/10 text-brand text-xl group-hover:bg-brand group-hover:text-white transition">
        <i class="{{ $service['icon'] }}"></i>
    </div>
    <h3 class="mt-5 text-lg font-bold text-navy">{{ $service['title'] }}</h3>
    <p class="mt-2 text-sm text-slate-600 leading-relaxed">{{ $service['short'] }}</p>

    @if (!empty($service['benefits']))
        <ul class="mt-4 space-y-2 text-sm text-slate-600">
            @foreach ($service['benefits'] as $b)
                <li class="flex items-start gap-2">
                    <i class="fa-solid fa-circle-check text-accent-dark mt-1"></i>
                    <span>{{ $b }}</span>
                </li>
            @endforeach
        </ul>
    @endif

    <a href="{{ route('quote') }}?service={{ urlencode($service['title']) }}"
       class="mt-6 inline-flex items-center gap-2 text-sm font-semibold text-brand hover:text-brand-dark">
        Request This Service <i class="fa-solid fa-arrow-right text-xs"></i>
    </a>
</article>
