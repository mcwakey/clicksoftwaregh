@props(['blog'])

<article class="group bg-white rounded-2xl overflow-hidden border border-slate-100 hover:shadow-soft transition flex flex-col">
    <a href="{{ route('blog.show', $blog['slug']) }}" class="block aspect-[16/10] overflow-hidden bg-slate-100">
        <img src="{{ $blog['image'] }}" alt="{{ $blog['title'] }}"
             class="w-full h-full object-cover group-hover:scale-105 transition duration-500" loading="lazy">
    </a>
    <div class="p-6 flex flex-col flex-1">
        <div class="flex items-center gap-3 text-xs text-slate-500">
            <span class="inline-flex items-center px-2 py-1 rounded bg-brand/10 text-brand font-semibold">{{ $blog['category'] }}</span>
            <span><i class="fa-regular fa-calendar mr-1"></i>{{ $blog['date'] }}</span>
        </div>
        <h3 class="mt-3 text-lg font-bold text-navy leading-snug">
            <a href="{{ route('blog.show', $blog['slug']) }}" class="hover:text-brand">{{ $blog['title'] }}</a>
        </h3>
        <p class="mt-2 text-sm text-slate-600 leading-relaxed">{{ $blog['excerpt'] }}</p>
        <a href="{{ route('blog.show', $blog['slug']) }}"
           class="mt-5 inline-flex items-center gap-2 text-sm font-semibold text-brand hover:text-brand-dark">
            Read More <i class="fa-solid fa-arrow-right text-xs"></i>
        </a>
    </div>
</article>
