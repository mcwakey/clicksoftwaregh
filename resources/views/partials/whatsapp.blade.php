@php($company = \App\Support\SiteData::company())
<a href="https://wa.me/{{ $company['whatsapp'] }}?text=Hello%20Click%20Software%20GH%2C%20I%27d%20like%20to%20enquire%20about%20your%20services."
   target="_blank" rel="noopener"
   class="fixed bottom-6 right-6 z-50 inline-flex items-center gap-2 px-4 py-3 rounded-full bg-green-500 hover:bg-green-600 text-white shadow-soft animate-floaty"
   aria-label="Chat on WhatsApp">
    <i class="fa-brands fa-whatsapp text-xl"></i>
    <span class="hidden sm:inline text-sm font-semibold">Chat with us</span>
</a>
