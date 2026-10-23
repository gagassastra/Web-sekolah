@extends('layouts.admin', [
    'title' => 'Baca Pesan: ' . $message->subject,
    'header' => 'Detail Pesan Masuk'
])

@section('content')
<div class="max-w-3xl space-y-6">
    
    <div class="flex items-center justify-between">
        <a href="{{ route('admin.messages.index') }}" class="text-xs font-bold text-slate-500 hover:text-navy-900 flex items-center gap-1">
            <i class="fa-solid fa-arrow-left"></i> Kembali ke Kotak Masuk
        </a>
        <form action="{{ route('admin.messages.destroy', $message->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus pesan ini?');" class="inline">
            @csrf
            @method('DELETE')
            <button type="submit" class="px-3 py-1.5 bg-red-50 hover:bg-red-100 text-red-600 rounded-xl text-xs font-bold transition flex items-center gap-1.5">
                <i class="fa-solid fa-trash-can"></i> Hapus Pesan
            </button>
        </form>
    </div>

    <div class="bg-white rounded-2xl shadow-sm border border-slate-200/80 p-6 sm:p-8 space-y-6">
        
        <!-- Message Header -->
        <div class="border-b border-slate-100 pb-6 flex flex-col sm:flex-row sm:items-center justify-between gap-4">
            <div>
                <span class="text-xs text-primary-600 font-bold uppercase tracking-wider block mb-1">Subjek Pertanyaan</span>
                <h2 class="text-xl font-extrabold text-navy-900">{{ $message->subject }}</h2>
                <div class="flex items-center gap-4 text-xs text-slate-500 mt-2 flex-wrap">
                    <span class="flex items-center gap-1.5">
                        <i class="fa-solid fa-user text-slate-400"></i> {{ $message->name }}
                    </span>
                    <span class="flex items-center gap-1.5">
                        <i class="fa-regular fa-envelope text-slate-400"></i> {{ $message->email }}
                    </span>
                    @if($message->phone)
                        <span class="flex items-center gap-1.5 font-mono text-emerald-600 font-bold">
                            <i class="fa-brands fa-whatsapp text-slate-400"></i> {{ $message->phone }}
                        </span>
                    @endif
                </div>
            </div>
            <span class="text-xs text-slate-400 shrink-0">
                {{ $message->created_at->translatedFormat('l, d F Y - H:i') }} WIB
            </span>
        </div>

        <!-- Message Body -->
        <div class="text-slate-800 text-sm leading-relaxed p-4 bg-slate-50 rounded-2xl border border-slate-100 whitespace-pre-line font-sans">
            {{ $message->message }}
        </div>

        <!-- Action / Reply -->
        <div class="pt-4 border-t border-slate-100 flex flex-wrap items-center gap-3">
            <a href="mailto:{{ $message->email }}?subject={{ urlencode('Re: ' . $message->subject) }}"
               class="px-5 py-2.5 bg-primary-600 hover:bg-primary-700 text-white rounded-xl text-xs font-bold transition flex items-center gap-2 shadow-xs">
                <i class="fa-solid fa-reply"></i> Balas Lewat Email
            </a>
            @if($message->phone)
                <a href="https://wa.me/{{ preg_replace('/^0/', '62', preg_replace('/[^0-9]/', '', $message->phone)) }}?text={{ urlencode('Halo ' . $message->name . ', terima kasih telah menghubungi PKBM AL-QUDWAH terkait: ' . $message->subject) }}"
                   target="_blank" rel="noopener"
                   class="px-5 py-2.5 bg-emerald-600 hover:bg-emerald-700 text-white rounded-xl text-xs font-bold transition flex items-center gap-2 shadow-xs">
                    <i class="fa-brands fa-whatsapp"></i> Balas Lewat WhatsApp
                </a>
            @endif
        </div>

    </div>

</div>
@endsection
