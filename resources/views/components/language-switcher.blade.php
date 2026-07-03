@props(['class' => ''])

<div {{ $attributes->merge(['class' => 'inline-flex items-center gap-1 '.$class]) }}
    aria-label="{{ __('Switch language') }}">
    @foreach (['en' => 'EN', 'nl' => 'NL'] as $locale => $label)
        <a href="{{ route('lang.switch', $locale) }}"
            lang="{{ $locale === 'nl' ? 'nl-NL' : 'en' }}"
            hreflang="{{ $locale === 'nl' ? 'nl-NL' : 'en' }}"
            class="rounded px-2 py-1 text-xs font-semibold transition
                {{ app()->getLocale() === $locale
                    ? 'bg-indigo-600 text-white'
                    : 'text-slate-400 hover:bg-slate-800 hover:text-white' }}">
            {{ $label }}
        </a>
    @endforeach
</div>
