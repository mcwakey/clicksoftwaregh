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

<form method="POST" action="{{ route('quote.submit') }}" class="space-y-5">
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
            <label class="block text-sm font-medium text-navy mb-1">Organization</label>
            <input type="text" name="organization" value="{{ old('organization') }}"
                   class="w-full rounded-xl border border-slate-200 px-4 py-3 focus:ring-2 focus:ring-brand focus:border-brand outline-none transition" />
        </div>
        <div>
            <label class="block text-sm font-medium text-navy mb-1">Type of Project <span class="text-red-500">*</span></label>
            <select name="project_type" required
                    class="w-full rounded-xl border border-slate-200 px-4 py-3 focus:ring-2 focus:ring-brand focus:border-brand outline-none transition bg-white">
                <option value="">Select project type</option>
                @foreach ($services as $svc)
                    <option value="{{ $svc['title'] }}" @selected(old('project_type', request('service')) === $svc['title'])>{{ $svc['title'] }}</option>
                @endforeach
                <option value="Other" @selected(old('project_type') === 'Other')>Other</option>
            </select>
        </div>
        <div>
            <label class="block text-sm font-medium text-navy mb-1">Budget Range <span class="text-red-500">*</span></label>
            <select name="budget_range" required
                    class="w-full rounded-xl border border-slate-200 px-4 py-3 focus:ring-2 focus:ring-brand focus:border-brand outline-none transition bg-white">
                @php($budgets = ['Under GHS 5,000','GHS 5,000 - 15,000','GHS 15,000 - 50,000','GHS 50,000 - 100,000','Above GHS 100,000','Not sure yet'])
                <option value="">Select budget</option>
                @foreach ($budgets as $b)
                    <option value="{{ $b }}" @selected(old('budget_range') === $b)>{{ $b }}</option>
                @endforeach
            </select>
        </div>
        <div>
            <label class="block text-sm font-medium text-navy mb-1">Expected Deadline</label>
            <input type="date" name="deadline" value="{{ old('deadline') }}"
                   class="w-full rounded-xl border border-slate-200 px-4 py-3 focus:ring-2 focus:ring-brand focus:border-brand outline-none transition" />
        </div>
        <div>
            <label class="block text-sm font-medium text-navy mb-1">Attachment (optional)</label>
            <input type="file" disabled
                   class="w-full rounded-xl border border-dashed border-slate-300 px-4 py-3 bg-slate-50 text-slate-500 text-sm" />
            <p class="text-xs text-slate-400 mt-1">File upload will be enabled soon.</p>
        </div>
    </div>

    <div>
        <label class="block text-sm font-medium text-navy mb-1">Project Description <span class="text-red-500">*</span></label>
        <textarea name="project_description" rows="6" required
                  class="w-full rounded-xl border border-slate-200 px-4 py-3 focus:ring-2 focus:ring-brand focus:border-brand outline-none transition">{{ old('project_description') }}</textarea>
    </div>

    <button type="submit"
            class="inline-flex items-center gap-2 px-6 py-3 rounded-xl bg-gradient-to-r from-brand to-accent-dark text-white font-semibold shadow-soft hover:opacity-90 transition">
        <i class="fa-solid fa-paper-plane"></i> Submit Request
    </button>
</form>
