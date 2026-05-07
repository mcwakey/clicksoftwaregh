@props(['project'])

<article class="group bg-white rounded-2xl overflow-hidden border border-slate-100 hover:shadow-soft transition flex flex-col">
    <a href="{{ route('projects.show', $project['slug']) }}" class="block aspect-[16/10] overflow-hidden bg-slate-100 relative">
        <img src="{{ $project['image'] }}" alt="{{ $project['title'] }}"
             class="w-full h-full object-cover group-hover:scale-105 transition duration-500" loading="lazy">
        <span class="absolute top-3 left-3 inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-white/90 backdrop-blur text-brand">
            {{ $project['category'] }}
        </span>
    </a>
    <div class="p-6 flex flex-col flex-1">
        <h3 class="text-lg font-bold text-navy">
            <a href="{{ route('projects.show', $project['slug']) }}" class="hover:text-brand">{{ $project['title'] }}</a>
        </h3>
        <p class="mt-2 text-sm text-slate-600 leading-relaxed">{{ $project['short'] }}</p>

        <div class="mt-4 flex flex-wrap gap-2">
            @foreach ($project['tech'] as $t)
                <span class="text-[11px] uppercase tracking-wide font-semibold px-2 py-1 rounded bg-slate-100 text-slate-600">{{ $t }}</span>
            @endforeach
        </div>

        <a href="{{ route('projects.show', $project['slug']) }}"
           class="mt-6 inline-flex items-center gap-2 text-sm font-semibold text-brand hover:text-brand-dark">
            View Details <i class="fa-solid fa-arrow-right text-xs"></i>
        </a>
    </div>
</article>
