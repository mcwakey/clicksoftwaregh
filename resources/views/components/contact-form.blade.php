@props(['services' => []])

@if (session('success'))
    <div class="mb-6 rounded-xl border border-green-200 bg-green-50 text-green-800 px-4 py-3 text-sm flex items-start gap-3">
        <i class="fa-solid fa-circle-check mt-0.5"></i>
        <span>{{ session('success') }}</span>
    </div>
@endif

@if ($errors->any())
    <div class="mb-6 rounded-xl border border-red-200 bg-red-50 text-red-700 px-4 py-3 text-sm">
        <div class="font-semibold mb-1"><i class="fa-solid fa-circle-exclamation mr-1"></i> Please correct the following:</div>
        <ul class="list-disc list-inside space-y-1">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form method="POST" action="{{ route('contact.submit') }}" class="space-y-5">
    @csrf
    <div class="grid sm:grid-cols-2 gap-5">
        <div>
            <label class="block text-sm font-medium text-navy mb-1">Full Name <span class="text-red-500">*</span></label>
            <input type="text" name="full_name" value="{{ old('full_name') }}" required
                   class="w-full rounded-xl border border-slate-200 px-4 py-3 focus:ring-2 focus:ring-brand focus:border-brand outline-none transition" />
        </div>
        <div>
            <label class="block text-sm font-medium text-navy mb-1">Email <span class="text-red-500">*</span></label>
            <input type="email" name="email" value="{{ old('email') }}" required
                   class="w-full rounded-xl border border-slate-200 px-4 py-3 focus:ring-2 focus:ring-brand focus:border-brand outline-none transition" />
        </div>
        <div>
            <label class="block text-sm font-medium text-navy mb-1">Phone <span class="text-red-500">*</span></label>
            <input type="text" name="phone" value="{{ old('phone') }}" required
                   class="w-full rounded-xl border border-slate-200 px-4 py-3 focus:ring-2 focus:ring-brand focus:border-brand outline-none transition" />
        </div>
        <div>
            <label class="block text-sm font-medium text-navy mb-1">Company / Organization</label>
            <input type="text" name="organization" value="{{ old('organization') }}"
                   class="w-full rounded-xl border border-slate-200 px-4 py-3 focus:ring-2 focus:ring-brand focus:border-brand outline-none transition" />
        </div>
    </div>

    <div>
        <label class="block text-sm font-medium text-navy mb-1">Service Interested In</label>
        <select name="service" class="w-full rounded-xl border border-slate-200 px-4 py-3 focus:ring-2 focus:ring-brand focus:border-brand outline-none transition bg-white">
            <option value="">Select a service</option>
            @foreach ($services as $svc)
                <option value="{{ $svc['title'] }}" @selected(old('service', request('service')) === $svc['title'])>{{ $svc['title'] }}</option>
            @endforeach
            <option value="Other" @selected(old('service') === 'Other')>Other</option>
        </select>
    </div>

    <div>
        <label class="block text-sm font-medium text-navy mb-1">Message <span class="text-red-500">*</span></label>
        <textarea name="message" rows="5" required
                  class="w-full rounded-xl border border-slate-200 px-4 py-3 focus:ring-2 focus:ring-brand focus:border-brand outline-none transition">{{ old('message') }}</textarea>
    </div>

    <button type="submit"
            class="inline-flex items-center gap-2 px-6 py-3 rounded-xl bg-gradient-to-r from-brand to-accent-dark text-white font-semibold shadow-soft hover:opacity-90 transition">
        <i class="fa-solid fa-paper-plane"></i> Send Message
    </button>
</form>
