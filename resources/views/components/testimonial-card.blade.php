@props(['testimonial'])

<figure class="bg-white rounded-2xl p-6 border border-slate-100 hover:shadow-soft transition h-full flex flex-col">
    <i class="fa-solid fa-quote-left text-2xl text-accent-dark"></i>
    <blockquote class="mt-3 text-slate-700 leading-relaxed text-sm">
        “{{ $testimonial['quote'] }}”
    </blockquote>
    <figcaption class="mt-6 flex items-center gap-3 mt-auto pt-6">
        <img src="{{ $testimonial['avatar'] }}" alt="{{ $testimonial['name'] }}" class="w-12 h-12 rounded-full object-cover">
        <div>
            <div class="font-semibold text-navy">{{ $testimonial['name'] }}</div>
            <div class="text-xs text-slate-500">{{ $testimonial['role'] }}</div>
        </div>
    </figcaption>
</figure>
